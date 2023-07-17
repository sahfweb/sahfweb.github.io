<?php


$alt=addslashes($_POST['imgalt']);
$type = $_POST['imgtype'];
$msg = "";



session_start();

print_r($_SESSION['userdata']['adminId']);
$adminId = $_SESSION['userdata']['adminId'];
print_r($_POST);

echo "<br>";

print_r($_FILES['image']);

$prefix="../";
$path = "shared/images/gallery/";

$file_name=$path.$_SESSION['userdata']['adminId'].date("d-m-Y-H-i-s").$_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'],$prefix.$file_name);    

include "../shared/connection.php";


$status = mysqli_query($conn,"INSERT INTO gallery(type,alt,image,addedby) VALUES ('$type','$alt','$file_name','$adminId')");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Photo Uploaded Successfully!";
    header("location:dashboard.php?msg='$msg'");



?>