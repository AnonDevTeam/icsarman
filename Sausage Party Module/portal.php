<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Portal extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('model');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function index(){
		$this->load->view("/admin_includes/header");
		$this->load->view("addbook_view");
		$this->load->view("/admin_includes/footer");
		}

		function add_book_view(){
		$this->load->view("/admin_includes/header");
		$this->load->view("addbook_view");
		$this->load->view("/admin_includes/footer");
		}

		function edit_book_view(){
		$this->load->view("/admin_includes/header");
		
		$data['materials'] = $this->model->get_all_material_data();
		$data['books'] = $this->model->get_all_book_data();
		$data['magazines'] = $this->model->get_all_magazine_data();
		$data['others'] = $this->model->get_all_other_data();
		$data['sp_thesis'] = $this->model->get_all_sp_thesis_data();

		$this->load->view("edit_book_view",$data);
		$this->load->view("/admin_includes/footer");
		}

		function manage_requests_view(){
		$this->load->view("/admin_includes/header");
		$this->load->view("manage_requests_view");
		$this->load->view("/admin_includes/footer");
		}

		function callAddMaterial(){
				$id = ($_POST['id']);
				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$year = ($_POST['year']);
				$date = ($_POST['date_added']);
				$quantity = ($_POST['quantity']);
				$status = 1;
				$picture;

				/*
				$allowedExts = array("gif", "jpeg", "jpg", "png");
				$temp = explode(".", $_FILES["file"]["name"]);
				$extension = end($temp);
				if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/jpg")
				|| ($_FILES["file"]["type"] == "image/pjpeg")
				|| ($_FILES["file"]["type"] == "image/x-png")
				|| ($_FILES["file"]["type"] == "image/png"))
				&& in_array($extension, $allowedExts))
				{
					  if ($_FILES["file"]["error"] > 0)
					    {
					    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					    }
					  else
					    {
					    	$photo = $id ."_". $_FILES["file"]["name"];
					    if (file_exists("photos/" . $photo))
					      {
					      echo $_FILES["file"]["name"] . " already exists. ";
					      }
					    else
					      {
					      move_uploaded_file($_FILES["file"]["tmp_name"],
					      "photos/" . $photo);
					      $this->model->uploadPhoto($photo, $id);
					      }
					    }
				}
				else{
				  echo "Invalid file";
				}
				*/

				if(isset($_POST['add_book'])){
					$course_code = ($_POST['course_code']);
					$publisher = ($_POST['publisher']);

					$this->model->addBook($id, $title, $author, $year, $date,$quantity, $status,$picture, $course_code, $publisher); 
				}
				else if(isset($_POST['add_mag'])){
					$month = ($_POST['month']);
					$volume_no = ($_POST['volume_no']);

					$this->model->addMag($id, $title, $author, $year, $date,$quantity, $status,$picture, $month, $volume_no); 
				}

				else if(isset($_POST['add_spthesis'])){
					$adviser = ($_POST['adviser']);
					$type = ($_POST['type']);

					$this->model->addSpThesis($id, $title, $author, $year, $date,$quantity, $status,$picture, $adviser, $type); 
				}

				else if(isset($_POST['add_other'])){
					$type = ($_POST['type']);

					$this->model->addOther($id, $title, $author, $year, $date,$quantity, $status,$picture, $type); 
				}
			redirect('../index.php/portal/add_book_view');
		}

		function callEditBook(){
			$this->model->update_book(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$_POST['picture'],
                                        "course_code"=>$_POST['course_code'],
                                        "publisher"=>$_POST['publisher'],
										]);
			redirect('../index.php/portal/edit_book_view');
		}
		function callEditMagazine(){
			$this->model->update_magazine(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$_POST['picture'],
                                        "volume_number"=>$_POST['volume_number'],
                                        "month"=>$_POST['month'],
										]);
			redirect('../index.php/portal/edit_book_view');
		}
		function callEditSPThesis(){
			$this->model->update_sp_thesis(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$_POST['picture'],
                                        "adviser"=>$_POST['adviser'],
                                        "type"=>$_POST['type'],
										]);
			redirect('../index.php/portal/edit_book_view');
		}
		function callEditOther(){
			$this->model->update_other(["material_id"=>$_POST['material_id'],
										"title"=> $_POST['title'],
										"author"=>	$_POST['author'],
										"year"=>$_POST['year'],
										"date_added"=>$_POST['date_added'],
										"quantity"=>$_POST['quantity'],
                                        "status"=>$_POST['status'],
                                        "picture"=>$_POST['picture'],
                                        "type"=>$_POST['type'],
										]);
			redirect('../index.php/portal/edit_book_view');
		}

		function callApproveRequest(){
			$SQL = "SELECT transaction_id FROM borrowed_material where is_approved = 0";
			$result = mysql_query($SQL);
			while ( $db_field = mysql_fetch_assoc($result) ) {
				$transaction_id[] = $db_field['transaction_id'];
			}
			$counter = count($transaction_id);
		
			$x = 0;
			while($x <= $counter){
				if(isset($_POST['accept'.$x])){
					$this->model->requestApproval(1, $transaction_id[$x]); 
					break;
				}
				else if(isset($_POST['reject'.$x])){
					$this->model->rejectRequest($transaction_id[$x]);
					break;
				}
				$x++;
		}
			redirect('../index.php/portal/manage_requests_view');
		}

		function callDeleteBook(){
		$this->model->delete_book($_POST['delete']);
		redirect('../index.php/portal/edit_book_view');
		}
		function callDeleteMagazine(){
		$this->model->delete_magazine($_POST['delete']);
		redirect('../index.php/portal/edit_book_view');
		}
		function callDeleteSPThesis(){
		$this->model->delete_sp_thesis($_POST['delete']);
		redirect('../index.php/portal/edit_book_view');
		}
		function callDeleteOther(){
		$this->model->delete_other($_POST['delete']);
		redirect('../index.php/portal/edit_book_view');
		}
	}

?>