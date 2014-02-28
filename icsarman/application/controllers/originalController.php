<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class SearchController extends CI_Controller{
		function Control(){
		parent::__construct();

		$this->load->model('searchModel');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		}
		
		function index(){
			$this->load->view('search_index');
		}
		
		function searchMaterial(){
			if($_POST['type'] == 'All'){	//hahanapin sa lahat ng tables
				
				$check = $this->searchModel->searchAll($_POST['input']);	//check muna kung nasa material na table
			/*	if($check == 0){
					$this->searchTag();
				}
				else{
					$result = $this->searchModel->searchMaterial($_POST['input'], 'book');	//icheck sa book na table
					$mat = 'Book';
					if($result == NULL){
						$result = $this->searchModel->searchMaterial($_POST['input'], 'magazine');	//if wala, check sa magazine na table
						$mat = 'Magazine';
						if($result == NULL){
							$result = $this->searchModel->searchMaterial($_POST['input'], 'sp_thesis');	//if wala prin, check sa sp_thesis na table
							$mat = 'Sp_thesis';
							if($result == NULL){
								$result = $this->searchModel->searchMaterial($_POST['input'], 'other');	//if wala prin, check sa other na table
								$mat = 'Other';
							}
						}
					}
					//$this->printResult($result, $mat);
				}
			}
			else{
				$result = $this->searchModel->searchMaterial($_POST['input'], $_POST['type']);
				$mat = $_POST['type'];
				$this->printResult($result,$mat);
			}
		*/
		}
		}
			
		function searchTag(){
			echo "<div style=\"border:2px solid;\"><p> Title: ";
			echo "Is this what you're looking for?";
			
		}
		
		function search(){
			$data = $_POST['input'];
			echo $data;
			$result = $this->searchModel->searchOnchange($data);
			//var_dump($result);
			//view pasa result
			//sa view
		}
		
		function getForm(){
		echo json_encode($this->load->view('form_view',array(), TRUE));
		}

		function printResult($result, $mat){
			foreach($result as $row){
				echo "<div style=\"border:2px solid;\"><p> Title: ";
				echo $row->title . "</br>";
				echo "Author: " .  $row->author  . "</br>";
				echo "Year: " .  $row->year  . "</br>";

				if($mat== 'Book'){
					echo "Publisher: " .  $row->publisher  . "</br>";
					echo "Course Code: " . $row->course_code  . "</br>";
					echo "Type: " . $mat  . "</br>";		
				}
				else if($mat== 'Magazine'){
					echo "Month: " . $row->month  . "</br>";
					echo "Volume Number: " . $row->volume_number  . "</br>";
					echo "Type: " . $mat  . "</br>";
				}
				else if($mat== 'SP' || $mat == 'Thesis'){
					echo "Adviser: " . $row->adviser  . "</br>";
					echo "Type: " . $mat  . "</br>";
				}
				echo  "Status: ";
				if($row->status == 0) 
				{
					echo "On Shelf";
					echo "<input type=\"button\" id=\"reserve-btn-\".$row->material_id class=\"reserve-btns\" name=\"reserve-btn-name\" value=\"Reserve\"/ >";
					echo "<div class=\"user-info\" id=\"user-info-\".$row->material_id> </div>";
				}
				else if($row->status == 1) echo "Pending";
				else if($row->status == 2) echo "Borrowed";
				else if($row->status == 3) echo "Obsolete";
				else echo "Reserved";
				echo "</p></div></br>";
			}
		
		}
		
		
		
	}

?>