<?php
	class Layout {
		private $CI;
		private $masterpage;
		private $view_data;
		private $page_title;
		
		public function __construct() {
			$this->CI =& get_instance();
		}
		
		public function set_masterpage($masterpage) {
			$this->masterpage = $masterpage;
		}

		public function set_title($title = '') {
			$this->page_title = $title;
		}
		
		public function set_data(&$data) {
			$this->view_data =& $data;
		}
		
		public function view($view) {
			$data = array();
			$data['page_title'] = $this->page_title;
			$data['content_for_layout'] = $this->CI->load->view($view,$this->view_data,TRUE);
			
			$this->CI->load->view($this->masterpage,$data);
		}
	}
?>