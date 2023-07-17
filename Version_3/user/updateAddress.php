<?php

$tempAddress = addslashes($_POST['tempAddress']);
$parmaAddress = addslashes($_POST['parmaAddress']);
$msg = "";


session_start();

print_r($_SESSION['userdata']['userId']);
$userId = $_SESSION['userdata']['userId'];
print_r($_POST);

echo "<br>";


include "../shared/connection.php";


$status = mysqli_query($conn,"UPDATE volunteerdata SET tempAddress = '$parmaAddress', parmaAddress = '$parmaAddress' WHERE volunteerId = '$userId'");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Address Educational Updated Successfully!";
    header("location:dashboard.php#address?msg='$msg'");



?>