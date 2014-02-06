<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Verify_Login extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 function index()
 {
   //This method will have the credentials validation
   //$this->load->helper(array('form', 'url'));
   $this->load->library('form_validation');
   //$this->form_validation->set_message('required', '*required');
   //$this->form_validation->set_message('min_length', '*too short');
   $this->form_validation->set_rules('user', 'user', 'callback_check_database');
   $this->form_validation->set_rules('pw', 'pw', 'callback_check_database');
   //if($this->form_validation->run() == FALSE)
   //if($this->check_database($this->input->post('pw')))
   if($this->check_database($this->input->post('pw'))){
	redirect('home');
   
   }else if($this->form_validation->run() == FALSE){
	$this->load->view('login_view');
   }
   
   /*
   {
	 $this->load->view('login_view');
     //header('Location:'.site_url('home'));
   }
   else
   {
	 if($this->check_database($this->input->post('pw'))){
		redirect('home');
	 }else{
		
	 }
   }*/

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
         'id' => $row->id,
         'username' => $row->username
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
}
?>