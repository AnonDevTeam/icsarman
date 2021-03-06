<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Account_Borrow_Request extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_approve_request');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function approve_accounts_view(){
		$this->load->view("/admin_includes/header");
		$data['users']=$this->m_approve_request->get_verified_users();
		$this->load->view("approve_accounts_view",$data);
		$this->load->view("/admin_includes/footer");
		}

		function manage_requests_view(){
		$this->load->view("/admin_includes/header");

		$data['requests'] = $this->m_approve_request->get_all_request_data();

		$this->load->view("manage_requests_view", $data);

		if(isset($_POST['approve'])){
			$this->m_approve_request->approve_request($_POST['approve']);
			redirect('../index.php/portal/manage_requests_view'); 
				}
		else if(isset($_POST['disapprove'])){ 
			$this->m_approve_request->reject_request($_POST['disapprove']); 
			redirect('../index.php/portal/manage_requests_view');
		}

		$this->load->view("/admin_includes/footer");
		}

		function activate_user(){
			$this->m_approve_request->activate_user(["id"=>$_POST['id']
										]);
			redirect('../index.php/portal/approve_accounts_view');
		}

		function delete_user(){
			$this->m_approve_request->delete_user(["id"=>$_POST['id']
										]);
			redirect('../index.php/portal/approve_accounts_view');
		}

		
		

	}

?>