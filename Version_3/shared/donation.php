<?php

$noticeDate=addslashes($_POST['noticeDate']);
$noticeDes=addslashes($_POST['noticeDes']);
$noticeType=addslashes($_POST['noticeType']);
$msg = "";



session_start();

print_r($_SESSION['userdata']['adminId']);
$adminId = $_SESSION['userdata']['adminId'];
print_r($_POST);

echo "<br>";

print_r($_FILES['noticeFile']);

$prefix="../";
$path = "shared/notice/";

$file_name=$path.$_SESSION['userdata']['adminId'].date("d-m-Y-H-i-s").$_FILES['noticeFile']['name'];

move_uploaded_file($_FILES['image']['tmp_name'],$prefix.$file_name);    

include "../shared/connection.php";


$status = mysqli_query($conn,"INSERT INTO notice(noticeDate,noticeDes,noticeFile,noticeType,addedby) VALUES ('$noticeDate','$noticeDes','$file_name','$noticeType','$adminId')");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Photo Uploaded Successfully!";
    header("location:dashboard.php?msg='$msg'");



?>