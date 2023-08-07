<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_SESSION['userdata']["adminId"];
    $upass = $_POST['upass'];
    $upass1 = $_POST['upass1'];
    $error = "";

    $hash = md5($upass);
    $hash1 = md5($upass1);

    include "../shared/connection.php";


    $sql_cursor = mysqli_query($conn, "select password from admin where adminId='$uname'");

    $count = mysqli_num_rows($sql_cursor);
    $row = mysqli_fetch_assoc($sql_cursor);
    $cpass = $row['password'];
    if (!$sql_cursor) {
        $msg = "User is not logged in. Try login";
        header("location:login.php?msg='$msg'");
        die;
    } else if ($hash != $cpass) {
        echo "You entered an incorrect password";
        header("location:login.php?msg='$msg'");
        die;
    }
    $sql = mysqli_query($conn, "UPDATE admin SET password='$hash1' where adminId='$uname'");
    if ($sql) {
        $msg = "Congratulations You have successfully changed your password";
        header("location:dashboard.php?msg='$msg'");
    } else {
        echo "Passwords do not match";
    }
}
