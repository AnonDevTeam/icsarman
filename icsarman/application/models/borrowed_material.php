<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	*	This model will handle all database interactions regarding borrowed materials.
	**/

	class Borrowed_material extends CI_Model {

		/*
		*	This function simply inserts a new row to the borrowed_material table provided
		*		the appropriate data
		*/

		public function borrow($id,$material_id,$date,$due) {
			$data = array(
  				'id' => $id,
  				'material_id' => $material_id,
  				'is_approved' => false,
   				'date_borrowed' => $date." 00:00:00",
   				'due_date' => $due." 00:00:00"
			);
			return $this->db->insert('borrowed_material', $data); 
		
		}

		/*
		*	This function returns all borrowed materials matching an input 
		*		including the difference between the due date and the current date
		*/

		public function getBorrowed($id,$input="") {
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

		/*
		*	This function returns a list of all due and over due borrowed materials
		*		on loan to the current user
		*/

		public function alert($id) {
			$result = $this->db->query("SELECT * FROM borrowed_material WHERE id='$id' AND is_approved='1' AND DATEDIFF(due_date,SYSDATE()) <= 1")->result();
			return $result;
		
		}
	}

?>