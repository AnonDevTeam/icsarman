<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	*	This model will handle all database interactions regarding the user.
	**/

	class User_profile extends CI_Model {

		function editPassword($userid,$npw){
			$this->db->query("UPDATE user_profile SET password='{$npw}' WHERE id='{$userid}'");
		
		}

		function editEmail($userid,$newemail){
		
			$this->db->query("UPDATE user_profile SET email='{$newemail}' WHERE id='{$userid}'");
		}

		function editAddress($userid,$newaddr){
		
			$this->db->query("UPDATE user_profile SET address='{$newaddr}' WHERE id='{$userid}'");
		}

		function getPic($userid){
			$q=$this->db->query("SELECT picture FROM user_profile WHERE id='{$userid}'");
			$result=$q->row();
			return $result;
		
		}

		function updatePic($userid,$file_ext){
			$this->db->query("UPDATE user_profile SET picture='{$file_ext}' WHERE id='{$userid}'");
		
		}
	}

?>