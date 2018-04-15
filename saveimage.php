<?php
session_start();
$uname=$_SESSION['uname'];
//set random name for the image, used time() for uniqueness
 
$filename =   "$uname.jpg";
$filepath = '../social_relation_face/comments/';
 
move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath.$filename);
 
echo $filepath.$filename;
?>