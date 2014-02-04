<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Delete_Material extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_delete_material');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function callDeleteBook(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_book($_POST['delete']);
		redirect('../index.php/Index/management');
		}
		function callDeleteMagazine(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_magazine($_POST['delete']);
		redirect('../index.php/Index/management');
		}
		function callDeleteSPThesis(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_sp_thesis($_POST['delete']);
		redirect('../index.php/Index/management');
		}
		function callDeleteOther(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_other($_POST['delete']);
		redirect('../index.php/Index/management');
		}

	}

?>