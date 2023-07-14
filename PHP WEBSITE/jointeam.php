 <?php include 'redirect.php' ?>; 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work With Team</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/get-involved.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>

    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Work with team page start here -->


    <!-- WORK WITH TEAM  -->

    <section class="Work-withteam">
        <div class="allpagtop-img">
            <img src="images1/homeimg/homeimg3.jpg" alt="">
            <h1>Work With Team</h1>
        </div>
        <div class="work-title">
            <h2>TEAM MEMBER SELECTION</h2>
            <br>
            <P>Welcome to SAFEZONE Active Humanity Foundation. You will join as a volunteer.
            </P>
        </div>
        <br>
        <form class="workwith-form">
            <div class="workwith-group">
                <label for="name"> Name: </label>
                <input type="text" name="name" id="name" class="form-data" placeholder="Enter Your Full name" required>
            </div>
            <div class="workwith-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" class="form-data" placeholder="Enter Your Email" required>
            </div>
            <div class="workwith-group">
                <label for="phone"> CONTACT NO.</label>
                <input type="number" name="phone" id="phone" class="form-data" placeholder="Enter Your Phone No." required>
            </div>
            <div class="workwith-group">
                <label for="address"> PROFESSION (FULL DETAILS) </label>
                <input type="text" name="address" id="address" class="form-data" placeholder=" Your Address" required>
            </div>
            <div class="workwith-group">
                <h4>DEPARTMENT OF INTEREST -</h4>
                <h5>Requirements and skills </h5>

                <h6>IT team</h6>
                <p>Computer skills </p>
                <p> language skills(c++ etc etc)</p> <br>

                <h6>Graphic designing</h6>
                <p>Video editing skills</p>
                <p>Content creation(ideas)</p><br>

                <h6>Content writing department</h6>
                <p>Good with language( English compulsory additional hindi)</p>
                <p>Writing skills</p><br>

                <h6>Finance and budget</h6>
                <p>Knowledge of economics</p>
                <p>Good at money management </p><br>

                <h6>Legal</h6>
                <p>Law background</p>
                <p>Knowledge about copyright etc</p><br>

                <h6>Sponsorship</h6>
                <p>Good at presenting things(presentation)</p>
                <p>Ideas about how to get investors</p> <br>

                <h6>Event planning</h6>
                <p>Basic idea about recent trends</p>
                <p>Creative(new ideas regarding events which has a potential to reach masses)</p> <br>
            </div>
            <div class="workwith-group">
                <h6>Like to join as a </h6>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> IT team member
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Graphic team member
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Content writing team member
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Finance team member
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Legal team
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Sponsor team member
                </Label>
                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required> Event planning team member
                </Label>
            </div>
            <div class="workwith-group">
                <H6>Thanks for your support....</H6>
            </div>
            <div class="workwith-submit">
                <button type="submit" id="submit" class="btn" onclick="fun()"> Submit </button>
            </div>
        </form>
    </section>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>


    <script>
        function fun() {
            alert('technical error...')
        }
    </script>

</body>

</html>