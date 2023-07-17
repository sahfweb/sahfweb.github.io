<?php


$pastDegree = addslashes($_POST['pastDegree']);
$yearPastDegree = addslashes($_POST['yearPastDegree']);
$currentDegree = addslashes($_POST['currentDegree']);
$yearCurrentDegree = addslashes($_POST['yearCurrentDegree']);
$msg = "";



session_start();

print_r($_SESSION['userdata']['userId']);
$userId = $_SESSION['userdata']['userId'];
print_r($_POST);

echo "<br>";


include "../shared/connection.php";


$status = mysqli_query($conn,"UPDATE volunteerdata SET pastDegree = '$pastDegree', yearPastDegree = '$yearPastDegree', currentDegree = '$currentDegree', yearCurrentDegree = '$yearCurrentDegree' WHERE volunteerId = '$userId'");

if(!$status)
{
    
    $msg = "Error in SQL Syntax";
    header("location:dashboard.php?msg='$msg'");
}

    $msg =  "Educational Background Updated Successfully!";
    header("location:dashboard.php#edu?msg='$msg'");



?>