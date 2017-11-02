<?php
/*
// Set a session variable indicating successful upload
session_start();
$_SESSION['upload_success'] = TRUE;
// Redirect back to the previous(main) page
header("url=../index.php");
exit();
 * 
 */
//1. Need to update: link the uploaded file to the A.I.

$source = $_FILES['profile']['tmp_name'];
$dest = "../images/".basename($_FILES['profile']['name']);
move_uploaded_file($source, $dest);
?>

