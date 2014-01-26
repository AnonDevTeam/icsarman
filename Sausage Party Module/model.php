<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model extends CI_Model {

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

		public function addBook($id, $title, $author, $year, $date,$quantity, $status, $picture, $course_code, $publisher){
		$this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year','$date','$quantity', '$status','$picture')");
        $this->db->query("INSERT INTO book values('$id','$course_code','$publisher')");
		}

		public function addMag($id, $title, $author, $year, $date,$quantity, $status, $picture, $month, $volume_no){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year','$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO magazine values('$id', '$month', '$volume_no')");
		}

		public function addSpThesis($id, $title, $author, $year, $date,$quantity, $status, $picture, $adviser, $type){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year','$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO sp_thesis values('$id', '$adviser', '$type')");
		}

		public function addOther($id, $title, $author, $year, $date,$quantity, $status, $picture, $type){
        $this->db->query("INSERT INTO material values('$id', '$title', '$author', '$year','$date','$quantity', '$status','$picture')");
		$this->db->query("INSERT INTO other values('$id', '$type')");
		}

        public function update_book($book){
            $this->db->query("UPDATE material
                            SET
                            material_id = " . $book['material_id'] . ",
                            title = '" . $book['title'] . "',
                            author = '" . $book['author'] . "',
                            year = " . $book['year'] . ",
                            date_added = '" . $book['date_added'] . "',
                            quantity = " . $book['quantity'] . ",
                            status = " . $book['status'] . ",
                            picture = '" . $book['picture'] . "'
                            WHERE material_id = " . $book['material_id'] . "
                            ");
            $this->db->query("UPDATE book
                            SET
                            material_id = " . $book['material_id'] . ",
                            course_code = '" . $book['course_code'] . "',
                            publisher = '" . $book['publisher'] . "'
                            WHERE material_id = '" . $book['material_id'] . "'
                            ");
        $this->db->close();
        }

        public function update_magazine($magazine){
            $this->db->query("UPDATE material
                            SET
                            material_id = " . $magazine['material_id'] . ",
                            title = '" . $magazine['title'] . "',
                            author = '" . $magazine['author'] . "',
                            year = " . $magazine['year'] . ",
                            date_added = '" . $magazine['date_added'] . "',
                            quantity = " . $magazine['quantity'] . ",
                            status = " . $magazine['status'] . ",
                            picture = '" . $magazine['picture'] . "'
                            WHERE material_id = " . $magazine['material_id'] . "
                            ");
            $this->db->query("UPDATE magazine
                            SET
                            material_id = " . $magazine['material_id'] . ",
                            volume_number = '" . $magazine['volume_number'] . "',
                            month = " . $magazine['month'] . "
                            WHERE material_id = '" . $magazine['material_id'] . "'
                            ");
        $this->db->close();
        }

        public function update_sp_thesis($sp_thesis){
            $this->db->query("UPDATE material
                            SET
                            material_id = " . $sp_thesis['material_id'] . ",
                            title = '" . $sp_thesis['title'] . "',
                            author = '" . $sp_thesis['author'] . "',
                            year = " . $sp_thesis['year'] . ",
                            date_added = '" . $sp_thesis['date_added'] . "',
                            quantity = " . $sp_thesis['quantity'] . ",
                            status = " . $sp_thesis['status'] . ",
                            picture = '" . $sp_thesis['picture'] . "'
                            WHERE material_id = " . $sp_thesis['material_id'] . "
                            ");
            $this->db->query("UPDATE sp_thesis
                            SET
                            material_id = " . $sp_thesis['material_id'] . ",
                            adviser = '" . $sp_thesis['adviser'] . "',
                            type = '" . $sp_thesis['type'] . "'
                            WHERE material_id = '" . $sp_thesis['material_id'] . "'
                            ");
        $this->db->close();
        }

        public function update_other($other){
            $this->db->query("UPDATE material
                            SET
                            material_id = " . $other['material_id'] . ",
                            title = '" . $other['title'] . "',
                            author = '" . $other['author'] . "',
                            year = " . $other['year'] . ",
                            date_added = '" . $other['date_added'] . "',
                            quantity = " . $other['quantity'] . ",
                            status = " . $other['status'] . ",
                            picture = '" . $other['picture'] . "'
                            WHERE material_id = " . $other['material_id'] . "
                            ");
            $this->db->query("UPDATE other
                            SET
                            material_id = " . $other['material_id'] . ",
                            type = '" . $other['type'] . "'
                            WHERE material_id = '" . $other['material_id'] . "'
                            ");
        $this->db->close();
        }

        public function requestApproval($is_approved, $transaction_id){
            $this->db->query("UPDATE borrowed_material SET is_approved = " . $is_approved . " where transaction_id = " . $transaction_id);
        }
        public function rejectRequest($transaction_id){
            $this->db->query("DELETE FROM borrowed_material where transaction_id = " . $transaction_id);
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

        public function uploadPhoto($photo, $id){
            $this->db->query("UPDATE book SET picture = '$photo' where id = '$id'");
        }

}
?>