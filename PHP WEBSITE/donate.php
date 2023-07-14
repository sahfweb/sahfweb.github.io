 <?php include 'redirect.php' ?>; 
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
        <h6>Donate now and make a beautiful path in someone's life</h6>
        <div class="donate-cont">
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
                <form>
                    <div class="form-group">
                        <label for="name"> Attach Screenshort": </label>
                        <input type="file" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name"> Rs: </label>
                        <input type="text" name="name" id="name" class="form-data" placeholder="Rs" required>
                    </div>

                    <div class="form-group">
                        <label for="name"> Name: </label>
                        <input type="text" name="name" id="name" class="form-data" placeholder="Enter Your Full name" required>
                    </div>
                    <div class="form-group">
                        <label for="email"> Email: </label>
                        <input type="email" name="email" id="email" class="form-data" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone"> Mob</label>
                        <input type="number" name="phone" id="phone" class="form-data" placeholder="Enter Your Phone No." required>
                    </div>
                    <button type="submit" id="submit" class="btn" onclick="fun()"> Submit </button>
                </form>
            </div>
        </div>
    </section>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>


    <script>
        function fun() {
            alert('technical error..')
        }
    </script>

</body>

</html>