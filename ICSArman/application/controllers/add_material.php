<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Add_Material extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_add_material');
			$this->load->helper('url');
			$this->load->helper('form');
		}
		

		function callAddMaterial(){
						$getid = mysql_query("SELECT material_id FROM material ORDER BY material_id DESC LIMIT 1");
						$row = mysql_fetch_array($getid);
						$id=$row['material_id']+1;
				
				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$year = ($_POST['year']);
				$date = date('y-m-d');
				$quantity = ($_POST['quantity']);
				$status = "onshelf";
				$auxil_id = ($_POST['auxil_id']);
				
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
 				$picture=$extension;
 				
				$tmpname = $_FILES['file']['tmp_name'];
				$name = $id.".".$extension;
				$dest = './images/';
				$dest.=$name;
				move_uploaded_file($tmpname,$dest);

				if(isset($_POST['add_book'])){
					$course_code = ($_POST['course_code']);
					$publisher = ($_POST['publisher']);
					$type = "book";

					$this->m_add_material->addBook($id, $title, $author, $year, $type, $date, $quantity, $status, $picture, $course_code, $publisher); 
					$this->m_add_material->delete_suggestion($auxil_id);
				}
				else if(isset($_POST['add_mag'])){
					$month = ($_POST['month']);
					$volume_no = ($_POST['volume_no']);
					$type = "magazine";

					$this->m_add_material->addMag($id, $title, $author, $year, $type, $date, $quantity, $status,$picture, $month, $volume_no);
					$this->model->delete_suggestion($auxil_id); 
				}

				else if(isset($_POST['add_spthesis'])){
					$adviser = ($_POST['adviser']);
					$type = ($_POST['type']);
					$mat_type = "sp_thesis";

					$this->m_add_material->addSpThesis($id, $title, $author, $year, $date,$quantity, $status,$picture, $adviser, $mat_type, $type); 
				}

				else if(isset($_POST['add_other'])){
					$type = ($_POST['type']);
					$mat_type = "other";

					$this->m_add_material->addOther($id, $title, $author, $year, $date,$quantity, $status, $picture, $mat_type, $type); 
					$this->m_add_material->delete_suggestion($auxil_id);
				}
			redirect('../index.php/Index/management');
		}

	}

?>