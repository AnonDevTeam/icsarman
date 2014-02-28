<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Suggestions extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_approve_suggestion');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function suggestion_view(){
		$this->load->view("/admin_includes/header");
		$this->load->view("suggest_view");
		$this->load->view("/admin_includes/footer");
		}

		function manage_suggestion_view(){
		$this->load->view("/admin_includes/header");

		$data['books'] = $this->m_approve_suggestion->get_all_sug_book_data();
		$data['magazines'] = $this->m_approve_suggestion->get_all_sug_mag_data();
		$data['others'] = $this->m_approve_suggestion->get_all_sug_others_data();

		redirect('../index.php/Index/management');
		$this->load->view("/admin_includes/footer");
		}

		function callAddSuggestion(){
						$getid = mysql_query("SELECT auxil_id FROM suggest_material ORDER BY auxil_id DESC LIMIT 1");
						$row = mysql_fetch_array($getid);
						$auxil_id=$row['auxil_id']+1;
				
				$user_id = ($_POST['user_id']); 
				$title = ($_POST['title']);
				$author = ($_POST['author']);
				$publisher = ($_POST['publisher']);
				$date_published = ($_POST['year']);
				$type = ($_POST['type']);
				$time = date('Y-m-d');
				$status = "pending";

				$this->m_approve_suggestion->addSuggestion($auxil_id, $user_id, $title, $author, $publisher, $date_published, $type, $time, $status); 

				redirect('../index.php/suggestions/suggestion_view');
		}

		function callDeleteSuggestion(){
			$this->m_approve_suggestion->delete_suggestion($_POST['delete']);
			redirect('../index.php/Index/management');
		}

	}

?>