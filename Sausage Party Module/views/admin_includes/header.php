<?php
    if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> .:: ::. </title>
        <script src = "/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/css/reset.css">
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/css/style.css"/>
	</head>
	<body>

<div id="header">
<?php
   
        $this->load->view("/admin_includes/admin_nav.php");
?>
</div>