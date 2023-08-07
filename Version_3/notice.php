<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=auto, initial-scale=1.0">
    <title>Notice & Circular</title>
    <link rel="icon" href="images1/logo.png" type="image/icon type">    
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
        .div-grid {
            display: grid;
            grid-template-columns: 20% 80%;
            justify-content: center;
            width: 90%;
            border: 2px solid black ;
            padding: 20px;
            margin: 10px;

        }
        .div-grid div{
            width: auto;
            /* border: .1px solid black ; */
             margin: 2px;
            padding: 5px; 
            justify-content: center;
            align-items: center;
            align-content: center;
        }
        .div-grid p {
            align-content: center;
            align-self: center;
            justify-content: center;           
            text-align: center;
            font-size: medium;
            
            
        }
        .date {
            font-weight: bold;
        }
        .allpagtop-img {
            font-size: large;
            color: black;
            /* max-height: 20px; */
        }
    </style>
</head>

<body> <!-- Header include here -->
    <?php include 'header.php'; ?>

    <!-- PAST EVENTS page start here -->


    <!-- NOTICE AND CIRCULAR STARTS HERE -->
    <section class="PAST-EVENT">
        <div class="allpagtop-img">
            <img src="images1/ourteamimg/MEETTEAM.jpg" alt="">
            <h1>NOTICE AND CIRCULARS</h1>
        </div>
        <div class='event-all'>
            <?php


            include "shared/connection.php";

            $sql_cursor = mysqli_query($conn, "SELECT * FROM notice WHERE notice.noticeType = 'OPEN' ORDER BY noticeId DESC");

            if (mysqli_num_rows($sql_cursor) == 0) {
                echo "
                    <div class='event-contall'>
                        <h3><br><br><br>We don't have any notice or Circular available right now. To stay updated, please check on us again.<br><br><br><br></h3>
                    </div>
                </div>
            </div>";
            } else {
                echo  "<div class='past-cont'>
                    <div class='div-grid'>
                    <div class='date'><p>DATE <p></div>
                        <div CLASS ='date'><p> DESCRIPTION OF GIVEN NOTICE / CIRCULAR</p></div>
                        <div><hr></div>
                        <div><hr></div>";

                while ($row = mysqli_fetch_assoc($sql_cursor)) {

                    $noticeDate = $row['noticeDate'];
                    $noticeDes = $row['noticeDes'];
                    $noticeFile = $row['noticeFile'];

                    echo  "
                        <div class='date'><p>$noticeDate <p></div>
                        <div><p><a href='$noticeFile'>$noticeDes</a><p></div>
                        <div><hr></div>
                        <div><hr></div>
                        
                        
                    ";
                }
            }
            ?>

        </div>
        </div>

        </div>

        </div>
    </section>

    <!-- footer included here  -->

    <?php include 'footer.php'; ?>

</html>