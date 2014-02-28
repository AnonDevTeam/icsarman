<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {
	function __construct()
	{
	   parent::__construct();	   
	   $this->load->helper(array('form'));
	   $this->load->library(array('session','form_validation'));
	   $this->load->model('user');
	}
	
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			
			$id = $session_data['id'];
			$data = (array) $this->user->info($id)[0];
			$this->load->view('home', $data);
			//var_dump($data);
		}
		else
		{
			//If no session, redirect to login page	 
			$this->verify_login();
		}
	}
	
	function verify_login(){
		//This method will have the credentials validation
		//$this->load->helper(array('form', 'url'));
		//$this->form_validation->set_message('required', '*required');
		//$this->form_validation->set_message('min_length', '*too short');
		$this->form_validation->set_rules('user', 'user', 'callback_check_database');
		$this->form_validation->set_rules('pw', 'pw', 'callback_check_database');
		//if($this->form_validation->run() == FALSE)
		//if($this->check_database($this->input->post('pw')))
		if($this->check_database($this->input->post('pw'))){
			$session_data = $this->session->userdata('logged_in');
		    
			$id = $session_data['id'];
			$data = (array) $this->user->info($id)[0];			

		    $this->load->view('home', $data);
		}else if($this->form_validation->run() == FALSE){
		
			$data = null;
			$this->load->view('home', $data);
		}
	}
	
	function check_database($pw)
	{
	    //Field validation succeeded.  Validate against database
	    $password = sha1($pw);
	    $username = $this->input->post('user');
	    //query the database
	    $result = $this->user->login($username, $password);
	    if($result)
	    {
			$sess_array = array();
			foreach($result as $row)
			{			
				$sess_array = array(
					'id' => $row->id
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
	    }
	    else
	    {
			$this->form_validation->set_message('check_database', '*invalid username or password');
			return false;
	    }
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		$data = null;
		redirect('home', $data);
	}
  
}
?>