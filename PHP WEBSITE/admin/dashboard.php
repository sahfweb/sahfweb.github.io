<?php
if (!empty($_SESSION['userdata']["adminId"])) {
    require_once __DIR__ . '/dashboard.php';
} else {
    session_start();
}

$profileName = $_SESSION['userdata']["name"];
$email = $_SESSION['userdata']["username"];
$adminId = $_SESSION["adminId"];


if (!isset($_SESSION['login_status'])) {
    echo "Unauthorised Attempt!";
    die;
}

if ($_SESSION['login_status'] == false) {
    echo "Illegal Access";
    die;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('../shared/images/volunteer10.jpg');
        }
    </style>
</head>
<?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
?>

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
                <div class="card"><a href="logout.php" type="button" class="btn btn-outline-danger">Logout</a></div>
            </div>
            <div id="createEvent" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9">
                <h3 class="text-lg-left text-white m-4 d-inline-block align-middle">CREATE EVENT</h3>
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
    <div id="viewEvent" class=" border border-primary p-3 mb-2 bg-secondary text-white align-self-stretch" style="display: none; max-width:65vw;">
        <table class='table table-striped table-bordered  table-hover table-primary text-center align-middle'>
            <thead>
                <tr>
                    <th scope='col' rowspan="2">EVENT ID</th>
                    <th scope='col'>DATE</th>
                    <th scope='col'>MONTH YEAR</th>
                    <th scope='col'>HEAD</th>
                    <th scope='col'>TIME</th>
                    <th scope='col'>LOCATION</th>
                    <th scope='col' rowspan="2">DESCRIPTION</th>
                </tr>
                <tr>
                    <th scope='col'>HEADING</th>

                    <th scope='col' colspan="2">IMAGE</th>
                    <th scope='col'>TYPE</th>
                    <th scope='col'>ADDED BY</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "../shared/connection.php";

                $sql_cursor = mysqli_query($conn, "SELECT * FROM event ORDER BY eventId DESC");



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
                    $admin = $row['addedBy'];
                    $row2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE adminId = $admin"));
                    $addedBy = $row2['name'];

                    echo  "<tr>
                            <th scope=/row' rowspan='2'>$eventId</th>
                            <td>$date</td>
                            <td>$monthYear</td>
                            <td>$head</td>
                            <td>$time</td>
                            <td>$location</td>
                            <td rowspan='2'>$description</td>
                            </tr><tr>                            
                            <td>$heading</td>
                            <td colspan='2'><img src='../$image'class='img-thumbnail rounded'></td>
                            <td>$type</td>
                            <td>$addedBy</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <div id="addImg" class="border border-primary p-3 mb-2 bg-secondary text-white" style="display: none;">
        <form action="addImg.php" class="bg-info p-3" enctype="multipart/form-data" method="post">
            <h3 class="text-center text-white">Create event</h3>
            <p><?php echo "$msg" ?></p>
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
    <div id="viewImg" class=" border border-primary p-3 mb-2 bg-secondary text-white" style="display: none;">
        <table class='table table-striped'>
            <thead class='thead-dark'>
                <tr>
                    <th scope='col'>IMAGE ID</th>
                    <th scope='col'>ALT TEXT</th>
                    <th scope='col'>TYPE</th>
                    <th scope='col'>ADDDED BY</th>
                    <th scope='col'>IMAGE</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "../shared/connection.php";

                $sql_cursor = mysqli_query($conn, "SELECT * FROM gallery ORDER BY imgId DESC");



                while ($row = mysqli_fetch_assoc($sql_cursor)) {
                    $imgId = $row['imgId'];
                    $image = $row['image'];
                    $imgtype = $row['type'];
                    $alt = $row['alt'];
                    $admin = $row['addedBy'];
                    $row2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE adminId = $admin"));
                    $addedBy = $row2['name'];

                    echo  "<tr>
                            <th scope=/row'>$imgId</th>
                            <td>$imgtype</td>
                            <td>$alt</td>
                            <td>$addedBy</td>
                            <td><img src='../$image'class='img-thumbnail rounded' style = 'max-width : 30%;'></td>
                            
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <div id="addNotice" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-black" style="display: none;">
        <h3 class="text-center text-white mb-5 p-3">Create Notice/Circular</h3>
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
        <h3 class="text-center text-white mb-5 p-3">User Notice/Circular</h3>
        <table class='table table-striped table-bordered  table-hover table-primary text-center align-middle'>
            <thead>
                <tr>
                    <th scope='col' class='col-sm-2'>ID</th>
                    <th scope='col' class='col-sm-2'>DATE</th>
                    <th scope='col' class='col-sm-4'>DESCRIPTION</th>
                    <th scope='col' class='col-sm-2'>TYPE</th>
                    <th scope='col' class='col-sm-2'>ADDED BY</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include "../shared/connection.php";

                $sql_cursor = mysqli_query($conn, "SELECT * FROM notice WHERE noticeType = 'USER' ORDER BY noticeId DESC");



                while ($row = mysqli_fetch_assoc($sql_cursor)) {
                    $noticeId = $row['noticeId'];
                    $noticeDate = $row['noticeDate'];
                    $noticeDes = $row['noticeDes'];
                    $noticeFile = $row['noticeFile'];
                    $noticeType = $row['noticeType'];
                    $admin = $row['addedBy'];
                    $row2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE adminId = $admin"));
                    $addedBy = $row2['name'];

                    echo  "<tr>
                            <th class='col-sm-2'>$noticeId</th>
                            <td class='col-sm-2'>$noticeDate</td>
                            <td class='col-sm-4'><a href='../$noticeFile'>$noticeDes</a></td>
                            <td class='col-sm-2'>$noticeType</td>
                            <td class='col-sm-2'>$addedBy</td>                            
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <div id="addTeam" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-black" style="display: none;">
        <h3 class="text-center text-white mb-5 p-3">Add Team Member</h3>
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
        }
    };
</script>

</html>