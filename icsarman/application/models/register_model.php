<?php
class Register_model extends CI_Model {
    function register_model()
    {
        $data['username'] = $this->input->post('username');
        $data['password'] = md5($this->input->post('password'));
        $data['firstname'] = $this->input->post('firstname');
        $data['middleinitial'] = $this->input->post('middleinitial');
        $data['lastname'] = $this->input->post('lastname');
        $data['email'] = $this->input->post('email');
        $data['school'] = $this->input->post('school');
        $data['studentnumber'] = $this->input->post('studentnumber');
        $data['birthday'] = $this->input->post('birthday');
        $data['status'] = $this->input->post('status');
        $data['type'] = $this->input->post('type');
        $data['referred_by'] = $this->input->post('referred_by');
        $data['address'] = $this->input->post('address');
        $this->db->insert('users', $data);
    }
}
?>