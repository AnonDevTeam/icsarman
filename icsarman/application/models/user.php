<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, username, password');
   $this -> db -> from('user_profile');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', $password);
   $this -> db -> limit(1);
   $query = $this -> db -> get();
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function register($data)
 { 
        $this->db->insert('user_profile', $data);
 }
}
?>