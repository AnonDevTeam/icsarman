
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
		$borrowed_materials = $this->borrowed_material->getBorrowed($id,"");
		$reserved_materials = $this->reserved_material->getReserved($id,"");
		$alert = $this->borrowed_material->alert($id);
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

		switch($type){
			case "All": $result = $this->material->suggest($input,"all"); break;
			case "Book": $result = $this->material->suggest($input,"book"); break;
			case "Magazine": $result = $this->material->suggest($input,"magazine"); break;
			case "SP": $result = $this->material->suggest($input,"sp_thesis","sp"); break;
			case "Thesis": $result = $this->material->suggest($input,"sp_thesis","thesis"); break;
			case "Others": $result = $this->material->suggest($input,"other"); break;
		}

		$count = 0;
		$max = 5;
		$num = 0;

		echo "<div>";
		foreach($result as $row){

			if($count < $max){
				echo "<div id='suggest".$num."' onclick='autocomplete(".$num.");' class='suggest_out'>".$row->item."</div>";
			 	$count = $count + 1;
			 	$num = $num + 1;
			}
			else break;
		}
		echo"</div>";
	}

	public function createConstraintList($result,$matIdOnly)
	{
		$list = array();
		foreach($result as $mat){
			array_push($list, $mat->material_id);
		}
		return $list;
	}

	public function c_search_material() {
		$id = $this->session->userdata('id');
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$type = $_POST['type'];
		$page = $_POST['page'];
		$object_clicked = $_POST['object_clicked'];

		switch($type){
			case "All": $result = $this->material->searchAll($input,$page); break;
			case "Book": $result = $this->material->search($input,"book",NULL,$page); break;
			case "Magazine": $result = $this->material->search($input,"magazine",NULL,$page); break;
			case "SP": $result = $this->material->search($input,"sp_thesis","sp",$page); break;
			case "Thesis": $result = $this->material->search($input,"sp_thesis","thesis",$page); break;
			case "Others": $result = $this->material->search($input,"other",NULL,$page); break;
		}
		
		// switch($type){
		// 	case "All": break;
		// 	case "Book":
		// 		$result = array();
		// 		$result = $this->user_search->searchByTitle($input,"book",NULL,false,"after",NULL,NULL);
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"book",NULL,false,"after",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByPublisher($input,false,"after",$list,false));

		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByTitle($input,"book",NULL,false,"both",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"book",NULL,false,"both",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByPublisher($input,false,"both",$list,false));
		// 		break;
		// 	case "Magazine":
		// 		$result = array();
		// 		$result = $this->user_search->searchByTitle($input,"magazine",NULL,false,"after",NULL,NULL);
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"magazine",NULL,false,"after",$list,false));

		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByTitle($input,"magazine",NULL,false,"both",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"magazine",NULL,false,"both",$list,false));
		// 		break;
		// 	case "SP":
		// 		$result = array();
		// 		$result = $this->user_search->searchByTitle($input,"sp_thesis","sp",false,"after",NULL,NULL);
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"sp_thesis","sp",false,"after",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAdviser($input,"sp",false,"after",$list,false));

		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByTitle($input,"sp_thesis","sp",false,"both",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAuthor($input,"sp_thesis","sp",false,"both",$list,false));
		// 		$list = $this->createConstraintList($result,true);
		// 		$result = array_merge($result,$this->user_search->searchByAdviser($input,"sp",false,"both",$list,false));
		// 		break;
		// 	case "Thesis": break;
		// 	case "Others": break;
		// }
		
		// var_dump($result);
		
		$data['currpage'] = $result['currpage'];
		$data['pageno'] = $result['pageno'];
		$data['object_clicked'] = $object_clicked;
		unset($result['currpage']);
		unset($result['pageno']);

		foreach($result as $row){
			$data['row']=$row;
			$data['isborrowedreserved'] = $this->material->isBorrowedReserved($id,$row->material_id);
			$data['id'] = $this->session->userdata('id');
			$this->load->view('v_search_list',$data);
		}
		// Pagination: prints the numbers at the end of the search results
		$this->load->view('v_page_nav',$data);	
	}

	public function c_reserve() {
		$id = $this->session->userdata('id');
		$material_id = $_POST['material_id'];
		$name = $_POST['name'];
		$date = $_POST['date'];
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$type = $_POST['type'];
		$object_clicked = $_POST['object_clicked'];

		$success = $this->reserved_material->reserve($id,$material_id,$date);
		echo $success.";;".$name.";;".$date.";;";

		switch($type){
			case "All": $result = $this->material->search($input,"all"); break;
			case "Book": $result = $this->material->search($input,"book"); break;
			case "Magazine": $result = $this->material->search($input,"magazine"); break;
			case "SP": $result = $this->material->search($input,"sp_thesis","sp"); break;
			case "Thesis": $result = $this->material->search($input,"sp_thesis","thesis"); break;
			case "Others": $result = $this->material->search($input,"other"); break;
		}

		$data['currpage'] = $result['currpage'];
		$data['pageno'] = $result['pageno'];
		$data['object_clicked'] = $object_clicked;
		unset($result['currpage']);
		unset($result['pageno']);

		foreach($result as $row){
			$data['row']=$row;
			$data['isborrowedreserved'] = $this->material->isBorrowedReserved($id,$row->material_id);
			$data['id'] = $this->session->userdata('id');
			$this->load->view('v_search_list',$data);
		}
		// Pagination: prints the numbers at the end of the search results
		$this->load->view('v_page_nav',$data);
	}

	public function c_borrow() {
		$id = $this->session->userdata('id');
		$material_id = $_POST['material_id'];
		$name = $_POST['name'];
		$date = $_POST['date'];
		$due = $_POST['due'];
		$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
		$type = $_POST['type'];
		$object_clicked = $_POST['object_clicked'];

		$success = $this->borrowed_material->borrow($id,$material_id,$date,$due);
		echo $success.";;".$name.";;".$date.";;".$due.";;";

		switch($type){
			case "All": $result = $this->material->search($input,"all"); break;
			case "Book": $result = $this->material->search($input,"book"); break;
			case "Magazine": $result = $this->material->search($input,"magazine"); break;
			case "SP": $result = $this->material->search($input,"sp_thesis","sp"); break;
			case "Thesis": $result = $this->material->search($input,"sp_thesis","thesis"); break;
			case "Others": $result = $this->material->search($input,"other"); break;
		}

		$data['currpage'] = $result['currpage'];
		$data['pageno'] = $result['pageno'];
		$data['object_clicked'] = $object_clicked;
		unset($result['currpage']);
		unset($result['pageno']);

		foreach($result as $row){
			$data['row']=$row;
			$data['isborrowedreserved'] = $this->material->isBorrowedReserved($id,$row->material_id);
			$data['id'] = $this->session->userdata('id');
			$this->load->view('v_search_list',$data);
		}
		// Pagination: prints the numbers at the end of the search results
		$this->load->view('v_page_nav',$data);
	}







// USER PROFILE
//-------------------------------------------------------------------------------------------------

	public function c_user_profile($error="") {
		$id = $this->session->userdata('id');
		$data['info']=$this->user_profile->getUserInfo($id);
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