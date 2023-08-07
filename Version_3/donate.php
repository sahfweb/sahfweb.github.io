
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONATE</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>

<body>


    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Donate page start here -->




    <!--donate-->

    <section class="donate-now">
        <div class="allpagtop-img">
            <img src="images1/homeimg/homeimg6.jpg" alt="">
            <h1> DONATE NOW</h1>
        </div>
        <h5>BE A PART OF CHANGE </h5>
        <h6>Donate now and make a beautiful path in someone's life</h6><br>
        <br>
        <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'redirect.php';
 include "shared/connection.php"; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $amount = $_POST['amount'];
    $screenshotFile = $_FILES['screenshot'];
    
    // Check if a file was uploaded
    if ($screenshotFile['error'] === 0) {
        $uploadDir = 'shared/images/donate/';
        $newFileName = time() . '_' . basename($screenshotFile['name']);
        $uploadPath = $uploadDir . $newFileName;
        
        // Move uploaded file to the desired location
        if (move_uploaded_file($screenshotFile['tmp_name'], $uploadPath)) {
            // Insert data into the database
            $sql = "INSERT INTO donation (name, email, mobile, amount, screenshot) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $name, $email, $mobile, $amount, $uploadPath);
            if ($stmt->execute()) {
                // Success
                echo "<p class='sucsess'>Data submitted successfully!</p>";
            } else {
                // Error
                echo "<p class='error'>Error submitting data: " . $stmt->error."</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='error'>Error uploading file.</p>";
        }
    } else {
        echo "<p class='error'>Error uploading file: " . $screenshotFile['error'] . "</p>";
    }
}
?>
        <div class="donate-cont">
            <style>
                .sucsess {
                    color: green;
    display: block;
    text-align: center;
    font-size: 16px;
}
.error {
    color: red;
    display: block;
    text-align: center;
    font-size: 16px;
}
            </style>
            <div class="donate-details">
                <img src="images1/QR CODE.jpg" alt="">
            </div>
            <div class="donate-details">
                <img src="images1/logo.png" alt="">
                
            </div>
            <div class="donate-details">
                <h6> Account Details</h6>
                <P>Account Holder: RAVI SINGH KUSHWAHA </p><br>
                <p> Account Number: 50100215294963</p> <br>
                <p>IFSC: HDFC0003962</p> <br>
                <P>Bank Name: HDFC</P> <br>
                <p>UPI ID - ravisinghkushwaha@okhdfcbank</p>
            </div>
            <div class="donate-details">
            <h6>Make A Record</h6>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="screenshot">Attach Screenshot: </label>
                    <input type="file" name="screenshot" id="screenshot" required>
                </div>
                <div class="form-group">
                    <label for="amount">Rs: </label>
                    <input type="text" name="amount" id="amount" class="form-data" placeholder="Amount Paid" required>
                </div>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" class="form-data" placeholder="Enter Your Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" class="form-data" placeholder="Enter Your Email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Mobile: </label>
                    <input type="number" name="phone" id="phone" class="form-data" placeholder="Enter Your Phone No." required>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        </div>
        </div>
    </section>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>


    
</body>

</html>