<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
            background-image: url('../shared/images/volunteer10.jpg');
        }
    </style>
</head>
<?php

session_start();
if (! empty($_SESSION['userdata']["adminId"])) {
    $msg = 'You are Already logged in';
    header("location:dashboard.php?msg='$msg'");
}

if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
}else{
    $msg="";
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    

$_SESSION['login_status']=false;

$uname=$_POST['uname'];
$upass=$_POST['upass'];

 $hash=md5($upass);
$hash = $upass;

include "../shared/connection.php";

$sql_cursor=mysqli_query($conn,"select * from admin where username='$uname' and password='$hash'");

if(mysqli_num_rows($sql_cursor)==0)
{
    $msg = "Invalid Credentials. If you are new please Register";
    header("location:login.php?msg='$msg'");
    die;
}


$row=mysqli_fetch_assoc($sql_cursor);


$_SESSION['userdata']=$row;
$_SESSION['login_status']=true;
$_SESSION['adminId']=$row['adminId'];

header("location:dashboard.php");

}
?>
<body>

    <div class="d-flex vh-100 justify-content-center align-items-center">

    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' class="w-25 bg-warning p-4" method="post">

        <h4 class="text-center mb-4">Admin Login</h4>
        <h6 class="text-center mb-2"><?php echo "$msg"?></h6>
        <input required class="form-control" type="text" placeholder="Enter Username" name="uname">
        <input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass">        
        <button class="form-control mt-3 btn btn-danger">Login</button>
        
        <p><a href="../index.php">Back to Home Page</a></p>

    </form>
    
    </div>
    
</body>
</html>
