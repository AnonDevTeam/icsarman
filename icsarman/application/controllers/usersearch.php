<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usersearch extends CI_Controller{

		function __construct(){
			parent::__construct();

			$this->load->model(array('user','material'));
			$this->load->helper(array('date','url','form'));
			$this->load->library(array('encrypt','session','input'));
		}

		public function index(){
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$id = $session_data['id'];
				$data = (array) $this->user->info($id)[0]; //kailangan po ito!!!
				$this->load->view('v_user_search',$data);
			}
			else{
				echo "Access not allowed";
			}
		}

		public function search() {
			$data['firstnum'] = 1;
			$data['lastnum'] = 5;
			if($this->session->userdata('logged_in'))
			{
				$session_data = $this->session->userdata('logged_in');
				
				$id = $session_data['id'];
				$result = $this->user->info($id);
				foreach($result as $row)
				{		
					$data = array(
						'type' => $row->type,
						'username' => $row->username,
					);
				}		
			}


			$this->load->view('v_user_search',$data);
		}

		public function c_suggest_material() {
			$input = $this->input->post('input',TRUE);
			$type = $this->input->post('type',TRUE);

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
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
			$type = $_POST['type'];
			$page = $_POST['page'];
			$firstnum = $_POST['firstnum'];
			$lastnum = $_POST['lastnum'];
			$object_clicked = $_POST['object_clicked'];

			switch($type){
				case "All": $result = $this->material->searchAll($input,$page); break;
				case "Book": $result = $this->material->search($input,"book",NULL,$page); break;
				case "Magazine": $result = $this->material->search($input,"magazine",NULL,$page); break;
				case "SP": $result = $this->material->search($input,"sp_thesis","sp",$page); break;
				case "Thesis": $result = $this->material->search($input,"sp_thesis","thesis",$page); break;
				case "Others": $result = $this->material->search($input,"other",NULL,$page); break;
			}
			
			
			$data['currpage'] = $result['currpage'];
			$data['pageno'] = $result['pageno'];
			$data['firstnum'] = $firstnum;
			$data['lastnum'] = $lastnum;
			$data['object_clicked'] = $object_clicked;
			unset($result['currpage']);
			unset($result['pageno']);

			foreach($result as $row){
				$data['row']=$row;
				$data['isInQueue'] = $this->isInQueue($id,$row->id);
				$data['userid'] = $id;
				$this->load->view('v_search_list',$data);
			}
			// Pagination: prints the numbers at the end of the search results
			$this->load->view('v_page_nav',$data);	
		}

		public function isInQueue($id, $group_id){
			$result = $this->material->getFromQueue($id,$group_id);
			if(empty($result)){
				return false;
			}
			return true;
		}

		public function hasQueue(){
			/* modified */
			$group_id = $this->input->post('groupid');
			$result = $this->material->getMaterialItem($group_id);
			$min = 0;
			$i=0;
			foreach ($result as $r) { //gets each instance of the material and checks if there is a queue on that instance
				$queue = $this->material->getMaterialQueue($group_id,$r['id']);
				foreach($queue as $item){
					if(!empty($item)){
						$listofqueue[$i]['material_id']=$r['id'];
						$listofqueue[$i]['count']=$item['count'];
						$i++;
					}
				}
			} //if the loop finishes and the list of queue is not empty
			if(!empty($listofqueue)){
				for($i=1;$i<count($listofqueue);$i++){ //find the material with the least number of people in the queue
					if(intval($listofqueue[$i]['count'])<intval($listofqueue[$min]['count'])){
						$min=$i;
					}
				}
				$sess_data = $this->session->userdata('logged_in');
				$id = $sess_data['id'];
				$result = $this->material->getMaterialQueue($group_id,$listofqueue[$min]['material_id']); //get the instance with the least length of queue
				
				if(empty($result)){ //ignore this part muna
					echo "There is no queue for this Material. Enqueue to reserve and get this Material now.;;{$r['id']}";
				}
				else{ //prints the length of the queue of the material's instance
					if($result[$min]['count']==1) echo "There is {$result[$min]['count']} person in the queue. Do you want to wait and enqueue for this Material?;;{$r['id']}";
					else echo "There are {$result[$min]['count']} people in the queue. Do you want to wait and enqueue for this Material?;;{$r['id']}";
				}
			}
			else{
				echo "There is no queue for this Material. Enqueue to reserve and get this Material now.\n;;{$r['id']}";
			}
		}

		public function enqueue(){
			$this->material->addToQueue($_POST['groupid'],$_POST['materialid'],$_POST['userid']);
			$row = $this->material->getMaterialTitle($_POST['groupid']);

			echo $row['title'].";;";
	
			$id = $this->session->userdata('id');
			$input = filter_var($_POST['input'], FILTER_SANITIZE_STRING);
			$type = $_POST['type'];
			$page = $_POST['page'];
			$firstnum = $_POST['firstnum'];
			$lastnum = $_POST['lastnum'];
			$object_clicked = $_POST['object_clicked'];

			switch($type){
				case "All": $result = $this->material->searchAll($input,$page); break;
				case "Book": $result = $this->material->search($input,"book",NULL,$page); break;
				case "Magazine": $result = $this->material->search($input,"magazine",NULL,$page); break;
				case "SP": $result = $this->material->search($input,"sp_thesis","sp",$page); break;
				case "Thesis": $result = $this->material->search($input,"sp_thesis","thesis",$page); break;
				case "Others": $result = $this->material->search($input,"other",NULL,$page); break;
			}
			
			
			$data['currpage'] = $result['currpage'];
			$data['pageno'] = $result['pageno'];
			$data['firstnum'] = $firstnum;
			$data['lastnum'] = $lastnum;
			$data['object_clicked'] = $object_clicked;
			unset($result['currpage']);
			unset($result['pageno']);

			foreach($result as $row){
				$data['row']=$row;
				$data['isInQueue'] = $this->isInQueue($id,$row->id);
				$data['userid'] = $this->session->userdata('id');
				$this->load->view('v_search_list',$data);
			}
			// Pagination: prints the numbers at the end of the search results
			$this->load->view('v_page_nav',$data);
		}

		//function for checking purposes
		public function temp($group_id){
			$data['result'] = $result = $this->material->getMaterialItem($group_id);
			$i=0;
			$data['queue'] = $this->material->getMaterialQueue($group_id,1);
			/*foreach ($result as $r) { //gets each instance of the material and checks if there is a queue on that instance
				$queue = $this->material->getMaterialQueue($group_id,$r['id']);
				foreach ($queue as $q) {
						$data['queue'][$i] = array('material_id'=>$q['material_id'],'count'=> $q['count']);
						$i++;
				}
				if(empty($queue)){
					$data['check'] = "here";
					$data['queue'] = $r['id'];
					break;
					foreach ($queue as $q) {
						$data['queue'][$i] = array('material_id'=>$q['material_id'],'count'=> $q['count']);
						if(empty($temp)){
							unset($data['check']);
							$data['check'] = "here";
							$data['queue'] = $temp;
							return;
						}
						else{
							$data['check'][$i] = "there";
							$data['queue'] = $temp;
						}
						$i++;
					}
				}
				else{
					$data['check'] = "there";
				}
				$i++;
			}*/
			$this->load->view('v_temp',$data);
		}
	}
?>