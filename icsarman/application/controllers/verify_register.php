<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Verify_Register extends CI_Controller {
 function __construct()
 {
   parent::__construct();
 }
 
	public function createUser(){	
		$userdata['username'] = $this->input->post('username');
        $userdata['password'] = sha1($this->input->post('password'));
        $userdata['firstname'] = $this->input->post('firstname');
        $userdata['middleinitial'] = $this->input->post('middleinitial');
        $userdata['lastname'] = $this->input->post('lastname');
        $userdata['email'] = $this->input->post('email');
		$userdata['birthday'] = $this->input->post('birthday');
		$userdata['type'] = $this->input->post('type');
        $userdata['school'] = $this->input->post('school');        
        $userdata['address'] = $this->input->post('address');
        $userdata['status'] = $this->input->post('status');        
        $userdata['referred_by'] = $this->input->post('referred_by');		
		
		$s = $this->input->post('studentnumber');
		$e = $this->input->post('employeenumber');
		if($s)
			$userdata['studentnumber'] = $this->input->post('studentnumber');
		else if($e)
			$userdata['studentnumber'] = '0'.$this->input->post('employeenumber');

			
		$this->load->model('user');
		//var_dump($data);
		$this->user->register($userdata);		
		//$this->load->view('form_success');
		redirect('home', 'refresh');
		//$this->load->view('login_view');
	}
	
	public function check_if_exists(){
		$data['error_username'] = '';
		$data['error_snumber'] = '';
		$data['error_email'] = '';		
		
		$userdata['username'] = $this->input->post('username');
		$userdata['email'] = $this->input->post('email');
		$stud = $this->input->post('studentnumber');
		$emp = $this->input->post('employeenumber');
		if($stud){
			$userdata['studentnumber'] = $this->input->post('studentnumber');
			$data['temp'] = '*student number already exists';
		}else if($emp){
			$userdata['studentnumber'] = '0'.$this->input->post('employeenumber');		
			$data['temp'] = '*employee number already exists';
		}
		
		$this->db->select('username');
		$this->db->from('user_profile');
		$this->db->where('username',$userdata['username']);
		$u = $this->db->get();
		$this->db->select('studentnumber');
		$this->db->from('user_profile');
		$this->db->where('studentnumber',$userdata['studentnumber']);
		$s = $this->db->get();
		$this->db->select('email');
		$this->db->from('user_profile');
		$this->db->where('email',$userdata['email']);
		$e = $this->db->get();
		
		if($u->result()||$s->result()||$e->result()){
			if($u->result())
				$data['error_username'] = '*username already exists';			
			if($s->result())
				$data['error_snumber'] = $data['temp'];				
			if($e->result())
				$data['error_email'] = '*email already exists';				
			
			$this->load->view('form_view',$data);
			return;
		}else{
			$this->createUser();
		}
	}
}
?>	