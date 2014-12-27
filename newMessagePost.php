<?php 
include "leaks.php";
$message = nl2br($_POST['message']);
$id = $_POST['id'];
postNewMessage($id,$message);
?>
