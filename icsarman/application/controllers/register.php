<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	    $this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('user');
	}
	
	function index()
	{
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
		else
		{
			$data = null;
		}
		
		if($this->input->post('username') == ""){
			$data['error_username'] = '';
			$data['error_snumber'] = '';
			$data['error_email'] = '';
			$this->load->view('register_form',$data);
		}
		else{
			$this->check_if_exists();
		}
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
        
		$p = $this->input->post('picture');
		if($p)
			$userdata['picture'] = $this->input->post('picture');
		else
			$userdata['picture'] = "";
		
		$r = $this->input->post('referred_by');
		if($r)
			$userdata['referred_by'] = $this->input->post('referred_by');
		else
			$userdata['referred_by'] = NULL;
		
		$s = $this->input->post('studentnumber');
		$e = $this->input->post('employeenumber');
		if($s)
			$userdata['studentnumber'] = $this->input->post('studentnumber');
		else if($e)
			$userdata['studentnumber'] = '0'.$this->input->post('employeenumber');

		$this->user->register($userdata);	
		redirect('home',$data);
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
			
			$this->load->view('register_form',$data);
			return;
		}else{
			$this->createUser();
		}
	}
}

?>