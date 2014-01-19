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
        $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[15]|trim');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[2]|max_length[40]|md5');
        $this->form_validation->set_rules('firstname', 'firstname', 'min_length[1]|max_length[64]|trim');
        $this->form_validation->set_rules('middleinitial', 'middleinitial', 'min_length[1]|max_length[2]|trim');
        $this->form_validation->set_rules('lastname', 'lastname', 'min_length[1]|max_length[64]|trim');
        $this->form_validation->set_rules('email', 'email', 'max_length[64]|trim');
        $this->form_validation->set_rules('school', 'school', 'max_length[128]|trim');
        $this->form_validation->set_rules('studentnumber', 'studentnumber', 'max_length[10]|trim');
        $this->form_validation->set_rules('birthday', 'birthday');
        $this->form_validation->set_rules('status', 'status');
        $this->form_validation->set_rules('type', 'type', 'min_length[1]|max_length[64]|trim');
        $this->form_validation->set_rules('address', 'address', 'min_length[1]|max_length[128]|trim');
        $this->form_validation->set_rules('referred_by', 'referred_by', 'min_length[1]|max_length[128]|trim');
        $this->load->model('register_model');
        if(!$this->form_validation->run())
        {
            $this->load->view('form_view');
        }
        else
        {
            $this->load->view('form_success');
        }
    }
}
?>