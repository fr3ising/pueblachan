<?php 
include "leaks.php";
$message = nl2br($_POST['message']);
$id = $_POST['id'];
$upload = $_FILES['file'];
postNewMessage($id,$message,$upload);
?>
