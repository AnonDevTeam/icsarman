<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Delete_Material extends CI_Model {

		function __construct()
	    {
        parent::__construct();
        $this->load->database();
    	}

        public function delete_book($material_id){
            $this->db->query("DELETE FROM book WHERE material_id = '$material_id'");
            $this->db->query("DELETE FROM material WHERE material_id = '$material_id'");
            $this->db->close();
        }

        public function delete_magazine($material_id){
            $this->db->query("DELETE FROM magazine WHERE material_id = '$material_id'");
            $this->db->query("DELETE FROM material WHERE material_id = '$material_id'");
            $this->db->close();
        }

        public function delete_sp_thesis($material_id){
            $this->db->query("DELETE FROM sp_thesis WHERE material_id = '$material_id'");
            $this->db->query("DELETE FROM material WHERE material_id = '$material_id'");
            $this->db->close();
        }

        public function delete_other($material_id){
            $this->db->query("DELETE FROM other WHERE material_id = '$material_id'");
            $this->db->query("DELETE FROM material WHERE material_id = '$material_id'");
            $this->db->close();
        }

}
?>