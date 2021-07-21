<?php 
	class Upload extends CI_Controller{
		

		public function __construct()
		{
			parent::__construct();
			$this->load->helper(array('url','form'));
		}

		public function index(){
			$data = $error =null;
			$this->load->view('upload_form',array('data'=>$data,'error'=>$error));
		}

		public function do_upload(){
			$config['upload_path'] = "./uploads/";
			$config['allowed_types'] = "jpg|png|pdf";
			$config['max_size'] = 1024;

			$this->load->library('upload',$config);

			$files_count = count($_FILES['files']['name']);

			for($i=0;$i<$files_count;$i++){
				$_FILES['file']['name'] = $_FILES['files']['name'][$i];
				$_FILES['file']['type'] = $_FILES['files']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['files']['error'][$i];
				$_FILES['file']['size'] = $_FILES['files']['size'][$i];

				if($this->upload->do_upload('file')){
					$data[] = $this->upload->data();
					$error = null;
				}else{
					$error = $this->upload->display_errors();
					$data = [];
				}

			}

			

		

			$this->load->view('upload_form',array('data'=>$data,'error'=>$error));
			
		}

		
	}



?>
