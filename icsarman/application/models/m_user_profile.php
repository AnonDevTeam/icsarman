<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user_profile extends CI_Model {

		function m_get_user_info($userid){
			$q=$this->db->query("SELECT * FROM user_profile WHERE id='{$userid}'");
			$result=$q->row();
			return $result;
		}

		function m_edit_password($userid,$npw){
			$this->db->query("UPDATE user_profile SET password='{$npw}' WHERE id='{$userid}'");
		}

		function m_edit_email($userid,$newemail){
			$this->db->query("UPDATE user_profile SET email='{$newemail}' WHERE id='{$userid}'");
		}

		function m_edit_address($userid,$newaddr){
			$this->db->query("UPDATE user_profile SET address='{$newaddr}' WHERE id='{$userid}'");
		}

		function m_get_pic($userid){
			$q=$this->db->query("SELECT picture FROM user_profile WHERE id='{$userid}'");
			$result=$q->row();
			return $result;
		}

		function m_update_pic($userid,$file_ext){
			$this->db->query("UPDATE user_profile SET picture='{$file_ext}' WHERE id='{$userid}'");
		}
	}

?>