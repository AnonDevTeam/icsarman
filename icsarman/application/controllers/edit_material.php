<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Edit_Material extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_edit_material');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function edit_book_view(){
		

		$this->load->view("edit_book_view");
		$this->load->view("/admin_includes/footer");
		}

		function callEditBook(){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
 			$picture=$extension;

 				$tmpname = $_FILES['file']['tmp_name'];
				$name = $_POST['material_id'].".".$extension;
				$dest = './images/';
				$dest.=$name;
				if(file_exists($dest)) unlink($dest);
				move_uploaded_file($tmpname,$dest);

				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$id = ($_POST['material_id']);

			$getTitleAuthor = mysql_query("SELECT title, author FROM material_group WHERE id = $id");

			while ( $getTA = mysql_fetch_array($getTitleAuthor) ) {
				$title = $getTA['title'];
				$author = $getTA['author'];
			}

			$getMatID = mysql_query("SELECT id FROM material_group WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");

			while ( $matID = mysql_fetch_array($getMatID) ) {

			$this->m_edit_material->update_book(["id"=>$matID['id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
                                        "picture"=>$picture,
                                        "course_code"=>$_POST['course_code'],
                                        "publisher"=>$_POST['publisher'],
										]);


			}

			/*echo "<script language=\"javascript\">alert('Successfully edited material!');</script>";*/
			$_SESSION['success_1']="Book successfully edited.";
			$_SESSION['success2']="Book successfully edited.";
			$_SESSION['success2_show']="LALA";
			$_SESSION['e_book']="LALA";
			$_SESSION['e_books']="LALA";
			$_SESSION['start']="LALA";
			$_SESSION['start2']="LALA";
			$this->load->view("management");
		}
		function callEditMagazine(){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
 			$picture=$extension;

 				$tmpname = $_FILES['file']['tmp_name'];
				$name = $_POST['material_id'].".".$extension;
				$dest = './images/';
				$dest.=$name;
				if(file_exists($dest)) unlink($dest);
				move_uploaded_file($tmpname,$dest);

				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$id = ($_POST['material_id']);

			$getTitleAuthor = mysql_query("SELECT title, author FROM material_group WHERE id = $id");

			while ( $getTA = mysql_fetch_array($getTitleAuthor) ) {
				$title = $getTA['title'];
				$author = $getTA['author'];
			}

			$getMatID = mysql_query("SELECT id FROM material_group WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");

			while ( $matID = mysql_fetch_array($getMatID) ) {
			$this->m_edit_material->update_magazine(["id"=>$matID['id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
                                        "picture"=>$picture,
                                        "volume_number"=>$_POST['volume_number'],
                                        "month"=>$_POST['month'],
										]);
			}

			$_SESSION['success2']="Magazine successfully edited.";
			$_SESSION['success_2']="Magazine successfully edited.";
			$_SESSION['success2_show']="LALA";
			$_SESSION['e_mag']="LALA";
			$_SESSION['e_mags']="LALA";
			$_SESSION['start']="LALA";
			$_SESSION['start2']="LALA";
			$this->load->view("management");
		}
		function callEditSPThesis(){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
 			$picture=$extension;

 				$tmpname = $_FILES['file']['tmp_name'];
				$name = $_POST['material_id'].".".$extension;
				$dest = './images/';
				$dest.=$name;
				if(file_exists($dest)) unlink($dest);
				move_uploaded_file($tmpname,$dest);

			// $title = ($_POST['title']);
			// 	$author = ($_POST['author']);
			// 	$id = ($_POST['material_id']);

			// $getTitleAuthor = mysql_query("SELECT title, author FROM material_group WHERE id = $id");

			// while ( $getTA = mysql_fetch_array($getTitleAuthor) ) {
			// 	$title = $getTA['title'];
			// 	$author = $getTA['author'];
			// }

			// $getMatID = mysql_query("SELECT id FROM material_group WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");

			// while ( $matID = mysql_fetch_array($getMatID) ) {
			$this->m_edit_material->update_sp_thesis(["id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
                                        "picture"=>$picture,
                                        "adviser"=>$_POST['adviser'],
                                        "type"=>$_POST['type'],
										]);
		//}
			$_SESSION['success_3']="SP/Thesis successfully edited.";
			$_SESSION['success2']="SP/Thesis successfully edited.";
			$_SESSION['success2_show']="LALA";
			$_SESSION['e_spthesis']="LALA";
			$_SESSION['e_spthesiss']="LALA";
			$_SESSION['start']="LALA";
			$_SESSION['start2']="LALA";
			$this->load->view("management");
		}
		function callEditOther(){
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
 			$picture=$extension;

 				$tmpname = $_FILES['file']['tmp_name'];
				$name = $_POST['material_id'].".".$extension;
				$dest = './images/';
				$dest.=$name;
				if(file_exists($dest)) unlink($dest);
				move_uploaded_file($tmpname,$dest);

			// $title = ($_POST['title']);
			// 	$author = ($_POST['author']);
			// 	$id = ($_POST['material_id']);

			// $getTitleAuthor = mysql_query("SELECT title, author FROM material_group WHERE id = $id");

			// while ( $getTA = mysql_fetch_array($getTitleAuthor) ) {
			// 	$title = $getTA['title'];
			// 	$author = $getTA['author'];
			// }

			// $getMatID = mysql_query("SELECT id FROM material_group WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");

			// while ( $matID = mysql_fetch_array($getMatID) ) {
			$this->m_edit_material->update_other(["id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
                                        "picture"=>$picture,
                                        "type"=>$_POST['type'],
										]);
			//}
			$_SESSION['success_4']="Material successfully edited.";
			$_SESSION['success2']="Material successfully edited.";
			$_SESSION['success2_show']="LALA";
			$_SESSION['e_others']="LALA";
			$_SESSION['e_otherss']="LALA";
			$_SESSION['start']="LALA";
			$_SESSION['start2']="LALA";
			$this->load->view("management");
		}

		function itemized(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_book_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_book_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_book_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_book_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all();

			foreach($data as $item){
			$this->load->view("search_item", array('item'=>$item));
			}
			if($data==null){
				echo "<i><h4><b><center>No results found.</center></b></h4></i>";
			}
		}

		function itemized_mag(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_mag_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_mag_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_mag_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_mag_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_mag();

			foreach($data as $item){
			$this->load->view("search_item_mag", array('item'=>$item));
			}
			if($data==null){
				echo "<i><h4><b><center>No results found.</center></b></h4></i>";
			}
		}

		function itemized_st(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_st_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_st_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_st_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_st_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_st();

			if($data==null){
				echo "<i><h4><b><center>No results found.</center></b></h4></i>";
			}

			foreach($data as $item){
			$this->load->view("search_item_st", array('item'=>$item));
			}
		}

		function itemized_others(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_others_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_others_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_others_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_others_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_other();

			foreach($data as $item){
			$this->load->view("search_item_others", array('item'=>$item));
			}
			if($data==null){
				echo "<i><h4><b><center>No results found.</center></b></h4></i>";
			}
		}

		function itemized_materials(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_materials_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_materials_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_materials_author($input);

			foreach($data as $item){
			$this->load->view("search_item_materials", array('item'=>$item));
			}
		}

		function itemized_modals(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_book_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_book_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_book_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_book_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all();

			foreach($data as $item){
			$this->load->view("modal_book", array('item'=>$item));
			}
		}

		function itemized_modals_mag(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_mag_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_mag_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_mag_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_mag_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_mag();

			foreach($data as $item){
			$this->load->view("modal_mag", array('item'=>$item));
			}
		}

		function itemized_modals_st(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_st_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_st_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_st_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_st_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_st();

			foreach($data as $item){
			$this->load->view("modal_st", array('item'=>$item));
			}
		}

		function itemized_modals_others(){
			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_others_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_others_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_others_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_others_year($input);

			else if ($choice === "all")
			$data = $this->m_edit_material->view_all_other();


			foreach($data as $item){
			$this->load->view("modal_others", array('item'=>$item));
			}
		}

		function modal_delete(){

			$choice = $_POST["choice"];
			$input = $_POST["search_input"];

			if ($choice === "id")
			$data = $this->m_edit_material->search_others_id($input);
			
			else if ($choice === "title")
			$data = $this->m_edit_material->search_others_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_others_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_others_year($input);

			
			foreach($data as $item){
			$this->load->view("modal_delete_book", array('item'=>$item));
			}
			
		}

		function callReturnMaterial(){
			$this->m_edit_material->return_material($_POST['return']);
			redirect('../index.php/Index/management');
		}		

		function search_book(){

			if(isset($_POST['choice'])) $choice = $_POST['choice'];
			else                        $choice = "";

			if(isset($_POST['input'])) $input = $_POST['search_input'];
			else                        $input = "";

			
			
			
			if ($choice === "id")
			$data = $this->m_edit_material->search_book_id($input);

			else if ($choice === "title")
			$data = $this->m_edit_material->search_book_title($input);

			else if ($choice === "author")
			$data = $this->m_edit_material->search_book_author($input);

			else if ($choice === "year")
			$data = $this->m_edit_material->search_book_year($input);

			else $data = "";

			$this->load->view('management', array('u'=>$data));
		}
		function search_magazine(){
			$magazines=$this->m_edit_material->search_magazine(["material_id"=>$_POST['via_id'],
										"title"=> $_POST['via_title'],
										"author"=>	$_POST['via_author'],
										"year"=>$_POST['via_year'],
										"date_added"=>$_POST['via_date'],
                                        "status"=>$_POST['via_status'],
                                        "volume_number"=>$_POST['via_volume'],
                                        "month"=>$_POST['via_month'],
										]);
			$this->edit_book_view("",$magazines,"","");
		}
		function search_sp_thesis(){
			$sp_thesis=$this->m_edit_material->search_sp_thesis(["material_id"=>$_POST['via_id'],
										"title"=> $_POST['via_title'],
										"author"=>	$_POST['via_author'],
										"year"=>$_POST['via_year'],
										"date_added"=>$_POST['via_date'],
                                        "status"=>$_POST['via_status'],
                                        "adviser"=>$_POST['via_adviser'],
                                        "type"=>$_POST['via_type'],
										]);
			$this->edit_book_view("","",$sp_thesis,"");
		}
		function search_other(){
			$others=$this->m_edit_material->search_other(["material_id"=>$_POST['via_id'],
										"title"=> $_POST['via_title'],
										"author"=>	$_POST['via_author'],
										"year"=>$_POST['via_year'],
										"date_added"=>$_POST['via_date'],
                                        "status"=>$_POST['via_status'],
                                        "type"=>$_POST['via_type'],
										]);
			$this->edit_book_view();
		}

	}

?>