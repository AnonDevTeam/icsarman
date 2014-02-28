<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Userprofile extends CI_Controller{

		function __construct() {
			parent::__construct();

			$this->load->model(array('user','user_profile'));
			$this->load->helper(array('date','url','form'));
			$this->load->library(array('encrypt','session','input'));
		}

		public function index() {
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');		
				$id = $session_data['id'];
				$data = (array) $this->user->info($id)[0];
				$this->load->view("v_user_profile",$data);
			}
			else{
				echo "Access not allowed";
			}
		}

		public function c_edit_password(){
			$npw=$this->input->post('npw',TRUE);
			$opw=$this->input->post('opw',TRUE);

			$userinfo=$this->user_profile->getUserInfo($this->input->post('userid',TRUE)); 
			if($userinfo->password != sha1($opw)){ //if password in the database and password in given are not equal, error will be returned
				echo "Invalid password!";
			}
			else{
				$this->user_profile->editPassword($this->input->post('userid',TRUE),sha1($npw));
				echo "Password has been changed successfully";
			}
		}

		public function c_edit_email(){
			$newemail = $this->input->post('newemail',TRUE);
			$this->user_profile->editEmail($this->input->post('userid',TRUE),$newemail);

			echo "Email has been successfully changed.;{$newemail}";
		
		}

		public function c_edit_address(){
			$newaddr = filter_var($this->input->post('newaddr',TRUE), FILTER_SANITIZE_STRING);
			$this->user_profile->editAddress($this->input->post('userid',TRUE),$newaddr);

			echo "Address has been successfully changed.;{$newaddr}";
		
		}

		public function c_do_upload(){
			$userinfo = $this->user_profile->getUserInfo($_POST['userid']); 

			$config['file_name'] = $userinfo->id;
			$config['upload_path'] = './uploads/images';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = TRUE;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				$this->c_user_profile('upload_form', $error);
			}
			else
			{
				$data = $this->upload->data();
				$this->user_profile->updatePic($userinfo->id,$data['file_ext']);
				$this->c_user_profile("Profile picture has been changed successfully.");
			}  //function for uploading a picture
		
		
		}

	}
?>