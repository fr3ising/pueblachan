<?php 
include "leaks.php";
$title = nl2br($_POST['title']);
$message = nl2br($_POST['message']);
postNewThread($title,$message);
?>
