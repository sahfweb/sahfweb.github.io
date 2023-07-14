<?php

$msg = "";



session_start();

print_r($_SESSION['userdata']['userId']);
$userId = $_SESSION['userdata']['userId'];
print_r($_POST);

echo "<br>";

print_r($_FILES['photo']);
print_r($_FILES['signature']);

$prefix="../";
$path1 = "shared/images/volunteer/image/";
$path2 = "shared/images/volunteer/sign/";


$file_name1=$path1.$_SESSION['userdata']['userId'].date("d-m-Y-H-i-s").$_FILES['photo']['name'];
$file_name2=$path2.$_SESSION['userdata']['userId'].date("d-m-Y-H-i-s").$_FILES['signature']['name'];


move_uploaded_file($_FILES['photo']['tmp_name'],$prefix.$file_name1); 
move_uploaded_file($_FILES['signature']['tmp_name'],$prefix.$file_name2);    

include "../shared/connection.php";


$status = mysqli_query($conn,"UPDATE volunteerdata SET photo = '$file_name1', signature = '$file_name2' WHERE volunteerId = '$userId'");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Photo Uploaded Successfully!";
    header("location:dashboard.php#images?msg='$msg'");



?>