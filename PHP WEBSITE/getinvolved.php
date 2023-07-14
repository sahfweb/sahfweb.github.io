 <?php include 'redirect.php' ?>; 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Involved</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/get-involved.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>

    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Get involved page start here -->


    <!-- GET INVOLVED SECTION START HERE -->


    <section class="get-involved">
        <div class="allpagtop-img">
            <img src="images1/homeimg/homeimg3.jpg" alt="">
            <h1> Get Involved</h1>
        </div>
        <div class="form-title">
            <h2> SAHE VOLUNTEER FORM ( ROUND 1)</h2>
            <br>
            <P>Before joining us you will need to fill out this form so that we can
                get to know our volunteers and assign them specific tasks in relation to their expertise. This is the only way to join SAHF.
            </P>
            <p>This way you can join us as a volunteer and by working with us you can be a part of our team</p>

        </div>
        <br>
        <form class="involved-form">
            <div class="form-group">
                <label for="name"> Name: </label>
                <input type="text" name="name" id="name" class="form-data" placeholder="Enter Your Full name" required>
            </div>
            <div class="form-group">
                <label for="email"> Email: </label>
                <input type="email" name="email" id="email" class="form-data" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="phone"> Phone No.</label>
                <input type="number" name="phone" id="phone" class="form-data" placeholder="Enter Your Phone No." required>
            </div>
            <div class="form-group">
                <label for="address"> Permanent Address </label>
                <input type="text" name="address" id="address" class="form-data" placeholder=" Your Address" required>
            </div>
            <div class="form-group">
                <label for="education">Educational Background
                    <p>Tell Us About Your Education</p>
                </label>
                <input type="text" name="education" id="education" class="form-data" placeholder=" Your Answer" required>
            </div>
            <div class="form-group">
                <label for="palce"> Place of Volunteer
                    <p> Place(city, village, distric) Wher You Can Do Physical Work......</p>
                </label>
                <input type="text" name="place" id="palce" class="form-data" placeholder=" Your Answer" required>
            </div>
            <div class="form-group">
                <p>How did you hear about us</p>
                <label>
                    <input type="radio" name="source" value="facebook" class="inputradio" checked>facebook
                </label>
                <label>
                    <input type="radio" name="source" value="whatsapp" class="inputradio" checked>WhatsApp
                </label>
                <label>
                    <input type="radio" name="source" value="instagram" class="inputradio" checked>Instagram
                </label>
                <label>
                    <input type="radio" name="source" value="sahf members or Volunteer" class="inputradio" checked>Sahf members or Volunteer
                </label>
                <label>
                    <input type="radio" name="source" value="other" class="inputradio" checked>Other
                </label>
            </div>
            <div class="form-group">
                <p>Has anyone from the SAHF team suggested you to join us. If yes, please give his/ her name.
                    Optional
                </p>
                <p> Optional *</p>
                <textarea name="feedback" id=" feedback" class="textarea" cols="30" rows="3" placeholder="Your Answer...">
                </textarea>
            </div>
            <div class="form-group">
                <p>Any specific expertise you would like to mention
                    *
                    You can refer to the knowledge you have or ways to help SAHF.
                </p>
                <textarea name="feedback" id=" feedback" class="textarea" cols="30" rows="3" placeholder=" Your Answer...">
                </textarea>
            </div>
            <div class="form-group">

                <Label>
                    <input type="checkbox" name="agree" class="checkboox" required>
                    I agree that SAHF may use my phone number and e-mail to contact me.
                </Label>
            </div>
            <button type="Submit" id="submit" class="btn" onclick="fun()"> Submit </button>
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