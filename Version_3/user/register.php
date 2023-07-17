<!DOCTYPE html>
<html lang="en">

<head>
<style>
        body{
            background-image: url('../shared/images/volunteer10.jpg');
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php

if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
}else{
    $msg="";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $fullname = $_POST['fullname'];
    $upass = $_POST['upass1'];
    $error = "";

    $hash = md5($upass);

    include "../shared/connection.php";


    $sql_cursor = mysqli_query($conn, "select * from volunteer where username='$uname'");

    $count = mysqli_num_rows($sql_cursor);
    if ($count > 0) {
        $msg = "Email is Already Registered. Try login";
        header("location:login.php?msg='$msg'");
        die;
        
    }

    $status = mysqli_query($conn, "insert into volunteer(username,name,password) values('$uname','$fullname','$hash') ");
    $row=mysqli_fetch_assoc(mysqli_query($conn,"select * from volunteer where username='$uname'"));
    $volunteerId = $row['volunteerId'];
    $status2 = mysqli_query($conn, "insert into volunteerdata(volunteerId) values('$volunteerId')");

    if ($status && $status2) {
        $msg =  "Registration Successfull";
        header("location:login.php?msg='$msg'");
    } else {
        $error =  "Error is SQL";
        echo mysqli_error($conn);
    }
}


?>

<body>

    <div class="d-flex vh-100 justify-content-center align-items-center">

        <form action="register.php" class="w-25 bg-warning p-4" onsubmit="return validate()" method="post">

            <h4 class="text-center mb-4">User Registration</h4>
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