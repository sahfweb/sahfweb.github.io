<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>gallery</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">

    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>

    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Gallery page start here -->

    <!--gallery-->

    <section class="gallery">
        <div class="allpagtop-img">
            <img src="images1/homeimg/homeimg6.jpg" alt="">
            <h1> GALLERY</h1>
        </div>
        <nav>
            <div class="items">
                <span class="item active" data-name="all">All</span>
                <span class="item" data-name="EDUCATION">Education</span>
                <span class="item" data-name="EVENTS">Events</span>
                <span class="item" data-name="VOLUNTEER">Volunteer</span>
            </div>
        </nav>
        <div class="gallery-img">
            <?php
            include "shared/connection.php";

            $sql_cursor = mysqli_query($conn, "SELECT * FROM gallery ORDER BY imgId DESC");



            while ($row = mysqli_fetch_assoc($sql_cursor)) {
                $image = $row['image'];
                $imgtype = $row['type'];
                $alt = $row['alt'];

                echo  "<div class='img-gall' data-name='$imgtype'><span><img src='$image' alt='$alt'></span></div>";
            }
            ?>
        </div>
    </section>

    <div class="preview-box">
        <div class="details">
            <span class="title"> image name <p> img details</p></span>
            <span class="fas fa-xmark" id="icon"></span>
        </div>
        <div class="img-boxgall">
            <img src="" alt="">
        </div>
    </div>
    <div class="shadow"></div>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>



    <script src="javascript/gallery.js"></script>
</body>

</html>