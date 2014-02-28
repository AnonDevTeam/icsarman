<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Add_Material extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_add_material');
			$this->load->model('m_edit_material');
			$this->load->helper('url');
			$this->load->helper('form');
		}
		

		function callAddMaterial(){

						// $getid = mysql_query("SELECT material_id FROM material ORDER BY material_id DESC LIMIT 1");
						// $row = mysql_fetch_array($getid);
				$getid = mysql_query("SELECT * from material_group");
				$id = mysql_num_rows($getid) + 1;
				//var_dump($id);

				
				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$year = ($_POST['year']);
				$date = date('y-m-d');
				$quantity = ($_POST['quantity']);

				// $getCount = mysql_query("SELECT * FROM material WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");
				// $quantity = mysql_num_rows($getCount) + 1; //$this->m_add_material->getCount($title, $author); ($_POST['quantity']);
				
				// $status = "onshelf";
				$auxil_id = $id;
				
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
 				$picture=$extension;
 				
				$tmpname = $_FILES['file']['tmp_name'];
				$name = $id.".".$extension;
				$dest = './images/';
				$dest.=$name;
				move_uploaded_file($tmpname,$dest);


				// $this->m_edit_material->updateQuantity($title, $author, $quantity);

				if(isset($_POST['add_book'])){
					$course_code = ($_POST['course_code']);
					$publisher = ($_POST['publisher']);
					$type = "book";
					$this->m_add_material->addBook($id, $title, $author, $year, $type, $date, $quantity, $picture, $course_code, $publisher); 
					$this->m_add_material->delete_suggestion($auxil_id);
					$_SESSION['success']="Book successfully added.";
					$_SESSION['bookss']="LALALA.";
					$_SESSION['booksss']="LALALA.";
					$_SESSION['bookslala']="LALALA.";

				}
				else if(isset($_POST['add_mag'])){
					$month = ($_POST['month']);
					$volume_no = ($_POST['volume_no']);
					$type = "magazine";

					$this->m_add_material->addMag($id, $title, $author, $year, $type, $date, $quantity,$picture, $month, $volume_no);
					$this->m_add_material->delete_suggestion($auxil_id); 
					$_SESSION['success_mag']="Magazine successfully added.";
					$_SESSION['mag']="LALALA";
					$_SESSION['mags']="LALALA";
					$_SESSION['bookslala']="LALALA.";
				}

				else if(isset($_POST['add_spthesis'])){
					$adviser = ($_POST['adviser']);
					$type = ($_POST['type']);
					$mat_type = "sp_thesis";

					$this->m_add_material->addSpThesis($id, $title, $author, $year, $date,$quantity,$picture, $adviser, $mat_type, $type); 
					$_SESSION['success_spthesis']="SP/Thesis successfully added.";
					$_SESSION['spthesis']="LALALA";
					$_SESSION['spthesiss']="LALALA";
					$_SESSION['bookslala']="LALALA.";
				}

				else if(isset($_POST['add_other'])){
					$type = ($_POST['type']);
					$mat_type = "other";

					$this->m_add_material->addOther($id, $title, $author, $year, $date,$quantity, $picture, $mat_type, $type); 
					$this->m_add_material->delete_suggestion($auxil_id);
					$_SESSION['success_other']="Material successfully added.";
					$_SESSION['others']="LALALA";
					$_SESSION['otherss']="LALALA";
					$_SESSION['bookslala']="LALALA.";
				}
			
				
				$this->load->view("management");
		}

	}

?>