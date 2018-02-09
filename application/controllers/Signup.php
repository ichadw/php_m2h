<?php
class Signup extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_cust');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        //$this->load->database();
    }

    function index()
    {
        if(!$this->session->userdata('email')){
            $this->data['content_header'] = $this->header;
            $this->data['content_sponsor'] = $this->sponsor;

            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
            $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[cust.email]');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[10]|max_length[250]|xss_clean');
            $this->form_validation->set_rules('phone_numb', 'Phone Number', 'trim|required|min_length[8]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

            if ($this->form_validation->run() == FALSE){
                // fails
                $this->load->view('form_signup',$this->data);
            }else{
                //insert the cust registration details into database

                if($_POST){
                    $data = array(
                        'fname' => $this->input->post('fname'),
                        'lname' => $this->input->post('lname'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'phone_numb' => $this->input->post('phone_numb'),
                        'password' => md5($this->input->post('password')),
                    );

                    if($this->Model_cust->add_cust($data)){
                        $this->data['success'] = 'Data Inserted Successfully';
                    }else{
                        $this->data['error'] = 'Insert Error';
                    }
                }
                // insert form data into database
                // $this->Model_cust->insert($post);
                $this->data['content_header'] = $this->header;
                $this->data['content_sponsor'] = $this->sponsor;
                $this->data['message'] = "Pendaftaran berhasil";
                $this->load->view('v_success',$this->data);
            }

            // $this->load->view('form_signup',$this->data);
        } else {
            redirect('home');
        }
    }
}
?>
