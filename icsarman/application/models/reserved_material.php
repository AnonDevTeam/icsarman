<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	/**
	*	This model will handle all database interactions regarding reserved materials.
	**/

	class Reserved_material extends CI_Model {

		/*
		*	This function simply inserts a new row to the reserved_material table provided
		*		the appropriate data
		*/

		public function reserve($id,$material_id,$date) {
			$data = array(
  				'id' => $id,
  				'material_id' => $material_id,
   				'date_reserved' => $date." 00:00:00"
			);
			return $this->db->insert('reserved_material', $data); 
		
		}

		/*
		*	This function returns all reserved materials of the current user matching an input 
		*		including the difference between the due date and the current date
		*/

		public function getReserved($id,$input="") {
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
	}

?>