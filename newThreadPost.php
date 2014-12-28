<?php 
include "leaks.php";
$title = nl2br($_POST['title']);
$message = nl2br($_POST['message']);
$upload = $_FILES["file"];
postNewThread($title,$message,$upload);
?>
