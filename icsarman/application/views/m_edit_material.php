<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_Edit_Material extends CI_Model {

        function __construct()
        {
        parent::__construct();
        $this->load->database();
        }

        public function get_all_material_data(){
        $res = $this->db->query('SELECT * FROM material ORDER BY material_id')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_book_data(){
        $res = $this->db->query('SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.course_code,b.publisher FROM material m,book b WHERE m.material_id=b.material_id ORDER BY material_id')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_magazine_data(){
        $res = $this->db->query('SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.volume_number,b.month FROM material m,magazine b WHERE m.material_id=b.material_id ORDER BY material_id')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_other_data(){
        $res = $this->db->query('SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.type FROM material m,other b WHERE m.material_id=b.material_id ORDER BY material_id')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_sp_thesis_data(){
        $res = $this->db->query('SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.adviser,b.type FROM material m,sp_thesis b WHERE m.material_id=b.material_id ORDER BY material_id')->result();
        $this->db->close();
        return $res;
        }

        

        public function get_all_request_data(){
        $res = $this->db->query('SELECT * FROM borrowed_material WHERE is_approved = 0')->result();
        $this->db->close();
        return $res;
        }

        public function get_all_material_id(){
        $res = $this->db->query('SELECT material_id FROM material')->result();
        $this->db->close();
        return $res;
        }

        public function search_book_id($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.type, m.date_added,m.picture,b.course_code,b.publisher FROM material_group m,book b WHERE m.id=b.material_id AND (m.id LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_book_title($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,b.course_code,b.publisher FROM material_group m,book b WHERE m.id=b.material_id AND (m.title LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_book_author($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,b.course_code,b.publisher FROM material_group m,book b WHERE m.id=b.material_id AND (m.author LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_book_year($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,b.course_code,b.publisher FROM material_group m,book b WHERE m.id=b.material_id AND (m.year LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        public function view_all(){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,b.course_code,b.publisher FROM material_group m,book b WHERE m.id=b.material_id ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        //magazines
        public function search_mag_id($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,g.volume_number,g.month FROM material_group m, magazine g WHERE m.id=g.material_id AND (m.id LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_mag_title($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,g.volume_number,g.month FROM material_group m, magazine g WHERE m.id=g.material_id AND (m.title LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_mag_author($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,g.volume_number,g.month FROM material_group m, magazine g WHERE m.id=g.material_id AND (m.author LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_mag_year($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,g.volume_number,g.month FROM material_group m, magazine g WHERE m.id=g.material_id AND (m.year LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }
        
         public function view_all_mag(){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,g.volume_number,g.month FROM material_group m, magazine g WHERE m.id=g.material_id ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        //sp_thesis
        public function search_st_id($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,s.adviser,s.type FROM material_group m, sp_thesis s WHERE m.id=s.material_id AND (m.id LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_st_title($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,s.adviser,s.type FROM material_group m, sp_thesis s WHERE m.id=s.material_id AND (m.title LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_st_author($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,s.adviser,s.type FROM material_group m, sp_thesis s WHERE m.id=s.material_id AND (m.author LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_st_year($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,s.adviser,s.type FROM material_group m, sp_thesis s WHERE m.id=s.material_id AND (m.year LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        public function view_all_st(){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,s.adviser,s.type FROM material_group m, sp_thesis s WHERE m.id=s.material_id ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         //others
        public function search_others_id($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,o.type FROM material_group m, other o WHERE m.id=o.material_id AND (m.id LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_others_title($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,o.type FROM material_group m, other o WHERE m.id=o.material_id AND (m.title LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_others_author($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,o.type FROM material_group m, other o WHERE m.id=o.material_id AND (m.author LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

         public function search_others_year($input){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,o.type FROM material_group m, other o WHERE m.id=o.material_id AND (m.year LIKE '".$input."') ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        public function view_all_other(){
            $res = $this->db->query("SELECT m.id,m.title,m.author,m.year,m.date_added,m.picture,o.type FROM material_group m, other o WHERE m.id=o.material_id ORDER BY id")->result();
            $this->db->close();
            return $res;
        }

        //return material
         public function search_materials_id($input){
            $res = $this->db->query("SELECT material_id,title,author,year,date_added,quantity,status,picture FROM material WHERE material_id LIKE '".$input."' ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }

         public function search_materials_title($input){
            $res = $this->db->query("SELECT material_id,title,author,year,date_added,quantity,status,picture FROM material WHERE title LIKE '".$input."' ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }

         public function search_materials_author($input){
            $res = $this->db->query("SELECT material_id,title,author,year,date_added,quantity,status,picture FROM material WHERE author LIKE '".$input."' ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }

        public function search_magazine($magazine){
            if($magazine['status']==""){
                $magazine['status']="''";
            }
            $res = $this->db->query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.volume_number,b.month FROM material m,magazine b WHERE m.material_id=b.material_id AND (m.material_id LIKE '".$magazine['material_id']."' OR m.title LIKE '".$magazine['title']."' OR m.author LIKE '".$magazine['author']."' OR m.year LIKE '".$magazine['year']."' OR m.date_added LIKE '".$magazine['date_added']."' OR m.status = ".$magazine['status']." OR b.volume_number LIKE '".$magazine['volume_number']."' OR b.month LIKE '".$magazine['month']."') ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }
        public function search_sp_thesis($sp_thesis){
            if($sp_thesis['status']==""){
                $sp_thesis['status']="''";
            }
           $res = $this->db->query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.adviser,b.type FROM material m,sp_thesis b WHERE m.material_id=b.material_id AND (m.material_id LIKE '".$sp_thesis['material_id']."' OR m.title LIKE '".$sp_thesis['title']."' OR m.author LIKE '".$sp_thesis['author']."' OR m.year LIKE '".$sp_thesis['year']."' OR m.date_added LIKE '".$sp_thesis['date_added']."' OR m.status = ".$sp_thesis['status']." OR b.adviser LIKE '".$sp_thesis['adviser']."' OR b.type LIKE '".$sp_thesis['type']."') ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }
        public function search_other($other){
            if($other['status']==""){
                $other['status']="''";
            }
            $res = $this->db->query("SELECT m.material_id,m.title,m.author,m.year,m.date_added,m.quantity,m.status,m.picture,b.type FROM material m,other b WHERE m.material_id=b.material_id AND (m.material_id LIKE '".$other['material_id']."' OR m.title LIKE '".$other['title']."' OR m.author LIKE '".$other['author']."' OR m.year LIKE '".$other['year']."' OR m.date_added LIKE '".$other['date_added']."' OR m.status = ".$other['status']." OR b.type LIKE '".$other['type']."') ORDER BY material_id")->result();
            $this->db->close();
            return $res;
        }

        public function return_material($mat_id){
            $this->db->query("UPDATE material SET quantity = quantity + 1 WHERE material_id = '$mat_id'");
        }        

        public function update_book($book){
            $this->db->query("UPDATE material_group
                            SET
                            id = " . $book['id'] . ",
                            title = '" . $book['title'] . "',
                            author = '" . $book['author'] . "',
                            year = " . $book['year'] . ",
                            date_added = '" . $book['date_added'] . "',
                            picture = '" . $book['picture'] . "'
                            WHERE id = " . $book['id'] . "
                            ");
            $this->db->query("UPDATE book
                            SET
                            material_id = " . $book['id'] . ",
                            course_code = '" . $book['course_code'] . "',
                            publisher = '" . $book['publisher'] . "'
                            WHERE material_id = '" . $book['id'] . "'
                            ");
        $this->db->close();
        }

        public function update_magazine($magazine){
            $this->db->query("UPDATE material_group
                            SET
                            id = " . $magazine['id'] . ",
                            title = '" . $magazine['title'] . "',
                            author = '" . $magazine['author'] . "',
                            year = " . $magazine['year'] . ",
                            date_added = '" . $magazine['date_added'] . "',
                            picture = '" . $magazine['picture'] . "'
                            WHERE id = " . $magazine['id'] . "
                            ");
            $this->db->query("UPDATE magazine
                            SET
                            material_id = " . $magazine['id'] . ",
                            volume_number = '" . $magazine['volume_number'] . "',
                            month = " . $magazine['month'] . "
                            WHERE material_id = '" . $magazine['id'] . "'
                            ");
        $this->db->close();
        }

        public function update_sp_thesis($sp_thesis){
            $this->db->query("UPDATE material_group
                            SET
                            id = " . $sp_thesis['id'] . ",
                            title = '" . $sp_thesis['title'] . "',
                            author = '" . $sp_thesis['author'] . "',
                            year = " . $sp_thesis['year'] . ",
                            date_added = '" . $sp_thesis['date_added'] . "',
                            picture = '" . $sp_thesis['picture'] . "'
                            WHERE id = " . $sp_thesis['id'] . "
                            ");
            $this->db->query("UPDATE sp_thesis
                            SET
                            material_id = " . $sp_thesis['id'] . ",
                            adviser = '" . $sp_thesis['adviser'] . "',
                            type = '" . $sp_thesis['type'] . "'
                            WHERE material_id = '" . $sp_thesis['id'] . "'
                            ");
        $this->db->close();
        }

        public function update_other($other){
            $this->db->query("UPDATE material_group
                            SET
                            id = " . $other['id'] . ",
                            title = '" . $other['title'] . "',
                            author = '" . $other['author'] . "',
                            year = " . $other['year'] . ",
                            date_added = '" . $other['date_added'] . "',
                            picture = '" . $other['picture'] . "'
                            WHERE id = " . $other['id'] . "
                            ");
            $this->db->query("UPDATE other
                            SET
                            material_id = " . $other['id'] . ",
                            type = '" . $other['type'] . "'
                            WHERE material_id = '" . $other['id'] . "'
                            ");
        $this->db->close();
        }

        public function updateQuantity($title, $author, $quantity){
            $this->db->query("UPDATE material
                            SET
                            quantity= '" .$quantity. "'
                            WHERE title LIKE '".$title."' AND author LIKE '".$author."' ");
        }

       
        public function uploadPhoto($photo, $id){
            $this->db->query("UPDATE book SET picture = '$photo' where id = '$id'");
        }

}
?>