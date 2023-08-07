 <?php include 'redirect.php' ?>; 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>


    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- UPCOMING page start here -->

    <!-- upcomig EVENT-->

    <br>
    <br>
    <br>
    <br>
        <div class="event-all">
            <div class="past-cont">
                <div class="event-contall">
<div class="container">
        <h2 style=" font-size: 40px;">Volunteer Registration</h2>
        
        <br>
        <br>
        <?php
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

        
        include "shared/connection.php"; // Include your connection setup

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $email =  htmlspecialchars(trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : ""));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $whatsapp =   htmlspecialchars(trim($_POST['whatsapp']));
    $permanentAddress = htmlspecialchars(trim($_POST['permanent_address']));
    $currentAddress = htmlspecialchars(trim($_POST['current_address']));
    $preferredCity = htmlspecialchars(trim($_POST['preferred_city']));
    $preferredCityOther = ($preferredCity == "Other") ? htmlspecialchars(trim($_POST['preferred_city_other'])) : "";
    $monetarySupport =  htmlspecialchars(trim($_POST['monetary_support']));
    $consent =  htmlspecialchars(trim($_POST['consent']));

    // Perform more specific validations if needed
    // For example, you can check if the entered date of birth is valid, etc.

    // Insert the sanitized and validated data into the database
    $checkEmailQuery = "SELECT * FROM volunteers_data WHERE email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);
    if (mysqli_num_rows($result) > 0) {
        echo "<p1 class='success'>Congratulation! You are already a Volunteer. No need to register</p1>";
    } else {
        // Insert the sanitized and validated data into the database
        $sql = "INSERT INTO volunteers_data (fullname, dob, sex, email, phone, whatsapp, permanent_address, current_address, preferred_city, preferred_city_other, monetary_support, consent) VALUES ('$fullname', '$dob', '$sex', '$email', '$phone', '$whatsapp', '$permanentAddress', '$currentAddress', '$preferredCity', '$preferredCityOther', '$monetarySupport', '$consent')";
        if (mysqli_query($conn, $sql)) {
            echo "<p1 class='success'>Congratulation! You are now a Volunteer<br> Now! Just sit tight. SAHF team will contact you ASAP</p1>";
        } else {
            echo "<p1 class='error'>Error in registration: " . mysqli_error($conn) . " <br> Contact : sahfofficial.it@gmail.com</p1>";
        }
    }
}
        ?>
        <form action="volunteer.php" method="post" style="font-size : 14px;">
            <br>
            <br>
            <label for="fullname">1. Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
            <br>

            <label for="dob">2. Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            <br>

            <label for="sex">3. Sex:</label>
            <select id="sex" name="sex" onchange="toggleInput('sexInput', 'sex')">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="Prefer Not to say">Prefer Not to say</option>
                <option value="other">Other</option>
            </select>
            <br>
            <input type="text" id="sexInput" name="sexInput" style="display: none;" placeholder="Please specify">

            <br>
            <br>
            <label for="email">4. Email:</label>
            <input type="email" id="email" name="email" required>

            <br>
            <label for="phone">5a. Phone Number (Indian Number, 10 digits):</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

            <br>
            <label for="whatsapp">5b. Whatsapp Number</label>
            <input type="tel" id="whatsapp" name="whatsapp" pattern="[0-9]{10}" required>

            <br>
            <label for="permanent_address">6. Permanent Address:</label>
            <textarea id="permanent_address" name="permanent_address" required></textarea>

            <br>
            <label for="current_address">7. Current Address:</label>
            <textarea id="current_address" name="current_address" required></textarea>

            <br>
            <label for="preferred_city">8. Preferable City:</label>
            <select id="preferred_city" name="preferred_city" onchange="toggleInput('cityInput', 'preferred_city')">
                <option value="Delhi">Delhi</option>
                <option value="Gurugram">Gurugram</option>
                <option value="Noida">Noida</option>
                <option value="Delhi NCR">Delhi (NCR Region)</option>
                <option value="Ballia">Ballia</option>
                <option value="other">Other</option>
            </select>
            <br>
            <input type="text" id="cityInput" name="cityInput" style="display: none;" placeholder="Please specify">

            <br>
            <br>
            <label>9. Can you provide monetary support?</label>
            <input type="radio" name="monetary_support" value="Yes" required> Yes
            <input type="radio" name="monetary_support" value="No" required> No
            <input type="radio" name="monetary_support" value="I don't know" required> I don't know

            <br>
            <br>
            <label>10. Do you give us consent that SAHF can use your details for its work?</label>
            <input type="radio" name="consent" value="Yes" required> Yes
           
           <br>
           <br>

            <button type="submit" style="display: block; margin: 10px auto;">Register</button>
        </form>
    </div>
    </div>
            </div>

        </div>
    </section>
    
    <br>
    <br>
    <br>
    <br>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>

</body>
<script>
        function toggleInput(elementId, selectId) {
            const input = document.getElementById(elementId);
            const select = document.getElementById(selectId);

            if (select.value === "other") {
                input.style.display = "block";
            } else {
                input.style.display = "none";
            }
        }
    </script>
    <style>
        p1 {
            font-size : 16px;
            display: block;
            margin: 2px auto;
            text-align: center;
        }
        }
    </style>

</html>