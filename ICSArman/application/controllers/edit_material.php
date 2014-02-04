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
			$this->m_edit_material->update_book(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$picture,
                                        "course_code"=>$_POST['course_code'],
                                        "publisher"=>$_POST['publisher'],
										]);
			redirect('../index.php/Index/management');
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
			$this->m_edit_material->update_magazine(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$picture,
                                        "volume_number"=>$_POST['volume_number'],
                                        "month"=>$_POST['month'],
										]);
			redirect('../index.php/Index/management');
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
			$this->m_edit_material->update_sp_thesis(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$picture,
                                        "adviser"=>$_POST['adviser'],
                                        "type"=>$_POST['type'],
										]);
			redirect('../index.php/Index/management');
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
			$this->m_edit_material->update_other(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$picture,
                                        "type"=>$_POST['type'],
										]);
			redirect('../index.php/Index/management');
		}

		function search_book(){
			$books = $this->m_edit_material->search_book(["material_id"=>$_POST['via_id'],
										"title"=> $_POST['via_title'],
										"author"=>	$_POST['via_author'],
										"year"=>$_POST['via_year'],
										"date_added"=>$_POST['via_date'],
                                        "status"=>$_POST['via_status'],
                                        "course_code"=>$_POST['via_course_code'],
                                        "publisher"=>$_POST['via_publisher'],
										]);
			$this->edit_book_view($books,"","","");
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