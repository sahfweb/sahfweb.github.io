<?php


$sex=addslashes($_POST['sex']);
$dob=addslashes($_POST['dob']);
$mobileNo = addslashes($_POST['mobileNo']);
$wtspNo = addslashes($_POST['wtspNo']);
$language1 = addslashes($_POST['language1']);
$language2 = addslashes($_POST['language2']);
$msg = "";



session_start();

print_r($_SESSION['userdata']['volunteerId']);
$volunteerId = $_SESSION['userdata']['volunteerId'];
print_r($_POST);

echo "<br>";


include "../shared/connection.php";


$status = mysqli_query($conn,"UPDATE volunteerdata SET sex = '$sex', dob = '$dob', mobileNo = $mobileNo, wtspNo = '$wtspNo', language1 = '$language1', language2 = '$language2' WHERE volunteerId = $volunteerId");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Profile Updated Successfully!";
    header("location:dashboard.php#profile?msg='$msg'");



?>