<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Verify_Register extends CI_Controller {
 function __construct()
 {
   parent::__construct();
 }
 
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->form_validation->set_message('required', '*required');
		$this->form_validation->set_message('min_length', '*too short');
		$this->form_validation->set_message('matches', '*must match password');
		$this->form_validation->set_message('is_unique', '*must be unique');
		$this->form_validation->set_message('valid_email', '*must be valid');
		$this->form_validation->set_message('regex_match', '*not in correct format');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[user_profile.username]|min_length[4]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
		$this->form_validation->set_rules('repassword', 'repassword', 'required|matches[password]');
        $this->form_validation->set_rules('firstname', 'firstname', 'required|min_length[1]');
        $this->form_validation->set_rules('middleinitial', 'middleinitial', 'required|min_length[1]');
        $this->form_validation->set_rules('lastname', 'lastname', 'required|min_length[1]');
		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('studentnumber', 'studentnumber', 'required|regex_match[/^\d{4}[\-]\d{5}$/]');
		$this->form_validation->set_rules('birthday', 'birthday', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('school', 'school', 'required');        
        $this->form_validation->set_rules('address', 'address', 'required');
        
        if(!$this->form_validation->run())
        {
            $this->load->view('form_view');
        }
        else
        {
			$this->load->model('register_model');
            $this->load->view('form_success');
        }
    }
}
?>