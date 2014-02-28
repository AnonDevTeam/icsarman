<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	*	This model will handle all database interactions regarding materials.
	**/

	class Material extends CI_Model {

		/*
		*	Given the input string, and the type of material being searched, this function
		*		will return all probable names and items that the user is looking for
		*	The type of the material can either be a book, magazine, sp, thesis, other, or all of these.
		*	The results that will be returned will be composed of items with names containing the input; on
		*		top of the list are those with the input at the beginning followed by the rest.
		*/

		public function suggest($input,$type,$type2=""){
			$result = array();

			// for matching the titles of each materials
			$this->db->distinct();
			$this->db->select('title AS item');
			$this->db->from('material_group');
			// if a specific type is selected, the appropriate join will be done
			if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
			// for the sp_thesis type, the second type is also considered
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('title', $input, 'after');
			$title_result = $this->db->get()->result();
			$result = array_merge($result, $title_result);

			// for matching the titles of each materials
			$this->db->distinct();
			$this->db->select('author AS item');
			$this->db->from('material_group');
			if($type != "all") $this->db->join($type, "material_group.id = {$type}.material_id");
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('author', $input, 'after');
			$author_result = $this->db->get()->result();
			$result = array_merge($result, $author_result);

			// for matching the publishers of each materials if the appropriate type is selected
			if($type == "book" || $type == "all"){
				$this->db->distinct();
				$this->db->select('publisher AS item');
				$this->db->from('material_group');
				$this->db->join("book", "material_group.id = book.material_id");
				$this->db->like('publisher', $input, 'after');
				$publisher_result = $this->db->get()->result();
				$result = array_merge($result, $publisher_result);
			}

			// for matching the adviser of each materials if the appropriate type is selected
			if($type == "sp_thesis" || $type == "all"){
				$this->db->distinct();
				$this->db->select('adviser AS item');
				$this->db->from('material_group');
				$this->db->join("sp_thesis", "material_group.id = sp_thesis.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('adviser', $input, 'after');
				$adviser_result = $this->db->get()->result();
				$result = array_merge($result, $adviser_result);
			}

			// the following searches for items that has the input string within them,
			//		excluding those already found
			if(!empty($title_result)){
				$i=0;
				$list = array();
				// creates an array from all the alreaqdy found items
				foreach($title_result as $title){
					array_push($list, $title->item);
				}

				$this->db->distinct();
				$this->db->select('title AS item');
				$this->db->from('material_group');
				if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('title',$input);
				// using this function, all newly found results that is already in the array is removed
				$this->db->where_not_in('title',$list);
				$title_result = $this->db->get()->result();
				$result = array_merge($result, $title_result);
			}
			// if there is no item having the input string at the beginning
			//		all items containing the input is returned,
			else{
				$this->db->distinct();
				$this->db->select('title AS item');
				$this->db->from('material_group');
				if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('title',$input);
				$title_result = $this->db->get()->result();
				$result = array_merge($result, $title_result);
			}

			if(!empty($author_result)){
				$i=0;
				$list = array();
				foreach($author_result as $author){
					array_push($list, $author->item);
				}

				$this->db->distinct();
				$this->db->select('author AS item');
				$this->db->from('material_group');
				if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('author',$input);
				$this->db->where_not_in('author',$list);
				$author_result = $this->db->get()->result();
				$result = array_merge($result, $author_result);
			}
			else{
				$this->db->distinct();
				$this->db->select('author AS item');
				$this->db->from('material_group');
				if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('author',$input);
				$author_result = $this->db->get()->result();
				$result = array_merge($result, $author_result);
			}

			if(!empty($publisher_result)){
				$i=0;
				$list = array();
				foreach($publisher_result as $publisher){
					array_push($list, $publisher->item);
				}

				$this->db->distinct();
				$this->db->select('publisher AS item');
				$this->db->from('material_group');
				$this->db->join('book','material_group.id = book.material_id');
				$this->db->like('publisher',$input);
				$this->db->where_not_in('publisher',$list);
				$publisher_result = $this->db->get()->result();
				$result = array_merge($result, $publisher_result);
			}
			else{
				$this->db->distinct();
				$this->db->select('publisher AS item');
				$this->db->from('material_group');
				$this->db->join('book','material_group.id = book.material_id');
				$this->db->like('publisher',$input);
				$publisher_result = $this->db->get()->result();
				$result = array_merge($result, $publisher_result);
			}

			if(!empty($adviser_result)){
				$i=0;
				$list = array();
				foreach($adviser_result as $adviser){
					array_push($list, $adviser->item);
				}

				$this->db->distinct();
				$this->db->select('adviser AS item');
				$this->db->from('material_group');
				$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('adviser',$input);
				$this->db->where_not_in('adviser',$list);
				$adviser_result = $this->db->get()->result();
				$result = array_merge($result, $adviser_result);
			}
			else{
				$this->db->distinct();
				$this->db->select('adviser AS item');
				$this->db->from('material_group');
				$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('adviser',$input);
				$adviser_result = $this->db->get()->result();
				$result = array_merge($result, $adviser_result);
			}

			return $result;

		}

		/*
		*	This function will match the input with selected fields and returns all information
		*		regarding the material.
		*	This will be implemented almost the same way as the suggest() function with some modifications
		*/

		public function search($input,$type,$type2="",$page=1){
			$currpage = $page;
			$page -= 1;
			$perpage = 3;
			$start = $page * $perpage;

			$result = array();
			$list = array();

			$this->db->from('material_group');
			if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('title', $input, 'after');
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('author', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if($type == "book" || $type == "all"){
				if(!empty($result)){
					$list = array();
					foreach($result as $mat){
						array_push($list, $mat->material_id);
					}
				}

				$this->db->from('material_group');
				$this->db->join("book", "material_group.id = book.material_id");
				$this->db->like('publisher', $input, 'after');
				if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
				$result = array_merge($result, $this->db->get()->result());
			}

			if($type == "sp_thesis" || $type == "all"){
				if(!empty($result)){
					$list = array();
					foreach($result as $mat){
						array_push($list, $mat->material_id);
					}
				}

				$this->db->from('material_group');
				$this->db->join("sp_thesis", "material_group.id = sp_thesis.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('adviser', $input, 'after');
				if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
				$result = array_merge($result, $this->db->get()->result());
			}

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('title', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			if($type != "all") $this->db->join($type, "material_group.id = $type.material_id");
			if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
			$this->db->like('author', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if($type == "book" || $type == "all"){
				if(!empty($result)){
					$list = array();
					foreach($result as $mat){
						array_push($list, $mat->material_id);
					}
				}

				$this->db->from('material_group');
				$this->db->join("book", "material_group.id = book.material_id");
				$this->db->like('publisher', $input);
				if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
				$result = array_merge($result, $this->db->get()->result());
			}

			if($type == "sp_thesis" || $type == "all"){
				if(!empty($result)){
					$list = array();
					foreach($result as $mat){
						array_push($list, $mat->material_id);
					}
				}

				$this->db->from('material_group');
				$this->db->join("sp_thesis", "material_group.id = sp_thesis.material_id");
				if($type == "sp_thesis") $this->db->where('sp_thesis.type',$type2);
				$this->db->like('adviser', $input);
				if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
				$result = array_merge($result, $this->db->get()->result());
			}
		
			$count = count($result);
			$r = array_slice($result,$start,$perpage);
			$r['pageno'] = ceil($count/$perpage);
			$r['currpage'] = $currpage;
			return $r;
		}

		/*
		*	This function will return all items matching the given input regardless of the
		*		type of the material being searched
		*/

		public function searchAll($input,$page=1){
			$currpage = $page;
			$page -= 1;
			$perpage = 3;
			$start = $page * $perpage;

			$result = array();
			$list = array();

			$this->db->from('material_group');
			$this->db->join('book','material_group.id = book.material_id');
			$this->db->like('title', $input, 'after');
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join('magazine','material_group.id = magazine.material_id');
			$this->db->like('title', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
			$this->db->like('title', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('other','material_group.id = other.material_id');
			$this->db->like('title', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('book','material_group.id = book.material_id');
			$this->db->like('author', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('magazine','material_group.id = magazine.material_id');
			$this->db->like('author', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
			$this->db->like('author', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('other','material_group.id = other.material_id');
			$this->db->like('author', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join("book", "material_group.id = book.material_id");
			$this->db->like('publisher', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join("sp_thesis", "material_group.id = sp_thesis.material_id");
			$this->db->like('adviser', $input, 'after');
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join('book','material_group.id = book.material_id');
			$this->db->like('title', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join('magazine','material_group.id = magazine.material_id');
			$this->db->like('title', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
			$this->db->like('title', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('other','material_group.id = other.material_id');
			$this->db->like('title', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('book','material_group.id = book.material_id');
			$this->db->like('author', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join('magazine','material_group.id = magazine.material_id');
			$this->db->like('author', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join('sp_thesis','material_group.id = sp_thesis.material_id');
			$this->db->like('author', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}
			$this->db->from('material_group');
			$this->db->join('other','material_group.id = other.material_id');
			$this->db->like('author', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join("book", "material_group.id = book.material_id");
			$this->db->like('publisher', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			if(!empty($result)){
				$list = array();
				foreach($result as $mat){
					array_push($list, $mat->material_id);
				}
			}

			$this->db->from('material_group');
			$this->db->join("sp_thesis", "material_group.id = sp_thesis.material_id");
			$this->db->like('adviser', $input);
			if(!empty($list)) $this->db->where_not_in('material_group.id',$list);
			$result = array_merge($result, $this->db->get()->result());

			$count = count($result);
			$r = array_slice($result,$start,$perpage);
			$r['pageno'] = ceil($count/$perpage);
			$r['currpage'] = $currpage;
			return $r;
		
		}

		/*
		*	This function will determine whether a selected material was borrowed or reserved by the
		*		user and returns an array as a result
		*	The array will be composed of the results from querying the borrowed_material table and
		*		those from querying the reserved_material table
		*/

		public function getMaterialTitle($group_id){
			return $this->db->query("SELECT title FROM material_group WHERE id={$group_id}")->row_array();
		}

		public function getFromQueue($id,$group_id){
			return $this->db->query("SELECT transaction_id FROM queue WHERE user_id={$id} AND group_id={$group_id}")->result_array();
		}

		public function getMaterialQueue($group_id,$material_id){
			return $this->db->query("SELECT material_id,count(user_id)count FROM queue WHERE group_id={$group_id} AND material_id={$material_id} GROUP BY material_id")->result_array();
		}

		public function getMaterialItem($group_id){
			return $this->db->query("SELECT id FROM material_item WHERE group_id='{$group_id}'")->result_array();
		}

		public function addToQueue($group_id,$material_id,$id){
			$data = array(
  				'user_id' => $id,
  				'group_id' => $group_id,
  				'material_id' => $material_id
			);
			return $this->db->insert('queue', $data); 
		}

		public function getCart($userid){
			return $this->db->query("SELECT * FROM queue JOIN material_group WHERE material_group.id = queue.group_id AND user_id='{$userid}'")->result();
		}
	}

?>