<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Approve_Suggestion extends CI_Model {

		function __construct()
	    {
        parent::__construct();
        $this->load->database();
    	}

        public function get_all_sug_book_data(){
        $res = $this->db->query('SELECT * FROM suggest_material WHERE type = "book" AND status = "pending"')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_sug_mag_data(){
        $res = $this->db->query('SELECT * FROM suggest_material WHERE type = "magazine" AND status = "pending"')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_sug_others_data(){
        $res = $this->db->query('SELECT * FROM suggest_material WHERE type = "others" AND status = "pending"')->result();
        $this->db->close();
        return $res;
        }

        public function addSuggestion($auxil_id, $id, $title, $author, $publisher, $date_published, $type, $time, $status){
        $this->db->query("INSERT INTO suggest_material values('$auxil_id', '$id', '$title', '$author', '$publisher', '$date_published', '$type', '$time', '$status')");
        }
        
        public function delete_suggestion($auxil_id){
            $this->db->query("DELETE FROM suggest_material WHERE auxil_id = '$auxil_id'");
            $this->db->close();
        }

}
?>