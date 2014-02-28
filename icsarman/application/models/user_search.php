<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
		OPTIMIZING SEARCH...STILL ON DEVELOPMENT

	*/
	class User_search extends CI_Model {

		public function searchByTitle($input,$type,$type2,$titleOnly,$wildcard,$constraintList,$titleConstraint){
			if($titleOnly) $this->db->select('title');
			$this->db->from('material');
			if($type != "all") $this->db->join($type, 'material.material_id = '.$type.'.material_id');
			$this->db->like('title',$input,$wildcard);
			if(!is_null($type2)) $this->db->where('sp_thesis.type',$type2);
			if(!is_null($titleConstraint)){
				if(!is_null($constraintList) && $titleConstraint) $this->db->where_not_in('title',$constraintList);
				else if(!is_null($constraintList) && !$titleConstraint) $this->db->where_not_in('material.material_id',$constraintList);
			}
			return $this->db->get()->result();
		}

		/*
			AYUSIN!!!
		*/
		public function searchByAuthor($input,$type,$type2,$authorOnly,$wildcard,$constraintList,$authorConstraint){
			if($authorOnly) $this->db->select('author');
			$this->db->from('material');
			if($type != "all") $this->db->join($type, 'material.material_id = '.$type.'.material_id');
			$this->db->like('author',$input,$wildcard);
			if(!is_null($type2)) $this->db->where('sp_thesis.type',$type2);
			if(!is_null($authorConstraint)){
				if(!is_null($constraintList) && $authorConstraint) $this->db->where_not_in('author',$constraintList);
				else if(!is_null($constraintList) && !$authorConstraint) $this->db->where_not_in('material.material_id',$constraintList);
			}
			return $this->db->get()->result();
		}

		public function searchByPublisher($input,$publisherOnly,$wildcard,$constraintList,$publisherConstraint){
			if($publisherOnly) $this->db->select('publisher');
			$this->db->from('material');
			$this->db->join('book', 'material.material_id = book.material_id');
			$this->db->like('publisher',$input,$wildcard);
			if(!is_null($publisherConstraint)){
				if(!is_null($constraintList) && $publisherConstraint) $this->db->where_not_in('publisher',$constraintList);
				else if(!is_null($constraintList) && !$publisherConstraint) $this->db->where_not_in('material.material_id',$constraintList);
			}
			return $this->db->get()->result();
		}

		public function searchByAdviser($input,$type,$adviserOnly,$wildcard,$constraintList,$adviserConstraint){
			if($adviserOnly) $this->db->select('adviser');
			$this->db->from('material');
			$this->db->join('sp_thesis', 'material.material_id = sp_thesis.material_id');
			$this->db->like('adviser',$input,$wildcard);
			if(!is_null($type)) $this->db->where('sp_thesis.type',$type);
			if(!is_null($adviserConstraint)){
				if(!is_null($constraintList) && $adviserConstraint) $this->db->where_not_in('adviser',$constrainList);
				else if(!is_null($constraintList) && !$adviserConstraint) $this->db->where_not_in('material.material_id',$constraintList);
			}
			return $this->db->get()->result();
		}

	}

?>