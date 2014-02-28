<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class SearchModel extends CI_Model{

		/*****************************************************************/
		
		function searchAll($input){	//search if the input is title | author | publisher | adviser | year
			$x = (integer)$input;
			$check['book'] = $this->db->query("SELECT material_id from book where publisher LIKE '$input%'")->result();
			if($check['book'] == NULL) $check['book'] = NULL;
			$check['book_like'] = $this->db->query("SELECT material_id from book where publisher LIKE '%$input%'")->result();
			if($check['book_like'] == NULL) $check['book_like'] = NULL;
			
			$check['sp_thesis'] = $this->db->query("SELECT material_id from sp_thesis where adviser LIKE '$input%'")->result();
			if($check['sp_thesis'] == NULL) $check['sp_thesis'] = NULL;
				$check['sp_thesis_like'] = $this->db->query("SELECT material_id from sp_thesis where adviser LIKE '%$input%'")->result();
			if($check['sp_thesis_like'] == NULL) $check['sp_thesis_like'] = NULL;
			
			$check['material'] = $this->db->query("SELECT id from material_group where title LIKE '$input%' OR author LIKE '$input%' OR year = $x")->result();
			if($check['material'] == NULL) $check['material'] = NULL;
				$check['material_like'] = $this->db->query("SELECT id from material_group where title LIKE '%$input%' OR author LIKE '%$input%' OR year = $x")->result();
			if($check['material_like'] == NULL) $check['material_like'] = NULL;
			
			return $check;	//associate array containing the material_group ids of the possible results
		}

		/*****************************************************************/
	
		function searchMaterial($input, $type){
			$x = (integer)$input;
			$result = $this->db->query("SELECT * FROM material_group join $type where material.material_id = $type.material_id AND (title = '$input' OR author ='$input' OR year = $x) ")->result();
			return $result;
		}

		/*****************************************************************/
		
		function searchP(){
			$res = $this->db->count_all("material");	
				return $res;
		}

		/*****************************************************************/

		function searchPagi($page, $segment, $type, $table, $id){
		$this->db->limit($page, $segment);
			switch($type){
				case 0: $res = $this->db->query("SELECT * from material_group join $table where material_group .material_id = $table.material_id AND material.material_id = $id");
					return $res->result();
				case 1: 
					$result = $this->db->query("SELECT type from material_group where material_id = $id")->result_array();
					$table = $result[0]['type'];
					$info = $this->db->query("SELECT * from material_group join $table where material_group .material_id = $table.material_id AND material.material_id = $id");
					return $info->result();
			}
		}

		/*****************************************************************/
		
		function searchCount($type, $table, $id){
		
			switch($type){
				case 0: return  $this->db->count_all("SELECT * from material_group join $table where material_group .material_id = $table.material_id AND material.material_id = $id");
				case 1: 
				/*	$result = $this->db->query("SELECT type from material_group where material_id = $id")->result_array();
			$table = $result[0]['type'];
					return $this->db->count_all("SELECT * from material_group join $table where material_group .material_id = $table.material_id AND material.material_id = $id");*/	
			}
		}

		/*****************************************************************/
		

		function searchInfo($id){	
			$result_type = $this->db->query("SELECT type from material_group where material_id = $id")->result();
			$type = $result_type[0]->type;
			
			$result_info = $this->db->query("SELECT * from material_group join $type where material.material_id = $type.material_id AND material.material_id = $id")->result();
			return $result_info;
		}

		/*****************************************************************/
		
		
		function search_by_table($table, $id){
			$info = $this->db->query("SELECT * from material_group join $table where material_group .material_id = $table.material_id AND material.material_id = $id")->result();
			return $info;
		}

		/*****************************************************************/
		
		
		function searchTable($table, $input){	//search depending on the selected type of the user
			$x = (integer)$input;
			if($table == 'Book'){
				$check['table'] = $this->db->query("SELECT material_id from $table where publisher = '$input'")->result();
				$check['table_like'] = $this->db->query("SELECT material_id from $table where publisher LIKE '%$input%'")->result();
				$check['material'] = $this->db->query("SELECT id from material_group where (title = '$input' OR author = '$input' OR year = $x) AND type = '$table' ")->result();
				$check['material_like'] = $this->db->query("SELECT id from material_group where (title LIKE '%$input%' OR author LIKE '%$input%' OR year = $x) AND type = '$table' ")->result();
			}
			else if($table == 'Magazine'){
				$check['table'] = NULL;
				$check['table_like'] = NULL;
				$check['material'] = $this->db->query("SELECT id from material_group where (title = '$input' OR author = '$input' OR year = $x) AND type = '$table' ")->result();
				$check['material_like'] = $this->db->query("SELECT id from material_group where (title LIKE '%$input%' OR author LIKE '%$input%' OR year = $x) AND type = '$table' ")->result();
			}
			else if($table == 'SP_Thesis'){
				$check['table'] = $this->db->query("SELECT material_id from $table where adviser = '%$input%'")->result();
				$check['table_like'] = $this->db->query("SELECT material_id from $table where adviser LIKE '%$input%'")->result();
				$check['material'] = $this->db->query("SELECT id from material_group where (title = '$input' OR author = '$input' OR year = $x) AND type = '$table' ")->result();
				$check['material_like'] = $this->db->query("SELECT id from material_group where (title LIKE '%$input%' OR author LIKE '%$input%' OR year = $x) AND type = '$table' ")->result();
			}	
			else if($table == 'Other'){
				$check['table'] = NULL;
				$check['table_like'] = NULL;
				$check['material'] = $this->db->query("SELECT id from material_group where (title = '$input' OR author = '$input' OR year = $x) AND type = '$table' ")->result();
				$check['material_like'] = $this->db->query("SELECT id from material_group where (title LIKE '%$input%' OR author LIKE '%$input%' OR year = $x) AND type = '$table' ")->result();
			}

			return $check;
		}

		/*****************************************************************/
		
		
		function updateTable($quantity, $mat_id){
			$this->db->query("UPDATE material_group SET quantity = $quantity WHERE id = $mat_id");
			if($quantity == 0)
				$this->db->query("UPDATE material_group SET status = 'unavailable' WHERE id = $mat_id");
			
		}

		/*****************************************************************/
		

		function updateCart($user_id, $mat_id){
			$this->db->query("INSERT into cart (material_id, id, date_reserved) VALUES ($mat_id, $user_id, now()) ");
			
		}

		/*****************************************************************/
		
		function checkCart($stud_id, $mat_id){
			$result = $this->db->query("SELECT id from user_profile WHERE studentnumber = '$stud_id'")->result();
			$id = $result['0']->id;

			$count = $this->db->query("SELECT transaction_id from cart where (material_id = '$mat_id' AND id = '$id')")->num_rows();
			if($count > 0) return 1;
			else 0;
		}

		/*****************************************************************/
		
		function getMaterial($id){
			$get = $this->db->query("SELECT quantity FROM material_group WHERE material_id = $id");
			return $get->result();
		}

		/*****************************************************************/
		
		function searchTag($table, $input){
			return $this->db->query("SELECT material_id from $table where tag LIKE '%$input%'")->result();
		}

		/*****************************************************************/
		
		
		function searchTagInfo($table, $id){
			$type = $this->db->query("SELECT type from $table join material_tag where $table.material_id = material_tag.material_id AND $table.material_id = $id")->result();
			$info = $this->search_by_table($type['0']->type, $id);
			return $info;
			
		}

		/*****************************************************************/
		
		function searchStud($name, $stdnum){
			$check = $this->db->query("SELECT username, studentnumber, id FROM user_profile where username = '$name' AND studentnumber = '$stdnum'");
			if($check->num_rows() ==0)
				return 0;
			else
				return $check->result();
			
		}

		/*****************************************************************/
		

		function searchOnchange($input, $type){
			switch($type){
				case 1 : return $this->db->query("SELECT distinct title from material_group where title LIKE '$input%' ")->result();
				case 2 : return $this->db->query("SELECT distinct author from material_group where author LIKE '$input%' ")->result();
				case 3 : return $this->db->query("SELECT distinct publisher from material_group natural join book where publisher LIKE '$input%' ")->result();
				case 4 : return $this->db->query("SELECT distinct adviser from material_group natural join sp_thesis where adviser LIKE '$input%' ")->result();
			}
		}

		/*****************************************************************/
		
		
		function checkStudentNumber($stud_no,$name){
			
			$data = array(

				'studentnumber' => $stud_no,
				'username' => $name

			);

			$this->db->select('id');
			$this->db->from('user_profile');
			$this->db->where($data);

			$q = $this->db->get();

			if($q->num_rows>0) return true;
			else			   return false;

		}

		/*****************************************************************/

		function getQueue($mat_id){
			return $this->db->query("SELECT transaction_id, id, date_reserved from cart where material_id = '$mat_id'")->result();	
		}	
	}
?>