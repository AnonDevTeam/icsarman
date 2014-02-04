
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_icsarman extends CI_Controller
{
	public function C_icsarman() {
		parent::__construct();

		$this->load->model('m_user_profile');
		$this->load->model('m_user_search');
		$this->load->model('m_user_search_suggest');
		$this->load->model('m_user_material');
		$this->load->helper('date');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->session->set_userdata('id', 2); //temporary
	}

	public function index() {
		$this->load->view('v_user_home');
	}



// MATERIALS
//-------------------------------------------------------------------------------------------------

	public function c_user_material() {
		$id = $this->session->userdata('id');
		$borrowed_materials = $this->m_user_material->m_get_borrowed($id,"");
		$reserved_materials = $this->m_user_material->m_get_reserved($id,"");
		$alert = $this->m_user_material->m_alert($id);
		$data = array(
			'borrowed' => $borrowed_materials,
			'reserved' => $reserved_materials,
			'alert' => $alert
			);
		$this->load->view('v_user_material', $data);
	}

	public function c_search_borrowed() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$borrowed_materials = $this->m_user_material->m_get_borrowed($id,$input);
		foreach($borrowed_materials as $row){
			$data['row'] = $row;
			$this->load->view("v_borrow_list", $data);
		}
	}

	public function c_search_reserved() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$reserved_materials = $this->m_user_material->m_get_reserved($id,$input);
		foreach($reserved_materials as $row){
			$data['row'] = $row;
			$this->load->view('v_reseve_list',$data);
		}
	}




// USER SEARCH
//-------------------------------------------------------------------------------------------------
	public function c_user_search() {
		$this->load->view('v_user_search');
	}

	public function c_suggest_material() {
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$type = $_POST['type'];
		$filter = $_POST['filter'];

		switch($type){
			case "All": $result = $this->m_user_search_suggest->m_suggest_all($input,$filter); break;
			case "Book": $result = $this->m_user_search_suggest->m_suggest_book($input,$filter); break;
			case "Magazine": $result = $this->m_user_search_suggest->m_suggest_magazine($input,$filter); break;
			case "SP": $result = $this->m_user_search_suggest->m_suggest_sp_thesis($input,$filter,"sp"); break;
			case "Thesis": $result = $this->m_user_search_suggest->m_suggest_sp_thesis($input,$filter,"thesis"); break;
			case "Others": $result = $this->m_user_search_suggest->m_suggest_other($input,$filter); break;
		}

		$count = 0;
		$max = 5;
		$num = 0;

		echo "<div>";
		foreach($result as $row){

			if($count < $max){
				echo "<div style=\"width:300px;\" id='suggest".$num."'onclick=\"autocomplete(".$num.");\" class='suggest_out'>".$row->item."</div>";
			 	$count = $count + 1;
			 	$num = $num + 1;
			}
			else break;
		}
		echo"</div>";
	}

	public function c_search_material() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$type = $_POST['type'];
		$filter = $_POST['filter'];

		switch($type){
			case "All": $result = $this->m_user_search->m_search_all($input,$filter); break;
			case "Book": $result = $this->m_user_search->m_search_book($input,$filter); break;
			case "Magazine": $result = $this->m_user_search->m_search_magazine($input,$filter); break;
			case "SP": $result = $this->m_user_search->m_search_sp_thesis($input,$filter,"sp"); break;
			case "Thesis": $result = $this->m_user_search->m_search_sp_thesis($input,$filter,"thesis"); break;
			case "Others": $result = $this->m_user_search->m_search_other($input,$filter); break;
		}

		foreach($result as $row){
			$data['row']=$row; //gamitin niyo ito
			$data['isborrowedreserved'] = $this->m_user_search->m_is_borrowed_reserved($id,$row->material_id);
			$data['id'] = $this->session->userdata('id');
			$this->load->view('v_search_list',$data);
		}
	}

	public function c_borrow() {
		// $this->m_user_search->borrow($_POST['id'],$_POST['material_id']);
		// //$this->m_user_search->setBookStatus($_POST['stat'],$_POST['id']);
		// echo "Borrow Successful.";
	}

	public function c_reserve() {

	}







// USER PROFILE
//-------------------------------------------------------------------------------------------------

	public function c_user_profile($error="") {
		$id = $this->session->userdata('id');
		$data['info']=$this->m_user_profile->m_get_user_info($id);
		$this->load->view("v_user_profile",$data);
	}

	public function c_edit_password(){
		$npw=filter_var($_POST['npw'], FILTER_SANITIZE_STRING);
		$opw=filter_var($_POST['opw'], FILTER_SANITIZE_STRING);

		$userinfo=$this->m_user_profile->m_get_user_info($_POST['userid']); 
		if($userinfo->password != sha1($opw)){ //if password in the database and password in given are not equal, error will be returned
			echo "Invalid password!";
		}
		else{
			$this->m_user_profile->m_edit_password($_POST['userid'],sha1($npw));
			echo "Password has been changed successfully";
		}
	}

	public function c_edit_email(){
		$newemail = filter_var($_POST['newemail'], FILTER_SANITIZE_EMAIL);
		$this->m_user_profile->m_edit_email($_POST['userid'],$newemail);

		echo "Email has been successfully changed.;{$newemail}";
	}

	public function c_edit_address(){
		$newaddr = filter_var($_POST['newaddr'], FILTER_SANITIZE_STRING);
		$this->m_user_profile->m_edit_address($_POST['userid'],$newaddr);

		echo "Address has been successfully changed.;{$newaddr}";
	}

	public function c_do_upload() //function for uploading a picture
	{
		$userinfo = $this->m_user_profile->m_get_user_info($_POST['userid']); 

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
			$this->m_user_profile->m_update_pic($userinfo->id,$data['file_ext']);
			$this->c_user_profile("Profile picture has been changed successfully.");
		}
	}
}

?>