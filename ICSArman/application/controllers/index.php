<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Index extends CI_Controller{

		function __construct(){
		parent::__construct();
		
		}

		function index(){
		$this->load->view("home");
		}

		function search(){
		$this->load->view("search");
		}

		function account_panel(){
		$this->load->view("account_panel");
		}

		function management(){
		$this->load->view("management");
		}

		function library_information(){
		$this->load->view("library_information");
		}


	}

?>