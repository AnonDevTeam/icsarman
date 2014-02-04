<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start();
	class SearchController extends CI_Controller{
	
		
		function Control(){
		parent::__construct();

		$this->load->model('searchModel');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->helper('html');
		}
		
		function index(){
			$this->load->view('search_index');
		}
		
		public function searchMaterial(){	//kapag kinclick yung GO BUTTON
		$arr = array();
		$arr2 =array();
		$id = array();
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
			if($_GET['type'] == 'All'){	//kapag ALL ANG PINILI SA DROPDOWN ---- search lahat ang peg T.T hindi pa tapos to
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
			
			else{	//kapag BOOK | MAGAZINE|SP_THESIS|OTHER yung pinili sa dropdown
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
		
		function searchTag($input){	//pupunta dito pag walang nakuha dun sa mga tables. sa matrial_tag na magssearch
		$_SESSION['noresult'] = false;
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
			else{
				echo "<div style=\"width:150px;\">";			//okay. HINDI KO ALAM PANO MAGPAPALABAS NG MAGIC NA DIV KAPAG WALANG RESULT NA LUMABAS. AJUJUJU
				echo "No results found";								//HINDI KO RIN ALAM KUNG BAKIT DUMODOBLE YUNG SEARCHBOX KAPAG NAGSESEARCH SA MATERIAL_TAG. AJUJUJUJUJUJUJU
				echo "</div>";
			}
		}
		
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
		
		function pagination(){
			$count = count($_SESSION['array']);
			$config = $this->init_pagination($count);
			$a = $this->uri->segment(3);
			$b = $config['per_page'];
			$res = $_SESSION['array'];
			$x = (integer)$a;

				$data["result"] = array_splice($res,$a, $b);
				$data["links"] = $this->pagination->create_links();


			$this->load->view("search_index", $data);
		}
		
		function search(){
			$data = $_POST['input'];
			$type = 1; //type
			$count = 0; //count
			$max = 5;$num=0;
			echo "<div style=\"width:150px;\">";

			//constraints
			while($count < $max){
			 	if($type > 4) break;
			 	$res = $this->searchModel->searchOnchange($data, $type);
				foreach($res as $row){
					if($count < $max){
						switch($type){
							case 1: echo "<div style=\"width:150px;\" id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->title."</div>"; break;
							case 2: echo "<div style=\"width:150px;\" id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->author."</div>"; break;
							case 3: echo "<div style=\"width:150px;\" id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->publisher ."</div>"; break;
							case 4: echo "<div style=\"width:150px;\"  id = \"res".$num."\" onclick = \"text(".$num.")\" class='suggest_out'>".$row->adviser ."</div>"; break;
						}
			 			$count = $count + 1;$num=$num+1;
					}
					else break;
				}
				$type = $type + 1;
			}
			
			echo"</div>";
		}
		
		function getForm(){
		echo json_encode($this->load->view('form_view',array(), TRUE));
		}
		
		function checkStudent(){
			$stdnum = $_POST['stdnum'];
			$name = $_POST['name'];
			$id = $_POST['id'];
			$result_profile = $this->searchModel->searchStud($name, $stdnum);
			$mat_id = $this->searchModel->getMaterial($id);
			$count = count($result_profile);

			if ($result_profile == 0)
				echo "</br></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStudent Number ". $stdnum ." does not exist.";
			else{
				//get the material_id of book and decrease its quantity
				$quantity =  (integer)$mat_id[0]->quantity;
				$matId = (integer)$mat_id[0]->material_id;
				$quantity = $quantity-1;
				$user_id = (integer)$result_profile[0]->id;
				$this->searchModel->updateReserve($user_id , $matId);
				$this->searchModel->updateTable($quantity, $matId);

			}	
			
		}		
	}

?>