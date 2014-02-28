<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Usercart extends CI_Controller{

		function __construct(){
			parent::__construct();

			$this->load->model(array('user','material'));
			$this->load->helper(array('date','url','form'));
			$this->load->library(array('encrypt','session','input'));
		}

		public function index() {
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');		
				$id = $session_data['id'];
				$data = (array) $this->user->info($id)[0];
				// $borrowed_materials = $this->borrowed_material->getBorrowed($id,"");
				// $reserved_materials = $this->reserved_material->getReserved($id,"");
				// $alert = $this->borrowed_material->alert($id);
				// $data = array(
				// 	'borrowed' => $borrowed_materials,
				// 	'reserved' => $reserved_materials,
				// 	'alert' => $alert
				// 	);
				// $data = array_merge($data, (array) $this->user->info($id)[0]);
				$cart = $this->material->getCart($id);
				$data['cart'] = $cart;
				$this->load->view('v_user_material',$data);
			}
			else{
				echo "Access not allowed";
			}
		}

		public function c_search_borrowed() {
			$id = $this->session->userdata('id');
			$input = $this->db->post('input',TRUE);
			$borrowed_materials = $this->borrowed_material->getBorrowed($id,$input);
			foreach($borrowed_materials as $row){
				$data['row'] = $row;
				$this->load->view("v_borrow_list", $data);
			}
		}

		public function c_search_reserved() {
			$id = $this->session->userdata('id');
			$input = $this->db->post('input',TRUE);
			$reserved_materials = $this->reserved_material->getReserved($id,$input);
			foreach($reserved_materials as $row){
				$data['row'] = $row;
				$this->load->view('v_reserve_list',$data);
			}
		}
	}
?>