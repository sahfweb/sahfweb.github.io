<?php


$pastDegree = addslashes($_POST['pastDegree']);
$yearPastDegree = addslashes($_POST['yearPastDegree']);
$currentDegree = addslashes($_POST['currentDegree']);
$yearCurrentDegree = addslashes($_POST['yearCurrentDegree']);
$msg = "";



session_start();

print_r($_SESSION['userdata']['volunteerId']);
$volunteerId = $_SESSION['userdata']['volunteerId'];
print_r($_POST);

echo "<br>";


include "../shared/connection.php";


$status = mysqli_query($conn,"UPDATE volunteerdata SET pastDegree = '$pastDegree', yearPastDegree = '$yearPastDegree', currentDegree = '$currentDegree', yearCurrentDegree = '$yearCurrentDegree' WHERE volunteerId = $volunteerId");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Educational Background Updated Successfully!";
    header("location:dashboard.php#edu?msg='$msg'");



?>