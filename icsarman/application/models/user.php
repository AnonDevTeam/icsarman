<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Model
{
 function register($data)
 { 
    $this->db->insert('user_profile', $data);
 }
 
 function login($username, $password)
 {
   $this->db->select('id, username, password');
   $this->db->from('user_profile');
   $this->db->where('username', $username);
   $this->db->where('password', $password);
   $this->db->limit(1);
   $query = $this->db->get();
   if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 } 
 
 function info($id)
 {
    $this->db->select('id,username,firstname,middleinitial,lastname,studentnumber,email,birthday,type,school,address,status,referred_by,picture');
   $this->db->from('user_profile');
   $this->db->where('id', $id);
   $this->db->limit(1);
   $query = $this->db->get();
  
     return $query->result();
 }
}
?>