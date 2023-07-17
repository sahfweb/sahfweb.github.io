<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Event</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>

    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Campaign page start here -->



    <!-- PAST EVENT-->

    <section class="campaign-EVENT">
        <div class="allpagtop-img">
            <img src="images1/ourteamimg/MEETTEAM.jpg" alt="">
            <h1>CAMPAIGN</h1>
        </div>
        <div class='event-all'>
            <?php


            include "shared/connection.php";

            $sql_cursor = mysqli_query($conn, "SELECT * FROM event WHERE event.type = 'CAMPAIGN' ORDER BY eventId DESC");

            if (mysqli_num_rows($sql_cursor) == 0) {
                echo "<div class='event-all'>
                <div class='past-cont'>
                    <div class='event-contall'>
                        <h3><br><br><br>We don't have any active campaign right Now. To stay updated, please check on us again.<br><br><br><br></h3>
                    </div>
                </div>
            </div>";
            } else {


                while ($row = mysqli_fetch_assoc($sql_cursor)) {
                    $image = $row['image'];
                    $date = $row['date'];
                    $monthYear = $row['monthYear'];
                    $head = $row['head'];
                    $time = $row['time'];
                    $location = $row['location'];
                    $heading = $row['heading'];
                    $description = $row['description'];

                    echo "<div class='past-cont'>
                    <div class='past-contimg'>
                        <img src='$image' alt=''>
                        <div class='event-imgdate'>
                            <h5>$date</h5>
                        </div>
                        <div class='event-imgdate2'>
                            <h6>$monthYear</h6>
                        </div>
                        <h2> $head </h2>
                        <i class='fa-regular fa-clock'></i>
                        <p> $time </p>
                        <i class='fa-solid fa-location-pin'></i>
                        <p>$location</p>
                    </div>
                    <div class='event-contall'>
                        <h3>$heading</h3>
            
                        <p>$description</p>
                    </div>
                </div>";
                }
            }
            ?>
        </div>
    </section>
    <!-- footer included here  -->

    <?php include 'footer.php'; ?>



</body>

</html>