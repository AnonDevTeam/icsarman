<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//session_start();
	class SearchController extends CI_Controller{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('searchModel');
			$this->load->helper(array('form'));
			$this->load->library('session');
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('encrypt');			
			$this->load->helper('html');
		}
		
		function index(){
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			}else
			{
				$data['username'] = "no";
			}
		
			$this->load->view('search', $data);
		}

	/* SEARCHMATERIAL FUNCTION */

		public function searchMaterial(){	//kapag kinclick yung GO BUTTON
		// $this->showQueue();
		$arr = array();
		$arr2 =array();
		$id = array();

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
			if($_GET['type'] == 'All'){	/*if the choice from the dropdown is All*/
				$result = $this->searchModel->searchAll($_GET['search_input']);
				
				if($result['book'] == NULL && $result['sp_thesis'] == NULL && $result['material'] == NULL && $result['book_like'] == NULL && $result['sp_thesis_like'] == NULL && $result['material_like'] == NULL){	//if no material id  fetched
					$this->searchTag($_GET['search_input']);	//it will search on the material tags
				}
				else{	//sa bawat is statement, kinukuha lang yung mga material_ids and pinupush sa array na $id
					if($result['book'] != NULL) {		//may exactly the same publisher
						foreach($result['book'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}	
					}
					if($result['sp_thesis'] != NULL) {	//may exactly the same adviser
						foreach($result['sp_thesis'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}	
					}
					if($result['material'] != NULL) {	//may exaclty the same author|title
						foreach($result['material'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}				
					}
					if($result['book_like'] != NULL) {	//may kalike na publisher
						foreach($result['book_like'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}	
					}
					if($result['sp_thesis_like'] != NULL) {	//may kalike na adviser
						foreach($result['sp_thesis_like'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}	
					}
					if($result['material_like'] != NULL) {	//may kalike na author|title
						foreach($result['material_like'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}	
					}
					//kinukuha na yung mga info ng bawat material_id
					foreach($id as $row){
						$query = $this->searchModel->searchInfo($row);
						array_push($arr, $query);
					}
				}
			}
			
			else{	/* if the choice from the dropdown is specific*/
				$result = $this->searchModel->searchTable($_GET['type'], $_GET['search_input']);
				
				if($result['table'] == NULL && $result['table_like'] == NULL && $result['material'] == NULL && $result['material_like'] == NULL)
					$this->searchTag($_GET['search_input']);
					
				else{//sa bawat is statement, kinukuha lang yung mga material_ids and pinupush sa array na $id
					if($result['table'] != NULL){	//may exactly the same
						foreach($result['table'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}
					}
					if($result['material'] != NULL){	//may exactly the same
						foreach($result['material'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}
					}
					if($result['table_like'] != NULL){	//may kalike lang
						foreach($result['table_like'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}
					}
					if($result['material_like'] != NULL){	//may kalike lang
						foreach($result['material_like'] as $row){
							array_push($id, $row->material_id);
							$id = (array_unique($id));
						}
					}
				}
				//kinukuha na yung mga info ng bawat material_id
				foreach($id as $row){
					$query = $this->searchModel->searchInfo($row);
					array_push($arr, $query);
				}
				
			}
			$arr2 = array_values($arr2);
			foreach($arr as $row){	//since associative array ang laman ng arr, ililipat sa arr2 para mas madali ang pagffetch
				if($row[0] != NULL)
					array_push($arr2, $row[0]);
			}
			$_SESSION['array'] = $arr2;	//nilagay sa session para maaccess sa ibang functions
			$this->pagination();
		}

	/* SEARCHTAG FUNCTION*/	
		
		function searchTag($input){	//pupunta dito pag walang nakuha dun sa mga tables. sa matrial_tag na magssearch
		$arr = array();
		$arr2 =array();
		$id = array();
		
			$result = $this->searchModel->searchTag('material_tag', $input);	//ang result nito ay material_ids
	
			if($result != NULL){
				foreach($result as $row){
					array_push($id, $row->material_id);
					$id = (array_unique($id));
				}
				
				foreach($id as $row){
					$query = $this->searchModel->searchInfo($row);
					array_push($arr, $query);
				}

				$arr2 = array_values($arr2);
				foreach($arr as $row){
					if($row['0'] != NULL)
					array_push($arr2, $row['0']);
				}
				$_SESSION['array'] = $arr2;
				$this->pagination();
			}
		}


	/* INIT_PAGINATION FUNCTION*/	
		
		function init_pagination($count=""){
		
			$this->load->library('pagination');
			$config['total_rows'] = $count; //gets all the entries for the parameter of this function $this->get('tablename')
			$config['base_url'] = base_url() . '/index.php/searchController/pagination/';
			$config['per_page'] = 5;
			$config['num_links'] = 20;
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 
			$this->pagination->initialize($config);
			return $config;
			
		}

	/* PAGINATION FUNCTION */	
		
		function pagination(){
			$count = count($_SESSION['array']);
			$config = $this->init_pagination($count);
			$a = $this->uri->segment(3);
			$b = $config['per_page'];
			$res = $_SESSION['array'];
			$x = (integer)$a;

				$data["result"] = array_splice($res,$a, $b);
				$data["links"] = $this->pagination->create_links();
				
				if($data["result"] == NULL)
					$data["noresult"] = true;


			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			}else
			{
				$data['username'] = "no";
			}
		
			$this->load->view('search', $data);		
					
		}
		

	/* SEARCH FUNCTION FOR DROPDOWN */

		function search(){
			$data = $_POST['input'];
			$type = 1; //type
			$count = 0; //count
			$max = 5;
			$num=0;

			//constraints
			while($count < $max){
			 	if($type > 4) break;
			 	$res = $this->searchModel->searchOnchange($data, $type);
				foreach($res as $row){
					if($count < $max){
						switch($type){
							case 1: echo "<div id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->title."</div>"; break;
							case 2: echo "<div id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->author."</div>"; break;
							case 3: echo "<div id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->publisher ."</div>"; break;
							case 4: echo "<div id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->adviser ."</div>"; break;
						}
			 			$count = $count + 1;$num=$num+1;
					}
					else break;
				}
				$type = $type + 1;
			}
			
		}
		
	/* GETFORM FUNCTION*/

		function getForm(){
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			}else
			{
				$data['username'] = "no";
			}
		
			//echo json_encode($this->load->view('register_form',$data, TRUE));
			echo json_encode($this->load->view('register_form',array(), TRUE));
		}
		
	/* CHECK STUDENT FOR RESERVATION*/


		function checkStudent(){
			$stdnum = $_POST['stdnum'];
			$name = $_POST['name'];
			$mat_id = $_POST['id'];

			$mat_quantity = $this->searchModel->getMaterial($mat_id);	//get the quantity of material id chosen
			$result_profile = $this->searchModel->searchStud($name, $stdnum);	//check if the username and student number entered exist int he database

			if ($result_profile == 0)
				echo "</br></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStudent Number ". $stdnum ." does not exist.";
			
			else{	/* if tama or nageexist yung student number && username*/

				$checker = $this->searchModel->checkCart($stdnum, $mat_id);
				if($checker == 1){
					echo "You are already on the queue";
				}
				else{
					$quantity =  (integer)$mat_quantity[0]->quantity;	//get quantity
					$quantity = $quantity-1;	//decrement quantity

					$user_id = (integer)$result_profile[0]->id;	//get user_id 

					$this->searchModel->updateCart($user_id, $mat_id);
					$this->searchModel->updateTable($quantity, $mat_id);
				}

			}	
			
		}

	/* FINDSTUDENT FUNCTION IF EXIST*/

		function findStudent(){
			$stdnum = $this->input->post('stdnum');
			$name   = $this->input->post('name');
			$id = $this->input->post('id');


			$exists = $this->searchModel->checkStudentNumber($stdnum,$name);

			if($exists){
				echo 1;
			}
			else{
				//do your reservation queries here
				echo 0;
			}

		}

	/* GET THE QUEUE */
		function showQueue(){
			$mat_id = 5;

			$data['list'] = $this->searchModel->getQueue($mat_id);
			
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
			}else
			{
				$data['username'] = "no";
			}
		
			$this->load->view('search', $data);
			
		}

	}

?>