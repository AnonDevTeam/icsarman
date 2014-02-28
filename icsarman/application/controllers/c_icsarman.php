<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_icsarman extends CI_Controller
{
	public function C_icsarman() {
		parent::__construct();

		$this->load->model('user_profile');
		$this->load->model('reserved_material');
		$this->load->model('borrowed_material');
		$this->load->model('material');
		$this->load->model('user_search');
		$this->load->model('user');
		
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
	}

	public function index() {
		$session_data = $this->session->userdata('logged_in');
		
		$id = $session_data['id'];
		$result = $this->user->info($id);
		foreach($result as $row)
		{		
			$data = array(
				'type' => $row->type,
				'username' => $row->username,
			);
		}	

		
		$this->load->view('home',$data);
	}



// MATERIALS
//-------------------------------------------------------------------------------------------------

	public function c_user_material() {
		$id = $this->session->userdata('id');
		// $borrowed_materials = $this->borrowed_material->getBorrowed($id,"");
		// $reserved_materials = $this->reserved_material->getReserved($id,"");
		// $alert = $this->borrowed_material->alert($id);
		$data = array(
			'borrowed' => $borrowed_materials,
			'reserved' => $reserved_materials,
			'alert' => $alert
			);
		$session_data = $this->session->userdata('logged_in');
		
		$id = $session_data['id'];
		$result = $this->user->info($id);
		foreach($result as $row)
		{		
			$data = array(
				'type' => $row->type,
				'username' => $row->username,
			);
		}	
		$this->load->view('v_user_material', $data);
	}

	/*public function c_search_borrowed() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$borrowed_materials = $this->borrowed_material->getBorrowed($id,$input);
		foreach($borrowed_materials as $row){
			$data['row'] = $row;
			$this->load->view("v_borrow_list", $data);
		}
	}

	public function c_search_reserved() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$reserved_materials = $this->reserved_material->getReserved($id,$input);
		foreach($reserved_materials as $row){
			$data['row'] = $row;
			$this->load->view('v_reserve_list',$data);
		}
	}*/




// USER SEARCH
//-------------------------------------------------------------------------------------------------
	

// USER PROFILE
//-------------------------------------------------------------------------------------------------

	public function c_user_profile($error="") {
		$id = $this->session->userdata('id');
		$data['info']=$this->user_profile->getUserInfo($id);
		$session_data = $this->session->userdata('logged_in');
		
		$id = $session_data['id'];
		$result = $this->user->info($id);
		foreach($result as $row)
		{		
			$data = array(
				'type' => $row->type,
				'username' => $row->username,
			);
		}	

		$this->load->view("v_user_profile",$data);
	}

	public function c_edit_password(){
		$npw=filter_var($_POST['npw'], FILTER_SANITIZE_STRING);
		$opw=filter_var($_POST['opw'], FILTER_SANITIZE_STRING);

		$userinfo=$this->user_profile->getUserInfo($_POST['userid']); 
		if($userinfo->password != sha1($opw)){ //if password in the database and password in given are not equal, error will be returned
			echo "Invalid password!";
		}
		else{
			$this->user_profile->editPassword($_POST['userid'],sha1($npw));
			echo "Password has been changed successfully";
		}
	}

	public function c_edit_email(){
		$newemail = filter_var($_POST['newemail'], FILTER_SANITIZE_EMAIL);
		$this->user_profile->editEmail($_POST['userid'],$newemail);

		echo "Email has been successfully changed.;{$newemail}";
	
	}

	public function c_edit_address(){
		$newaddr = filter_var($_POST['newaddr'], FILTER_SANITIZE_STRING);
		$this->user_profile->editAddress($_POST['userid'],$newaddr);

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

	public function getBaseURL(){
		echo base_url();
	}
}

?>