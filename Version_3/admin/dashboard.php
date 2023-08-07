<?php
session_start();
if (!isset($_SESSION['login_status']) || !$_SESSION['login_status']) {
    echo "Unauthorised Attempt!";
    die;
}

$msg= $_SESSION['msg'];
$profileName = $_SESSION['userdata']["name"];
$email = $_SESSION['userdata']["username"];
$adminId = $_SESSION["adminId"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include CSS and other head elements -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('../shared/images/volunteer10.jpg');
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center mx-auto border border-primary bg-dark" style="width: 80vw; min-height: 100vh;">
        <div class="d-flex flex-row m-3 text-center bg-dark-subtle p-3 border border-primary bg-light col-lg-12">
            <div class="bg-dark-subtle p-3 border border-primary card-columns col-lg-3">
                <div class="card"><img src="../shared/images/final logo.jpg" class='img-thumbnail rounded' style="max-width: 15vw;"></div>
                <div class="card mt-3">Welcome,</div>
                <div class="card mb-3"><?php echo "$profileName <br> ($adminId)"; ?></div>
                <div class="card"><a href="#createEvent" type="button" class="btn btn-outline-primary" onclick="function1()">Create Event</a></div>
                <div class="card"><a href="#viewEvent" type="button" class="btn btn-outline-primary" onclick="function2()">View Event</a></div>
                <div class="card"><a href="#addImg" type="button" class="btn btn-outline-primary" onclick="function3()">Add Image</a></div>
                <div class="card"><a href="#viewImg" type="button" class="btn btn-outline-primary" onclick="function4()">View Images</a></div>
                <div class="card"><a href="#addNotice" type="button" class="btn btn-outline-primary" onclick="function5()">Add Notice</a></div>
                <div class="card"><a href="#viewNotice" type="button" class="btn btn-outline-primary" onclick="function6()">View Notice</a></div>
                <div class="card"><a href="#addTeam" type="button" class="btn btn-outline-primary" onclick="function7()">Add Team</a></div>
                <div class="card"><a href="#changePass" type="button" class="btn btn-outline-primary" onclick="function8()">Change Password</a></div>
                <div class="card"><a href="logout.php" type="button" class="btn btn-outline-danger">Logout</a></div>
            </div>
            
            
            <div id="createEvent" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9">
                <h3 class="text-lg-left text-white m-2 d-inline-block align-middle">CREATE EVENT</h3>
                <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
                <div class="col-lg-12 mt-4 justify-content-center align-items-center">
                    <form action="createevent.php" class="bg-info p-3" enctype="multipart/form-data" method="post">
                        <div class="card bg-info mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter Date</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="date" type="name" placeholder="Enter Date" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter Month & Year</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="monthYear" type="name" placeholder="Enter Month & Year" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter Short Heading</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="head" type="name" placeholder="Enter Short Heading" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter time</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="time" type="name" placeholder="Enter time" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter Location</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="location" type="name" placeholder="Enter Location" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter heading</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control text-danger" name="heading" type="name" placeholder="Enter heading" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Type of Event</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><select class="mt-2 form-control text-danger form-select" aria-label="type" name="type" id="type">
                                                <option value="PAST" selected>PAST EVENT</option>
                                                <option value="UPCOMING">UPCOMING EVENT</option>
                                                <option value="CAMPAIGN">CAMPAIGN</option>
                                            </select></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">Enter Description</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><textarea class="mt-2 form-control text-danger" name="description" id="" cols="30" rows="5" placeholder="Enter Description" required></textarea></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-0">File</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p class="text-dark mb-0"><input class="mt-2 form-control" type="file" name="image" required></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button class="btn btn-danger mt-3">Upload</button>
                                </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br>
<style>
    /* Additional CSS styles for better UI/UX */
    #viewEvent {
        max-width: 65vw;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
    }

    table thead th {
        vertical-align: middle;
    }

    table tbody td {
        vertical-align: middle;
    }

    .event-image {
        max-width: 100%; /* Allow the image to adjust its width */
        max-height: 150px; /* Fixed height for the image */
        object-fit: contain; /* Preserve aspect ratio */
    }

    .description-cell {
        max-height: 150px; /* Max height in pixels */
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .show-more-btn,
    .show-less-btn {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
    }

    .show-less-btn {
        display: none;
    }
</style>


<div id="viewEvent" class="border border-primary p-3 mb-2 bg-secondary text-white align-self-stretch" style="display: none;">
     <h3 class="text-lg-left text-white m-2 d-inline-block align-middle">VIEW EVENT</h3>
    <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
    <div class="table-container">
        <table class="table table-striped table-bordered table-hover table-primary text-center align-middle">
            <thead>
                <tr>
                        <th scope="col">EVENT ID</th>
                        <th scope="col">DATE</th>
                        <th scope="col">MONTH YEAR</th>
                        <th scope="col">HEAD</th>
                        <th scope="col">TIME</th>
                        <th scope="col">LOCATION</th>
                        <th scope="col">HEADING</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">ADDED BY</th>
                        <th scope="col">IMAGE</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                include "../shared/connection.php";

                if (isset($_POST['delete_event'])) {
                    $delete_id = $_POST['delete_event'];
                    $delete_query = "DELETE FROM event WHERE eventId = $delete_id";
                    $delete_result = mysqli_query($conn, $delete_query);

                    if ($delete_result) {
                        echo "<script>alert('Event with ID $delete_id is deleted!');</script>";
                    } else {
                        echo "<script>alert('Error: Unable to delete event!');</script>";
                    }
                }

                $sql_query = "SELECT event.eventId, event.image, event.date, event.monthYear, event.head, event.time, event.location, 
                                    event.heading, event.description, event.type, IFNULL(admin.name, '') AS addedBy
                            FROM event
                            LEFT JOIN admin ON event.addedBy = admin.adminId
                            ORDER BY event.eventId DESC";

               $sql_cursor = mysqli_query($conn, $sql_query);

while ($row = mysqli_fetch_assoc($sql_cursor)) {
                    $eventId = $row['eventId'];
                    $image = $row['image'];
                    $date = $row['date'];
                    $monthYear = $row['monthYear'];
                    $head = $row['head'];
                    $time = $row['time'];
                    $location = $row['location'];
                    $heading = $row['heading'];
                    $description = $row['description'];
                    $type = $row['type'];
                    $addedBy = $row['addedBy'];


    echo  "<tr>
                <td>$eventId</td>
                <td>$date</td>
                <td>$monthYear</td>
                <td>$head</td>
                <td>$time</td>
                <td>$location</td>
                <td>$heading</td>
                <td class='description-cell'>
    <div class='description-content'>
        <?php echo $description; ?>
    </div>
    <a href='#' onclick='showDescriptionPopup($eventId)'>Show More</a>
</td>
                <td>$type</td>
                <td>$addedBy</td>
                <td><img src='../$image' class='event-image img-thumbnail rounded' style='max-width: 100px; max-height: 70px;'></td>
                <td>
                                    <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this event?\")'>
                                        <input type='hidden' name='delete_event' value='$eventId'>
                                        <button type='submit' class='delete-btn btn btn-danger btn-sm'>&times; Delete</button>
                                    </form>
                                </td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



    <br>
    <div id="addImg" class="border border-primary p-3 mb-2 bg-secondary text-white" style="display: none;">
        <form action="addImg.php" class="bg-info p-3" enctype="multipart/form-data" method="post">
            <h3 class="text-center text-white">Create event</h3>
            <p class="text-lg-left text-white m-4 d-inline-block align-middle"><?php echo $msg;?></p>
            
            <input class="mt-2 form-control text-danger" name="imgalt" type="name" placeholder="Enter Image Alternative" required>
            <select class="mt-2 form-control text-danger form-select" aria-label="type" name="imgtype" id="imgtype">
                <option value="EDUCATION" selected>EDUCATION</option>
                <option value="EVENTS">EVENTS</option>
                <option value="VOLUNTEER">VOLUNTEER</option>
            </select>
            <input class="mt-2 form-control" type="file" name="image" required>

            <div class="text-center">
                <button class="btn btn-danger mt-3">Upload Image</button>
            </div>
        </form>
    </div>
    <br>
    <div id="viewImg" class="border border-primary p-3 mb-2 bg-secondary text-white" style="display: none;">
         <h3 class="text-lg-left text-white m-2 d-inline-block align-middle">CREATE IMAGE</h3>
        <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
    <table class='table table-striped'>
        <thead class='thead-dark'>
            <tr>
                <th scope='col'>IMAGE ID</th>
                <th scope='col'>TYPE</th>
                <th scope='col'>ALT TEXT</th>
                <th scope='col'>ADDED BY</th>
                <th scope='col'>IMAGE</th>
                <th scope='col'>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "../shared/connection.php";

            if (isset($_POST['delete_image'])) {
                $delete_id = $_POST['delete_image'];
                $delete_query = "DELETE FROM gallery WHERE imgId = $delete_id";
                $delete_result = mysqli_query($conn, $delete_query);

                if ($delete_result) {
                    echo "<script>alert('Image with ID $delete_id is deleted!');</script>";
                } else {
                    echo "<script>alert('Error: Unable to delete image!');</script>";
                }
            }

            $sql_query = "SELECT g.imgId, g.image, g.type, g.alt, a.name AS addedBy
                          FROM gallery g
                          LEFT JOIN admin a ON g.addedBy = a.adminId
                          ORDER BY g.imgId DESC";

            $sql_cursor = mysqli_query($conn, $sql_query);

            while ($row = mysqli_fetch_assoc($sql_cursor)) {
                $imgId = $row['imgId'];
                $image = $row['image'];
                $imgtype = $row['type'];
                $alt = $row['alt'];
                $addedBy = $row['addedBy'];

                echo  "<tr>
                            <th scope='row'>$imgId</th>
                            <td>$imgtype</td>
                            <td>$alt</td>
                            <td>$addedBy</td>
                            <td><img src='../$image' class='img-thumbnail rounded' style='max-width: 30%;'></td>
                            <td>
                                <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this image?\")'>
                                    <input type='hidden' name='delete_image' value='$imgId'>
                                    <button type='submit' class='delete-btn btn btn-danger btn-sm'>&times; Delete</button>
                                </form>
                            </td>
                        </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

    <br>
    <div id="addNotice" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-black" style="display: none;">
        <h3 class="text-center text-white mb-2 p-3">Create Notice/Circular</h3>
        <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
        <div class="col-lg-12 mt-4 justify-content-center align-items-center">
            <form action="addNotice.php" class="bg-info p-3" enctype="multipart/form-data" method="post">
                <p><?php echo "$msg" ?></p>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Date</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="noticeDate" type="date" placeholder="Enter date for Notice" required>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Description</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="noticeDes" type="name" placeholder="Enter Description for Notice" required>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">File</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control" type="file" name="noticeFile">
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Type</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <select class="mt-2 form-control text-muted form-select" aria-label="type" name="noticeType" id="noticeType">
                                <option value="OPEN" selected>Open Notice</option>
                                <option value="VOLUNTEER">Volunteer Only Notice</option>
                                <option value="TEAM">Team Only Notice</option>
                            </select>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-danger mt-3">Update Now</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div id="viewNotice" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display: none;">
        <h3 class="text-center text-white mb-2 p-3">User Notice/Circular</h3>
        <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
          <table class='table table-striped table-bordered table-hover table-primary text-center align-middle'>
    <thead>
        <tr>
            <th scope='col' class='col-sm-2'>ID</th>
            <th scope='col' class='col-sm-2'>DATE</th>
            <th scope='col' class='col-sm-4'>DESCRIPTION</th>
            <th scope='col' class='col-sm-2'>TYPE</th>
            <th scope='col' class='col-sm-2'>ADDED BY</th>
            <th scope='col'>ACTION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "../shared/connection.php";

        if (isset($_POST['delete_notice'])) {
    // Get the notice ID to be deleted
    $delete_id = $_POST['delete_notice'];

    // Perform the deletion query
    $sql_delete = "DELETE FROM notice WHERE noticeId = $delete_id";
    if (mysqli_query($conn, $sql_delete)) {
        // Deletion successful
        echo '<div class="alert alert-success">Notice deleted successfully!</div>';
        // You can also perform any other actions after successful deletion if needed.
    } else {
        // Deletion failed
        echo '<div class="alert alert-danger">Error: Unable to delete notice.</div>';
        // You can add additional error handling or logging here if needed.
    }
}


        $sql_query = "SELECT notice.noticeId, notice.noticeDate, notice.noticeDes, notice.noticeFile, notice.noticeType, 
                     IFNULL(admin.name, '') AS addedBy
              FROM notice
              LEFT JOIN admin ON notice.addedBy = admin.adminId
              ORDER BY notice.noticeId DESC";

        $sql_cursor = mysqli_query($conn, $sql_query);

        while ($row = mysqli_fetch_assoc($sql_cursor)) {
            $noticeId = $row['noticeId'];
            $noticeDate = $row['noticeDate'];
            $noticeDes = $row['noticeDes'];
            $noticeFile = $row['noticeFile'];
            $noticeType = $row['noticeType'];
            $addedBy = $row['addedBy'];

            echo  "<tr>
                    <th class='col-sm-2'>$noticeId</th>
                    <td class='col-sm-2'>$noticeDate</td>
                    <td class='col-sm-4'><a href='../$noticeFile'>$noticeDes</a></td>
                    <td class='col-sm-2'>$noticeType</td>
                    <td class='col-sm-2'>$addedBy</td>
                    <td>
                        <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this notice?\");'>
                            <input type='hidden' name='delete_notice' value='$noticeId'>
                            <button type='submit' class='btn btn-danger'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }
        ?>
    </tbody>
</table>

    </div>
    <br>
    <div id="addTeam" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-black" style="display: none;">
        <h3 class="text-center text-white mb-2">Add Team Member</h3>
        <p class="text-lg-left text-white m-2 d-inline-block align-middle"><?php echo $msg;?></p>
        <div class="col-lg-12 mt-4 justify-content-center align-items-center">
            <form action="addTeam.php" class="bg-info p-3" enctype="multipart/form-data" method="post">
                <p><?php echo "$msg" ?></p>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Name</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="memName" type="name" placeholder="Enter Name of the team Member" required>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Position</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="memPos" type="name" placeholder="Enter position associated with Member" required>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Details 1</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="memDes1" type="name" placeholder="Enter Details associated with Member" required>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Details 2</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="memDes2" type="name" placeholder="Enter Details associated with Member" required>
                        </p>
                    </div>
                </div>
                <hr> 
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control text-success" name="memMail" type="email" placeholder="Enter Email associated with Member" required>
                        </p>
                    </div>
                </div>
                <hr>                               
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Photo</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <input class="mt-2 form-control" type="file" name="memImg">
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <p class="mb-0">Type</p>
                    </div>
                    <div class="col-sm-8">
                        <p class="text-muted mb-0">
                            <select class="mt-2 form-control text-muted form-select" aria-label="type" name="memType" id="memType">
                                <option value="TOP" selected>Top Leadership</option>
                                <option value="MEMBER">HONOURARY MEMBER</option>
                            </select>
                        </p>
                    </div>
                </div>
                <hr>
                <div class="text-center">
                    <button class="btn btn-danger mt-3">Add Now</button>
                </div>
            </form>
        </div>
    </div>
    <br>
    <div id="changePass" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display : none;">
                <h3 class="text-center text-white mb-5 p-3">Update Password</h3>
                <p class="text-lg-left text-white m-4 d-inline-block align-middle"><?php echo $msg;?></p>
                <p><?php echo "$msg" ?></p>
                <form action="updatePass.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post" onsubmit="return validate()">
                    <p><?php echo "$msg" ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Enter Old Password</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Enter New Password</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass1">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Confirm New Password</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input required class="form-control mt-2" type="password" placeholder="Enter Password" name="upass2">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button class="btn btn-danger mt-3">Update Now</button>
                    </div>
                </form>
            </div>
            <br>

    </div>
    </div>

</body>
<script>
    function function1() {
        if (document.getElementById('createEvent').style.display == 'none') {
            document.getElementById('createEvent').style.display = 'block';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function2() {
        if (document.getElementById('viewEvent').style.display == 'none') {
            document.getElementById('viewEvent').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function3() {
        if (document.getElementById('addImg').style.display == 'none') {
            document.getElementById('addImg').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function4() {
        if (document.getElementById('viewImg').style.display == 'none') {
            document.getElementById('viewImg').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';

        }
    };

    function function5() {
        if (document.getElementById('addNotice').style.display == 'none') {
            document.getElementById('addNotice').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function6() {
        if (document.getElementById('viewNotice').style.display == 'none') {
            document.getElementById('viewNotice').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };
    function function7() {
        if (document.getElementById('addTeam').style.display == 'none') {
            document.getElementById('addTeam').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };
    function function8() {
        if (document.getElementById('changePass').style.display == 'none') {
            document.getElementById('changePass').style.display = 'block';
            document.getElementById('createEvent').style.display = 'none';
            document.getElementById('viewEvent').style.display = 'none';
            document.getElementById('addImg').style.display = 'none';
            document.getElementById('viewImg').style.display = 'none';
            document.getElementById('addNotice').style.display = 'none';
            document.getElementById('viewNotice').style.display = 'none';
            document.getElementById('addTeam').style.display = 'none';
        }
    };
</script>

</html>