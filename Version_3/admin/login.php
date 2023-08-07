<?php
// login.php

// Display all errors for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Initialize the message variable
$msg = "";

// Check if the user is already logged in
if (!empty($_SESSION['userdata']["adminId"])) {
    $msg = 'You are Already logged in';
    header("location:dashboard.php?msg=$msg");
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form submission
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    // Include the database connection file
    include "../shared/connection.php";

    // Hash the password (you should use a more secure hashing mechanism like bcrypt)
    $hash = md5($upass);

    // Prepare the SQL query to fetch the user with the provided credentials
    $sql = "SELECT * FROM admin WHERE username='$uname' AND password='$hash'";

    // Execute the query
    $sql_cursor = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$sql_cursor) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if the user exists
    if (mysqli_num_rows($sql_cursor) == 0) {
        $msg = "Invalid Credentials. If you are new, please Register";
    } else {
        // Fetch the user data
        $row = mysqli_fetch_assoc($sql_cursor);

        // Store the user data in the session
        $_SESSION['userdata'] = $row;
        $_SESSION['login_status'] = true;
        $_SESSION['adminId'] = $row['adminId'];

        // Redirect to the dashboard page
        header("location:dashboard.php");
        exit;
    }
}
?>

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
<body>

    <div class="d-flex vh-100 justify-content-center align-items-center">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="w-25 bg-warning p-4" method="post">

        <h4 class="text-center mb-4">Admin Login</h4>
        <h6 class="text-center mb-2"><?php echo $msg; ?></h6>
        <input required class="form-control" type="text" placeholder="Enter Username" name="uname">
        <input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass">        
        <button class="form-control mt-3 btn btn-danger">Login</button>
        
        <p><a href="../index.php">Back to Home Page</a></p>

    </form>
    
    </div>
    
</body>
</html>
