<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user_material extends CI_Model {

		public function m_get_borrowed($id,$input="") {
			if($input=="") {
				$result = $this->db->query("SELECT *, DATEDIFF(due_date,SYSDATE()) diff FROM borrowed_material NATURAL JOIN material WHERE borrowed_material.id='$id' AND is_approved='1' ORDER BY borrowed_material.date_borrowed DESC")->result();
				return $result;
			}
			else {
				$result1 = $this->db->query("SELECT *, DATEDIFF(due_date,SYSDATE()) diff FROM borrowed_material NATURAL JOIN material WHERE title LIKE '$input%' AND borrowed_material.id='$id' AND is_approved='1'")->result();
				if(!empty($result1)) {
					$i=0;
					$result2_sql2="";
					foreach($result1 as $title){
						if($i==0) $result2_sql2 = "'".$title->title."'";
						else $result2_sql2 = $result2_sql2.", '".$title->title."'";
						$i++;
					}
					$result2_sql = "SELECT *, DATEDIFF(due_date,SYSDATE()) diff FROM borrowed_material NATURAL JOIN material WHERE title LIKE '%$input%' AND borrowed_material.id='$id' AND is_approved='1' AND title NOT IN (".$result2_sql2.")";
				}
				else $result2_sql = "SELECT *, DATEDIFF(due_date,SYSDATE()) diff FROM borrowed_material NATURAL JOIN material WHERE title LIKE '%$input%' AND borrowed_material.id='$id' AND is_approved='1'";
				
				$result2 = $this->db->query($result2_sql)->result();
				$result = array_merge($result1, $result2);
				return $result;
			}
		}

		public function m_get_reserved($id,$input="") {
			if($input=="") {
				$result = $this->db->query("SELECT * FROM reserved_material NATURAL JOIN material WHERE reserved_material.id='{$id}' ORDER BY reserved_material.date_reserved DESC")->result();
				return $result;
			}
			else {
				$result1 = $this->db->query("SELECT * FROM reserved_material NATURAL JOIN material WHERE title LIKE '$input%' AND reserved_material.id='$id'")->result();
				if(!empty($result1)) {
					$i=0;
					$result2_sql2="";
					foreach($result1 as $title){
						if($i==0) $result2_sql2 = "'".$title->title."'";
						else $result2_sql2 = $result2_sql2.", '".$title->title."'";
						$i++;
					}
					$result2_sql = "SELECT * FROM reserved_material NATURAL JOIN material WHERE title LIKE '%$input%' AND reserved_material.id='$id' AND title NOT IN (".$result2_sql2.")";
				}
				else $result2_sql = "SELECT * FROM reserved_material NATURAL JOIN material WHERE title LIKE '%$input%' AND reserved_material.id='$id'";
			
				$result2 = $this->db->query($result2_sql)->result();
				$result = array_merge($result1, $result2);
				return $result;
			}
		}

		public function m_alert($id) {
			$result = $this->db->query("SELECT * FROM borrowed_material WHERE id='$id' AND is_approved='1' AND DATEDIFF(due_date,SYSDATE()) <= 1")->result();
			return $result;
		}
	}

?>