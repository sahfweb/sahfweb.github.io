<!DOCTYPE html>
<html lang="en">

<head>
<style>
        /*body{*/
        /*    background-image: url('../shared/images/volunteer10.jpg');*/
        /*}*/
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $fullname = $_POST['fullname'];
    $upass = $_POST['upass1'];
    $upass2 = $_POST['upass2']; // Add this line for re-entered password
    $error = "";

    if ($upass !== $upass2) {
        $msg = "Password Mismatch";
        header("location:register.php?msg=" . urlencode($msg));
        die;
    }

    $hash = md5($upass);

    include "../shared/connection.php";

    $sql_cursor = mysqli_query($conn, "SELECT * FROM admin WHERE username='$uname'");

    $count = mysqli_num_rows($sql_cursor);
    if ($count > 0) {
        $msg = "Email is Already Registered. Try login";
        header("location:login.php?msg=" . urlencode($msg));
        die;
    }

    $status = mysqli_query($conn, "INSERT INTO admin(username, name, password) VALUES ('$uname', '$fullname', '$hash')");
    if ($status) {
        $adminId = mysqli_insert_id($conn); // Get the last inserted ID
        $status2 = mysqli_query($conn, "INSERT INTO adminId(adminId) VALUES ('$adminId')");

        if ($status2) {
            $msg = "Registration Successful";
            header("location:login.php?msg=" . urlencode($msg));
        } else {
            $error = "Error in SQL";
            echo mysqli_error($conn);
        }
    } else {
        $error = "Error in SQL";
        echo mysqli_error($conn);
    }
}
?>

<body>

    <div class="d-flex vh-100 justify-content-center align-items-center">

        <form action="register.php" class="w-25 bg-warning p-4" onsubmit="return validate()" method="post">

            <h4 class="text-center mb-4">admin Registration</h4>
            <h6 class="text-center mb-2"><?php echo "$msg"?></h6>
            <input required class="form-control mt-2" type="text" placeholder="Enter your Email" name="uname">
            <input required class="form-control mt-2" type="text" placeholder="Enter your Name" name="fullname">
            <input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass1">
            <input required class="form-control mt-2" type="password" placeholder="Re-Enter Password" name="upass2">
            <button class="form-control mt-3 btn btn-success">Register</button>
            <p>Already Registered??<a href="login.php">Login</a></p>

        </form>

    </div>


    <script>
        function validate() {
            pass1 = document.getElementsByName("upass1")[0].value;
            pass2 = document.getElementsByName("upass2")[0].value;

            if (pass1 == pass2) {
                return true;
            } else {
                alert("Password Mismatch");
                return false;
            }
        }
    </script>

</body>

</html>