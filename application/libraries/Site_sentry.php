<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	class Site_sentry {
		private $obj;

		public function __construct() {
			$this->obj =& get_instance();
		}

		public function is_logged_in() {
			if ($this->obj->session) {

				//If user has valid session, and such is logged in
				if ($this->obj->session->userdata('logged_in')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

		public function login_routine()
		{
			//Make the input username and password into variables
			$username = strtolower($this->obj->input->post('username'));
			$password = md5($this->obj->input->post('password'));

			//Use the input username and password and check against 'user' table
			$query = $this->obj->db->get('user');

			$login_result = FALSE;
			foreach($query->result() as $row) {
				if($row->username == $username && $row->password == $password) {
					$login_result = TRUE;
					$id = $row->id;
					$super = $row->status;
				}
			}

			//If username and password match set the logged in flag in 'ci_sessions'
			if ($login_result==1) {
				$credentials = array('username' => $username, 'logged_in' => $login_result, 'flag' => $super);
				$this->obj->session->set_userdata($credentials);
				//On success redirect user to default page
				redirect('admin/dashboard');
			} else {
				//On error send user back to login page, and add error message
				//$this->obj->session->set_flashdata('login_error',$this->obj->lang->line('login_error'));
				$this->obj->session->set_flashdata('login_username',$username);

				$this->obj->session->set_flashdata('error', 'Invalid username or password');

				redirect('admin/login');
			}
		}
	}
?>
