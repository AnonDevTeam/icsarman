<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user_search extends CI_Model {

		function m_search_book($input,$filter){
			if($filter == "all") $filter = "title,author,publisher";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '$input%'";
				else $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '%$input%'";
				else $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			return $result;
		}
		
		function m_search_magazine($input,$filter){
			if($filter == "all") $filter = "title,author";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '$input%'";
				else $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '%$input%'";
				else $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			return $result;
		}

		function m_search_sp_thesis($input,$filter,$type){
			if($filter == "all") $filter = "title,author,adviser";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '$input%' AND sp_thesis.type='$type'";
				else $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '$input%' AND sp_thesis.type='$type' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '%$input%' AND sp_thesis.type='$type'";
				else $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '%$input%' AND sp_thesis.type='$type' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			return $result;
		}

		function m_search_other($input,$filter){
			if($filter == "all") $filter = "title,author";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '$input%'";
				else $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				if($result_sql=="") $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '%$input%'";
				else $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			return $result;
		}

		function m_search_all($input,$filter){
			if($filter == "all") $filter = "title,author,publisher,adviser";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for books
				if($f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '$input%'";
					else $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for magazines
				if($f != "publisher" && $f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '$input%'";
					else $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for sp_thesis
				if($f != "publisher"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '$input%'";
					else $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for other
				if($f != "publisher" && $f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '$input%'";
					else $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

			}

			foreach($filters as $f){
				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for books
				if($f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '%$input%'";
					else $sql = "SELECT * FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for magazines
				if($f != "publisher" && $f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '%$input%'";
					else $sql = "SELECT * FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for sp_thesis
				if($f != "publisher"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '%$input%'";
					else $sql = "SELECT * FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

				$i=0;
				$result_sql="";
				if(!empty($result)){
					foreach($result as $mat_id){
						if($i==0) $result_sql = "'".$mat_id->material_id."'";
						else $result_sql = $result_sql.", '".$mat_id->material_id."'";
						$i++;
					}
				}

				// for other
				if($f != "publisher" && $f != "adviser"){
					if($result_sql=="") $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '%$input%'";
					else $sql = "SELECT * FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '%$input%' AND material.material_id NOT IN (".$result_sql.")";
					$result = array_merge($result,$this->db->query($sql)->result());
				}

			}

			return $result;
		}

		function m_is_borrowed_reserved($id,$material_id) {
			$result['borrowed'] = $this->db->query("SELECT transaction_id FROM borrowed_material WHERE id='$id' AND material_id='$material_id' AND is_approved='1'")->result();
			$result['reserved'] = $this->db->query("SELECT transaction_id FROM reserved_material WHERE id=$id AND material_id=$material_id")->result();
			return $result;
		}
	}
?>