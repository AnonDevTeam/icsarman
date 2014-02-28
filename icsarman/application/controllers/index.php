<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Index extends CI_Controller{
	function __construct()
	{
		parent::__construct();	
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('user');
	}

	function index()
	{
		$data = null;

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
			
		$this->load->view('home',$data);
	}
		
	function search()
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
		}else
		{
			$data = null;
		}
	
		$this->load->view('search', $data);
	}

	function account_panel()
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
		}else
		{
			$data = null;
		}
		
		$this->load->view('account_panel', $data);
	}

	function management()
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
		}else
		{
			$data = null;
		}
		
		$this->load->view('management', $data);
	}

	function library_information()
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
		}else
		{
			$data = null;
		}
		
		$this->load->view('library_information', $data);
	}

}

?>