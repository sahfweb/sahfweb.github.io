<?php
include "../shared/connection.php";
if (!empty($_SESSION['userdata']["volunteerId"])) {
    require_once __DIR__ . '/dashboard.php';
} else {
    session_start();
}



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

$profileName = $_SESSION['userdata']["name"];
$email = $_SESSION['userdata']["username"];
$volunteerId = $_SESSION["volunteerId"];
$profile = mysqli_fetch_assoc(mysqli_query($conn, "select * from volunteerdata where volunteerId='$volunteerId'"));
?>

<body>
    <div class="d-flex justify-content-center align-items-center mx-auto border border-primary bg-dark" style="width: 80vw; min-height: 100vh;">
        <div class="d-flex flex-row m-3 text-center bg-dark-subtle p-3 border border-primary bg-light col-lg-12">
            <div class="bg-dark-subtle p-3 border border-primary card-columns col-lg-3">
                <div class="card"><img src="../shared/images/final logo.jpg" class='img-thumbnail rounded' style="max-width: 15vw;"></div>
                <div class="card mt-3">Welcome</div>
                <div class="card mb-3"><?php echo "$profileName($volunteerId)"; ?></div>
                <div class="card"><a href="#profile" type="button" class="btn btn-outline-primary" onclick="function1()">Profile</a></div>
                <div class="card"><a href="#images" type="button" class="btn btn-outline-primary" onclick="function3()">Images</a></div>
                <div class="card"><a href="#edu" type="button" class="btn btn-outline-primary" onclick="function5()">Educational Details</a></div>
                <div class="card"><a href="#address" type="button" class="btn btn-outline-primary" onclick="function7()">Address</a></div>
                <div class="card"><a href="#notice" type="button" class="btn btn-outline-primary" onclick="function9()">Notice/Circular</a></div>
                <div class="card"><a href="#joinTeam" type="button" class="btn btn-outline-primary" onclick="function10()">Join Our Team</a></div>
                <div class="card"><a href="#changePass" type="button" class="btn btn-outline-primary" onclick="function11()">Change Paasword</a></div>
                <div class="card"><a href="logout.php" type="button" class="btn btn-outline-danger">Logout</a></div>
            </div>
            <br>
            <div id="profile" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9">           
                <h3 class="text-lg-left text-white m-4 d-inline-block align-middle">Volunteer Profile</h3>
                <p><?php echo "$msg" ?></p>
                <div class="card text-lg-right d-inline-block m-4 align-middle"><img src="../<?php echo $profile['photo']; ?>" alt="Please upload a Profile Picture" class='img-thumbnail rounded mx-auto d-block' style="max-width: 15vw;"></div>
                <div class="col-lg-12 mt-4 justify-content-center align-items-center">
                    <div class="card bg-info mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profileName ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $email ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Sex</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['sex'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Date of Birth</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['dob'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Mobile Number</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['mobileNo'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">WhatsApp Number</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['wtspNo'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Choice of Language 1</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['language1'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Choice of Language 2</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><?php echo $profile['language2'] ?></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="card"><a href="#updateProfile" type="button" class="btn btn-outline-success" onclick="function2()">Update Profile</a></div>
            </div>
            <div id="updateProfile" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">Update Volunteer Profile</h3>
                <p><?php echo "$msg" ?></p>
                <form action="updateProfile.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post">

                    <p><?php echo "$msg" ?></p>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-dark mb-0"><?php echo $profileName ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-dark mb-0"><?php echo $email ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Sex</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <select class="mt-2 form-control text-danger form-select" aria-label="SEX" name="sex" id="sex" value="<?php echo $profile['sex'] ?>" required>
                                    <option value="MALE" selected>MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                    <option value="NON-BINARY">NON-BINARY</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Date of Birth</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control text-danger" name="dob" type="date" placeholder="Enter Date" value="<?php echo $profile['dob'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Mobile Number</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control text-danger" name="mobileNo" type="phone" placeholder="Enter Mobile Number" value="<?php echo $profile['mobileNo'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">WhatsApp Number</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control text-danger" name="wtspNo" type="phone" placeholder="Enter WhatsApp Number" value="<?php echo $profile['wtspNo'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Choice of Language 1</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control text-danger" name="language1" type="name" placeholder="Enter Your First Language" value="<?php echo $profile['language1'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Choice of Language 2</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control text-danger" name="language2" type="name" placeholder="Enter Your Second Language"  value="<?php echo $profile['language2'] ?>" required>
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
            <div id="images" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">UPLOADED IMAGES</h3>
                <p><?php echo "$msg" ?></p>
                <div class="col-lg-12 mt-4 justify-content-center align-items-center">
                    <div class="card bg-info mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Photo</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><img src="../<?php echo $profile['photo']; ?>" alt="Please upload your Photo" class='img-thumbnail rounded rounded mx-auto' style="max-width: 15vw;"></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="mb-0">Signature</p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="text-dark mb-0"><img src="../<?php echo $profile['signature']; ?>" alt="Please upload your Signature" class='img-thumbnail rounded rounded mx-auto' style="max-width: 15vw;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card"><a href="#updateImages" type="button" class="btn btn-outline-success" onclick="function4()">Update Images</a></div>
            </div>
            <br>
            <div id="updateImages" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">Update Volunteer Profile Images</h3>
                <p><?php echo "$msg" ?></p>
                <form action="updateImage.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post">
                    <p><?php echo "$msg" ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Profile Photo</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control" type="file" name="photo">
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <p class="mb-0">Photo Signature</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="text-muted mb-0">
                                <input class="mt-2 form-control" type="file" name="signature">
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger mt-3">Update Now</button>
                    </div>
                </form>
            </div>
            <br>
            <div id="edu" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">Educational Details</h3>
                <p><?php echo "$msg" ?></p>
                <div class="col-lg-12 mt-4 justify-content-center align-items-center">
                    <div class="card bg-info mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Highest Degree Held</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['pastDegree'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Highest Degree Passing Year</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['yearPastDegree'] ?></p>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Current Educatinal Degree</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['currentDegree'] ?></p>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Current Educatinal Degree Year</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['yearCurrentDegree'] ?></p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card"><a href="#updateEdu" type="button" class="btn btn-outline-success" onclick="function6()">Update Educational Details</a></div>
                </div>
            </div>
            <br>
            <div id="updateEdu" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display : none;">
                <h3 class="text-center text-white mb-5 p-3">Update Educational Details</h3>
                <p><?php echo "$msg" ?></p>
                <form action="updateEdu.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post">
                    <p><?php echo "$msg" ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Highest Degree Held</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="pastDegree" type="name" placeholder="<?php echo $profile['pastDegree'] ?>" value="<?php echo $profile['pastDegree'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Highest Degree Passing Year</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="yearPastDegree" type="name" placeholder="<?php echo $profile['yearPastDegree'] ?>" value="<?php echo $profile['yearPastDegree'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Current Educatinal Degree</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="currentDegree" type="name" placeholder="<?php echo $profile['currentDegree'] ?>" value="<?php echo $profile['currentDegree'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Current Educatinal Degree Year</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="yearCurrentDegree" type="name" placeholder="<?php echo $profile['yearCurrentDegree'] ?>" value="<?php echo $profile['yearCurrentDegree'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger mt-3">Update Now</button>
                    </div>
                </form>
            </div>
            <br>
            <div id="address" class="border bg-secondary border-primary p-3 mb-2 justify-content-center align-items-center col-lg-9" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">Volunteer Address Details</h3>
                <p><?php echo "$msg" ?></p>
                <div class="col-lg-12 mt-4 justify-content-center align-items-center">
                    <div class="card bg-info mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Temporary Address</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['tempAddress'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <p class="mb-0">Parmanent Address</p>
                                </div>
                                <div class="col-sm-7">
                                    <p class="text-dark mb-0"><?php echo $profile['parmaAddress'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card"><a href="#updateAddress" type="button" class="btn btn-outline-success" onclick="function8()">Update Educational Details</a></div>
                </div>
            </div>
            <br>
            <div id="updateAddress" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display : none;">
                <h3 class="text-center text-white mb-5 p-3">Update Address Details</h3>
                <p><?php echo "$msg" ?></p>
                <form action="updateAddress.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post">
                    <p><?php echo "$msg" ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Temporary Address</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="tempAddress" type="name" placeholder="<?php echo $profile['tempAddress'] ?>" value="<?php echo $profile['tempAddress'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Parmanent Address</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="parmaAddress" type="name" placeholder="<?php echo $profile['parmaAddress'] ?>" value="<?php echo $profile['parmaAddress'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger mt-3">Update Now</button>
                    </div>
                </form>
            </div>
            <br>
            <div id="notice" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display: none;">
                <h3 class="text-center text-white mb-5 p-3">Volunteer Notice/Circular</h3>
                <p><?php echo "$msg" ?></p>
                <table class='table table-striped table-bordered  table-hover table-primary text-center align-middle'>
                    <thead>
                        <tr>
                            <th scope='col' class='col-sm-4'>DATE</th>
                            <th scope='col' class='col-sm-8'>DESCRIPTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include "../shared/connection.php";

                        $sql_cursor = mysqli_query($conn, "SELECT * FROM notice WHERE noticeType = 'VOLUNTEER' ORDER BY noticeId DESC");



                        while ($row = mysqli_fetch_assoc($sql_cursor)) {
                            $noticeDate = $row['noticeDate'];
                            $noticeDes = $row['noticeDes'];
                            $noticeFile = $row['noticeFile'];

                            echo  "<tr>
                            <th class='col-sm-4'>$eventId</th>
                            <td class='col-sm-8'><a href='../$noticeFile'>$description</a></td>                            
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="changePass" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display : none;">
                <h3 class="text-center text-white mb-5 p-3">Update Password</h3>
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
            <div id="joinTeam" class="border border-primary  p-3 mb-2  col-lg-9 bg-secondary text-white" style="display: none;">
            <form action="joinTeam.php" class="bg-info p-3 m-4" enctype="multipart/form-data" method="post">
                    <p>This form will be available soon</p>
                    <!-- <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0"></p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="tempAddress" type="name" placeholder="<?php echo $profile['tempAddress'] ?>" value="<?php echo $profile['tempAddress'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="mb-0">Parmanent Address</p>
                        </div>
                        <div class="col-sm-7">
                            <p class="text-dark mb-0"><input class="mt-2 form-control text-success" name="parmaAddress" type="name" placeholder="<?php echo $profile['parmaAddress'] ?>" value="<?php echo $profile['parmaAddress'] ?>" required>
                            </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger mt-3">Update Now</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    function function1() {
        if (document.getElementById('profile').style.display == 'none') {
            document.getElementById('profile').style.display = 'block';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('images').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function2() {
        if (document.getElementById('updateProfile').style.display == 'none') {
            document.getElementById('updateProfile').style.display = 'block';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('images').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function3() {
        if (document.getElementById('images').style.display == 'none') {
            document.getElementById('images').style.display = 'block';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function4() {
        if (document.getElementById('updateImages').style.display == 'none') {
            document.getElementById('updateImages').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function5() {
        if (document.getElementById('edu').style.display == 'none') {
            document.getElementById('edu').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function6() {
        if (document.getElementById('updateEdu').style.display == 'none') {
            document.getElementById('updateEdu').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function7() {
        if (document.getElementById('address').style.display == 'none') {
            document.getElementById('address').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function8() {
        if (document.getElementById('updateAddress').style.display == 'none') {
            document.getElementById('updateAddress').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };

    function function9() {
        if (document.getElementById('notice').style.display == 'none') {
            document.getElementById('notice').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };
    function function10() {
        if (document.getElementById('joinTeam').style.display == 'none') {
            document.getElementById('joinTeam').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('changePass').style.display = 'none';
        }
    };
    function function11() {
        if (document.getElementById('changePass').style.display == 'none') {
            document.getElementById('changePass').style.display = 'block';
            document.getElementById('images').style.display = 'none';
            document.getElementById('profile').style.display = 'none';
            document.getElementById('updateProfile').style.display = 'none';
            document.getElementById('updateImages').style.display = 'none';
            document.getElementById('edu').style.display = 'none';
            document.getElementById('updateEdu').style.display = 'none';
            document.getElementById('address').style.display = 'none';
            document.getElementById('updateAddress').style.display = 'none';
            document.getElementById('notice').style.display = 'none';
            document.getElementById('joinTeam').style.display = 'none';
        }
    };
    function validate() {
            pass1 = document.getElementsByName("upass1")[0].value;
            pass2 = document.getElementsByName("upass2")[0].value;

            if (pass1 == pass2) {
                return true;
            } else {
                alert("Password Mismatch");
                return false;
            }
        }
</script>
</html>
<?php $msg="";?>