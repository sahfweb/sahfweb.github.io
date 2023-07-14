<?php


$date=addslashes($_POST['date']);
$monthYear=addslashes($_POST['monthYear']);
$head = addslashes($_POST['head']);
$time = addslashes($_POST['time']);
$location = addslashes($_POST['location']);
$heading = addslashes($_POST['heading']);
$description = addslashes($_POST['description']);
$type = $_POST['type'];
$msg = "";



session_start();

print_r($_SESSION['userdata']['adminId']);
$adminId = $_SESSION['userdata']['adminId'];
print_r($_POST);

echo "<br>";

print_r($_FILES['image']);

$prefix="../";
$path = "shared/images/event/";

$file_name=$path.$_SESSION['userdata']['adminId'].date("d-m-Y-H-i-s").$_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'],$prefix.$file_name);    

include "../shared/connection.php";


$status = mysqli_query($conn,"INSERT INTO event(date,monthYear,head,time,location,heading,description,image,type,addedBy) VALUES ('$date','$monthYear','$head','$time','$location','$heading','$description','$file_name','$type','$adminId')");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Event Uploaded Successfully!";
    header("location:dashboard.php?msg='$msg'");



?>