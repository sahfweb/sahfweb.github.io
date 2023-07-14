<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Team</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/meetteam.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>


    <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- Home page start here -->

    <!--team-->


    <section class="meet-team">
        <div class="allpagtop-img">
            <img src="images1/ourteamimg/MEETTEAM.jpg" alt="">
            <h1> MEET OUR TEAM</h1>
        </div>
        <DIV class="team-sect vision">
            <h1>SAHF LEADERSHIP</h1>
            <div class="our-team">
                <?php


                include "shared/connection.php";

                $sql_cursor = mysqli_query($conn, "SELECT * FROM team WHERE team.type = 'TOP' ORDER BY id");

                if (mysqli_num_rows($sql_cursor) == 0) {
                    echo "<div class='event-all'>
    <div class='past-cont'>
        <div class='event-contall'>
            <h3><br><br><br>SAHF LEADERSHIP list is not updated yet. To stay updated, please check on us again.<br><br><br><br></h3>
        </div>
    </div>
</div>";
                } else {


                    while ($row = mysqli_fetch_assoc($sql_cursor)) {
                        $name = $row['name'];
                        $position = $row['position'];
                        $line1 = $row['line1'];
                        $line2 = $row['line2'];
                        $email = $row['email'];
                        $img = $row['img'];
                       

                        echo " <div class='team-cont-head'>
                        <div class='card'>
                            <div class='circle'>
                                <div class='imgbox'>
                                    <img src='$img'>
                                </div>
                            </div>
                            <div class='content-team'>
                                <h3>$name</h3>
                                <h4>$position</h4>
                                <h5>$line1</h5>
                                <h5>$line2</h5>    
                                <h6>$email</h6>
                            </div>
                        </div>
                    </div>";
                    }
                }
                ?>

            </div>
        </DIV>
        <div class="team-sect vision">
            <h1>HONOURARY MEMBERS</h1>
            <div class="our-team">
            <?php


include "shared/connection.php";

$sql_cursor = mysqli_query($conn, "SELECT * FROM team WHERE team.type = 'MEMBER' ORDER BY id");

if (mysqli_num_rows($sql_cursor) == 0) {
    echo "<div class='event-all'>
<div class='past-cont'>
<div class='event-contall'>
<h3><br><br><br>Honourary Member list is not updated yet. To stay updated, please check on us again.<br><br><br><br></h3>
</div>
</div>
</div>";
} else {


    while ($row = mysqli_fetch_assoc($sql_cursor)) {
        $name = $row['name'];
        $position = $row['position'];
        $line1 = $row['line1'];
        $line2 = $row['line2'];
        $email = $row['email'];
        $img = $row['img'];
       

        echo " <div class='team-cont-head'>
        <div class='card'>
            <div class='circle'>
                <div class='imgbox'>
                    <img src='$img'>
                </div>
            </div>
            <div class='content-team'>
                <h3>$name</h3>
                <h4>$position</h4>
                <h5>$line1</h5>
                <h5>$line2</h5>    
                <h6>$email</h6>
            </div>
        </div>
    </div>";
    }
}
?>   
            </div>
        </div>

    </section>
    <!-- footer included here -->

    <?php include 'footer.php'; ?>


</body>

</html>