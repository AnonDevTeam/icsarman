<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller {
 function __construct()
 {
   parent::__construct();
 }
 function index()
 {
   $data['error_username'] = '';
   $data['error_snumber'] = '';
   $data['error_email'] = '';
   $this->load->view('form_view',$data);
 }
}

?>