<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Profile</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="myprofile.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">

                <span class="logoname">AGROGROVE</span>
            </div>
            <div class="navitem">
                <div class="lang">
                    <select name="language" id="">
                        <option value="">English</option>
                    </select>
                </div>

                <div class="icons">
                    <ul>
                        <li><i class="fa fa-envelope"></i></li>
                        <li><i class="fa fa-bell"></i></li>
                    </ul>
                </div>


            </div>
        </div>

        <div class="container-body">
            <div class="sidebar">
                <ul>
                    <li>
                        <i class="fa fa-dashcube"></i>
                        <a href="farmerdashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-money"></i>
                        <a href="addproduct.php">Upload New Products</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="contactinstructor.php">Contact Instructor</a>
                    </li>
                    <li>
                        <i class="fa fa-credit-card-alt"></i>
                        <a href="myworker.php">My Workers</a>
                    </li>
                    <li class="dashboard">
                        <i class="fa fa-history"></i>
                        <a href="myprofile.php">My Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="updateprofiledem.php">Update Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-sign-out"></i>
                        <a href="../logout.php">Log-out</a>
                    </li>

                </ul>
            </div>

            <div class="main-body">
                <div class="headtittle">
                </div>

                <body className='snippet-body'>
                    <div>
                        <div class="row">

                            <?php

                            $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                                    <div class="col-md-5 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="120px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">
                                                <?php echo $row['first_name'], " ", $row['last_name']; ?>
                                            </span><span class="text-black-50">
                                                <?php echo $_SESSION["tempmail"]; ?>
                                            </span><span> </span></div>
                                    </div>
                                    <div class="col-md-6 border-right">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">My Profile</h4>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $row['first_name']; ?>" disabled required></div>
                                                <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" placeholder="surname" value="<?php echo $row['last_name']; ?>" disabled required></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $row['mobile_no']; ?>" disabled required></div>
                                                <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $row['Address']; ?>" disabled required></div>

                                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $row['f_email']; ?>" disabled required></div>
                                                <div class="col-md-12"><label </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                <?php
                                }
                            }

                ?>
                    </div>
                    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                    <script type='text/javascript' src='#'></script>
                    <script type='text/javascript' src='#'></script>
                    <script type='text/javascript'>

                    </script>
                    <script type='text/javascript'>
                        var myLink = document.querySelector('a[href="#"]');
                        myLink.addEventListener('click', function(e) {
                            e.preventDefault();
                        });
                    </script>

                </body>

</html>


</div>
</div>
</div>
</body>

</html>