<?php

$memName=addslashes($_POST['memName']);
$memPos=addslashes($_POST['memPos']);
$memDes1=addslashes($_POST['memDes1']);
$memDes2=addslashes($_POST['memDes2']);
$memMail=addslashes($_POST['memMail']);
$memType=addslashes($_POST['memType']);
$msg = "";



session_start();

print_r($_SESSION['userdata']['adminId']);
$adminId = $_SESSION['userdata']['adminId'];
print_r($_POST);

echo "<br>";

print_r($_FILES['memImg']);

$prefix="../";
$path = "shared/images/team/";

$file_name=$path.$_SESSION['userdata']['adminId'].date("d-m-Y-H-i-s").$_FILES['memImg']['name'];

move_uploaded_file($_FILES['memImg']['tmp_name'],$prefix.$file_name);    

include "../shared/connection.php";


$status = mysqli_query($conn,"INSERT INTO team(name,position,line1,line2,email,img,type) VALUES ('$memName','$memPos','$memDes1','$memDes2','$memMail','$file_name','$memType')");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Photo Uploaded Successfully!";
    header("location:dashboard.php?msg='$msg'");



?>