<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Delete_Material extends CI_Controller{

		function __construct(){
		parent::__construct();
			$this->load->model('m_delete_material');
			$this->load->helper('url');
			$this->load->helper('form');
		}

		function callDeleteBook(){
		
		echo "<script language=\"javascript\">confirm('Are you sure you want to delete material?');var r=true;if (r == true){</script>";
	
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_book($_POST['delete']);
		echo "<script language=\"javascript\">alert('Successfully deleted material!');</script>";
		echo "<script>} </script>";
		$this->load->view("management");
		}
		function callDeleteMagazine(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_magazine($_POST['delete']);
		echo "<script language=\"javascript\">alert('Successfully deleted material!');</script>";
			$this->load->view("management");
		}
		function callDeleteSPThesis(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_sp_thesis($_POST['delete']);
		echo "<script language=\"javascript\">alert('Successfully deleted material!');</script>";
		
			$this->load->view("management");
		}
		function callDeleteOther(){
		$name = $_POST['delete'].".".$_POST['deletepic'];
		$dest = './images/';
		$dest.=$name;
		if(file_exists($dest)) unlink($dest);
		$this->m_delete_material->delete_other($_POST['delete']);
		echo "<script language=\"javascript\">alert('Successfully deleted material!');</script>";
			$this->load->view("management");
		}

	}

?>