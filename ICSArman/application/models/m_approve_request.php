<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_Approve_Request extends CI_Model {

		function __construct()
	    {
        parent::__construct();
        $this->load->database();
    	}

        public function approve_request($transaction_id){
            $this->db->query("UPDATE borrowed_material SET is_approved = 1 where transaction_id = '$transaction_id'");
        }

        public function reject_request($transaction_id){
            $this->db->query("DELETE FROM borrowed_material where transaction_id = '$transaction_id'");
        }

        public function pending_requests(){
            $res = $this->db->query('SELECT transaction_id, material_id, id, date_borrowed, due_date FROM borrowed_material where is_approved = 0')->result();
            $this->db->close();
            return $res;
        }

        public function get_verified_users(){
            $res = $this->db->query("SELECT id,firstname,middleinitial,lastname,studentnumber,school,type FROM user_profile WHERE status LIKE 'verified'")->result();
            $this->db->close();
            return $res;
        }

        public function get_all_request_data(){
        $res = $this->db->query('SELECT * FROM borrowed_material WHERE is_approved = 0')->result();
        $this->db->close();
        return $res;
        }
        
        public function activate_user($user){
            $this->db->query("UPDATE user_profile
                            SET                          
                            status = 'active'
                            WHERE id = " . $user['id'] . "
                            ");
            $this->db->close();
        }
        public function delete_user($user){
            $res = $this->db->query("DELETE FROM user_profile WHERE id = '".$user['id']."'");
            $this->db->close();
        }

}
?>