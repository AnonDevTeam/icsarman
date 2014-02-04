<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Add_Material extends CI_Model {

		function __construct()
	    {
        parent::__construct();
        $this->load->database();
    	}

    	
		public function addBook($id, $title, $author, $year, $type, $date, $quantity, $status, $picture, $course_code, $publisher){
		$this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year', '$type', '$date', '$quantity', '$status','$picture')");
        $this->db->query("INSERT INTO book values('$id', '$course_code', '$publisher')");
		}

		public function addMag($id, $title, $author, $year, $type, $date, $quantity, $status, $picture, $month, $volume_no){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year', '$type', '$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO magazine values('$id', '$volume_no', '$month')");
		}
		public function addSpThesis($id, $title, $author, $year, $date,$quantity, $status, $picture, $adviser, $mat_type, $type){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year', '$mat_type', '$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO sp_thesis values('$id', '$adviser', '$type')");
		}

		public function addOther($id, $title, $author, $year, $date,$quantity, $status, $picture, $mat_type, $type){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year', '$mat_type', '$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO other values('$id', '$type')");
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