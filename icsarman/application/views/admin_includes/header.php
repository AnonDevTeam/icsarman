<?php
    if(!isset($_SESSION))
        session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> .:: ::. </title>
        <script src = "../../js/jquery.min.js"></script>
    </head>
    <body>

<div id="header">
<?php
   
        $this->load->view("/admin_includes/admin_nav.php");
?>
</div>