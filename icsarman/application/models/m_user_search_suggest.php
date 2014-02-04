<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_user_search_suggest extends CI_Model {

		function m_suggest_book($input,$filter){
			if($filter == "all") $filter = "title,author,publisher";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$sql = "SELECT DISTINCT $f AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND $f LIKE '$input%'";
				switch($f){
					case "title": $title_result = $this->db->query($sql)->result();
					case "author": $author_result = $this->db->query($sql)->result();
					case "publisher": $publisher_result = $this->db->query($sql)->result();
				}
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			if(count($result) < 5){
				foreach($filters as $f){
					switch($f){
						case "title":
							if(!empty($title_result)){
								$i=0;
								$result_sql="";
								foreach($title_result as $title){
									if($i==0) $result_sql = "'".$title->item."'";
									else $result_sql = $result_sql.", '".$title->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND title LIKE '%$input%' AND title NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND title LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "author":
							if(!empty($author_result)){
								$i=0;
								$result_sql="";
								foreach($author_result as $author){
									if($i==0) $result_sql = "'".$author->item."'";
									else $result_sql = $result_sql.", '".$author->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND author LIKE '%$input%' AND author NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND author LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "publisher":
							if(!empty($publisher_result)){
								$i=0;
								$result_sql="";
								foreach($publisher_result as $publisher){
									if($i==0) $result_sql = "'".$publisher->item."'";
									else $result_sql = $result_sql.", '".$publisher->item."'";
									$i++;
								}
								$publisher_sql = "SELECT DISTINCT publisher AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND publisher LIKE '%$input%' AND publisher NOT IN (".$result_sql.")";
							}
							else $publisher_sql = "SELECT DISTINCT publisher AS 'item' FROM material JOIN book WHERE material.material_id=book.material_id AND publisher LIKE '%$input%'";

							$publisher_result = $this->db->query($publisher_sql)->result();
							$result = array_merge($result,$publisher_result);
							break;
					}
				}
			}

			return $result;
		}

		function m_suggest_magazine($input,$filter){
			if($filter == "all") $filter = "title,author";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$sql = "SELECT DISTINCT $f AS 'item' FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND $f LIKE '$input%'";
				switch($f){
					case "title": $title_result = $this->db->query($sql)->result();
					case "author": $author_result = $this->db->query($sql)->result();
				}
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			if(count($result) < 5){
				foreach($filters as $f){
					switch($f){
						case "title":
							if(!empty($title_result)){
								$i=0;
								$result_sql="";
								foreach($title_result as $title){
									if($i==0) $result_sql = "'".$title->item."'";
									else $result_sql = $result_sql.", '".$title->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND title LIKE '%$input%' AND title NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND title LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "author":
							if(!empty($author_result)){
								$i=0;
								$result_sql="";
								foreach($author_result as $author){
									if($i==0) $result_sql = "'".$author->item."'";
									else $result_sql = $result_sql.", '".$author->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND author LIKE '%$input%' AND author NOT IN (".$result_sql.")";
							}
							//on the other hand, when the query returns an empty array, the result will be
							else $title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN magazine WHERE material.material_id=magazine.material_id AND author LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
					}
				}
			}

			return $result;
		}

		function m_suggest_sp_thesis($input,$filter,$type){
			if($filter == "all") $filter = "title,author,adviser";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$sql = "SELECT DISTINCT $f AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND $f LIKE '$input%'";
				switch($f){
					case "title": $title_result = $this->db->query($sql)->result();
					case "author": $author_result = $this->db->query($sql)->result();
					case "adviser": $adviser_result = $this->db->query($sql)->result();
				}
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			if(count($result) < 5){
				foreach($filters as $f){
					switch($f){
						case "title":
							if(!empty($title_result)){
								$i=0;
								$result_sql="";
								foreach($title_result as $title){
									if($i==0) $result_sql = "'".$title->item."'";
									else $result_sql = $result_sql.", '".$title->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND title LIKE '%$input%' AND title NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND title LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "author":
							if(!empty($author_result)){
								$i=0;
								$result_sql="";
								foreach($author_result as $author){
									if($i==0) $result_sql = "'".$author->item."'";
									else $result_sql = $result_sql.", '".$author->item."'";
									$i++;
								}
								$author_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND author LIKE '%$input%' AND author NOT IN (".$result_sql.")";
							}
							//on the other hand, when the query returns an empty array, the result will be
							else $author_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND author LIKE '%$input%'";

							$author_result = $this->db->query($author_sql)->result();
							$result = array_merge($result,$author_result);
							break;
						case "adviser":
							if(!empty($adviser_result)){
								$i=0;
								$result_sql="";
								foreach($adviser_result as $adviser){
									if($i==0) $result_sql = "'".$adviser->item."'";
									else $result_sql = $result_sql.", '".$adviser->item."'";
									$i++;
								}
								$adviser_sql = "SELECT DISTINCT adviser AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND adviser LIKE '%$input%' AND adviser NOT IN (".$result_sql.")";
							}
							else $adviser_sql = "SELECT DISTINCT adviser AS 'item' FROM material JOIN sp_thesis WHERE material.material_id=sp_thesis.material_id AND sp_thesis.type='$type' AND adviser LIKE '%$input%'";

							$adviser_result = $this->db->query($adviser_sql)->result();
							$result = array_merge($result,$adviser_result);
							break;
					}
				}
			}

			return $result;
		}

		function m_suggest_other($input,$filter){
			if($filter == "all") $filter = "title,author";
			$filters = explode(",",$filter);
			$result = array();

			foreach($filters as $f){
				$sql = "SELECT DISTINCT $f AS 'item' FROM material JOIN other WHERE material.material_id=other.material_id AND $f LIKE '$input%'";
				switch($f){
					case "title": $title_result = $this->db->query($sql)->result();
					case "author": $author_result = $this->db->query($sql)->result();
				}
				$result = array_merge($result,$this->db->query($sql)->result());
			}

			if(count($result) < 5){
				foreach($filters as $f){
					switch($f){
						case "title":
							if(!empty($title_result)){
								$i=0;
								$result_sql="";
								foreach($title_result as $title){
									if($i==0) $result_sql = "'".$title->item."'";
									else $result_sql = $result_sql.", '".$title->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN other WHERE material.material_id=other.material_id AND title LIKE '%$input%' AND title NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT title AS 'item' FROM material JOIN other WHERE material.material_id=other.material_id AND title LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "author":
							if(!empty($author_result)){
								$i=0;
								$result_sql="";
								foreach($author_result as $author){
									if($i==0) $result_sql = "'".$author->item."'";
									else $result_sql = $result_sql.", '".$author->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN other WHERE material.material_id=other.material_id AND author LIKE '%$input%' AND author NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT author AS 'item' FROM material JOIN other WHERE material.material_id=other.material_id AND author LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
					}
				}
			}

			return $result;
		}

		function m_suggest_all($input,$filter) {
			if($filter == "all") $filter = "title,author,publisher,adviser";
			$filters = explode(",",$filter);
			$result = array();
			foreach($filters as $f){
				switch($f){
					case "title":
						$sql = "SELECT DISTINCT title AS 'item' FROM material WHERE title LIKE '$input%'";
						$title_result = $this->db->query($sql)->result();
						$result = array_merge($result,$title_result);
						break;
					case "author":
						$sql = "SELECT DISTINCT author AS 'item' FROM material WHERE author LIKE '$input%'";
						$author_result = $this->db->query($sql)->result();
						$result = array_merge($result,$author_result);
						break;
					case "publisher":
						$sql = "SELECT DISTINCT publisher AS 'item' FROM book WHERE publisher LIKE '$input%'";
						$publisher_result = $this->db->query($sql)->result();
						$result = array_merge($result,$publisher_result);
						break;
					case "adviser":
						$sql = "SELECT DISTINCT adviser AS 'item' FROM sp_thesis WHERE adviser LIKE '$input%'";
						$adviser_result = $this->db->query($sql)->result();
						$result = array_merge($result,$adviser_result);
						break;
				}
			}

			if(count($result) < 5){
				foreach($filters as $f){
					switch($f){
						case "title":
							if(!empty($title_result)){
								$i=0;
								$result_sql="";
								foreach($title_result as $title){
									if($i==0) $result_sql = "'".$title->item."'";
									else $result_sql = $result_sql.", '".$title->item."'";
									$i++;
								}
								$title_sql = "SELECT DISTINCT title AS 'item' FROM material WHERE title LIKE '%$input%' AND title NOT IN (".$result_sql.")";
							}
							else $title_sql = "SELECT DISTINCT title AS 'item' FROM material WHERE title LIKE '%$input%'";

							$title_result = $this->db->query($title_sql)->result();
							$result = array_merge($result,$title_result);
							break;
						case "author":
							if(!empty($author_result)){
								$i=0;
								$result_sql="";
								foreach($author_result as $author){
									if($i==0) $result_sql = "'".$author->item."'";
									else $result_sql = $result_sql.", '".$author->item."'";
									$i++;
								}
								$author_sql = "SELECT DISTINCT author AS 'item' FROM material WHERE author LIKE '%$input%' AND author NOT IN (".$result_sql.")";
							}
							else $author_sql = "SELECT DISTINCT author AS 'item' FROM material WHERE author LIKE '%$input%'";

							$author_result = $this->db->query($author_sql)->result();
							$result = array_merge($result,$author_result);
							break;
						case "publisher":
							if(!empty($publisher_result)){
								$i=0;
								$result_sql="";
								foreach($publisher_result as $publisher){
									if($i==0) $result_sql = "'".$publisher->item."'";
									else $result_sql = $result_sql.", '".$publisher->item."'";
									$i++;
								}
								$publisher_sql = "SELECT DISTINCT publisher AS 'item' FROM book WHERE publisher LIKE '%$input%' AND publisher NOT IN (".$result_sql.")";
							}
							else $publisher_sql = "SELECT DISTINCT publisher AS 'item' FROM book WHERE publisher LIKE '%$input%'";

							$publisher_result = $this->db->query($publisher_sql)->result();
							$result = array_merge($result,$publisher_result);
							break;
						case "adviser":
							if(!empty($adviser_result)){
								$i=0;
								$result_sql="";
								foreach($adviser_result as $adviser){
									if($i==0) $result_sql = "'".$adviser->item."'";
									else $result_sql = $result_sql.", '".$adviser->item."'";
									$i++;
								}
								$adviser_sql = "SELECT DISTINCT adviser AS 'item' FROM sp_thesis WHERE adviser LIKE '%$input%' AND adviser NOT IN (".$result_sql.")";
							}
							else $adviser_sql = "SELECT DISTINCT adviser AS 'item' FROM sp_thesis WHERE adviser LIKE '%$input%'";

							$adviser_result = $this->db->query($adviser_sql)->result();
							$result = array_merge($result,$adviser_result);
							break;
					}
				}
			}

			return $result;
		}
	}

?>