<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class C_library_information extends CI_Controller{

		function __construct(){
		parent::__construct();
			
		}

		function library_information_view(){
		$this->load->view("library_information");
	
		}

	}
?>