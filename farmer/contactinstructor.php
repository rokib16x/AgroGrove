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
    <title>Contact Instructor</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
                        <i class="fa fa-pagelines"></i>
                        <a href="addproduct.php">My Products</a>
                    </li>
                    <li class="dashboard">
                        <i class="fa fa-envelope-o"></i>
                        <a href="contactinstructor.php">Contact Instructor</a>
                    </li>
                    <li>
                        <i class="fa fa-credit-card-alt"></i>
                        <a href="myworker.php">My Workers</a>
                    </li>
                    <li>
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
                    <?php

                    $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $address1 = $row['Address'];
                            $query = "SELECT * FROM instructor where address IN (SELECT address FROM farmer WHERE address ='$address1');";
                            $query_result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($query_result)) {

                    ?>
                                <div class="form">
                                    <div class="contact-info">
                                        <h3 class="title">Help & support</h3>
                                        <p class="text">
                                            Tell Me About Your Problem. I will probably solve your problem. Just Keep In Touch With
                                            Us.
                                        </p>

                                        <div class="info">
                                            <div class="information">
                                                <h4 class="title1">Instructor Information</h4>
                                            </div>
                                            <div class="information">
                                                <label for="Name">Name: &nbsp;</label>
                                                <p><?php echo $row['first_name'], " ", $row['last_name']; ?></p>
                                            </div>
                                            <div class="information">
                                                <label for="Email">Email: &nbsp;</label>
                                                <p><?php echo $row['ins_email']; ?></p>
                                            </div>
                                            <div class="information">
                                                <label for="Phone">Phone: &nbsp;</label>
                                                <p><?php echo $row['mobile_no']; ?></p>
                                            </div>
                                        </div>

                                        <div class="social-media">
                                            <p>Connect with us :</p>
                                            <div class="social-icons">
                                                <a href="#">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                        <?php
                            }
                        }
                    }
                        ?>



                        <?php

                        $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                <div class="contact-form">
                                    <span class="circle one"></span>
                                    <span class="circle two"></span>

                                    <form class="" action="sendproblem.php" method="post" enctype="multipart/form-data">
                                        <h3 class="title">Contact us</h3>
                                        <div class="input-container">
                                            <input type="text" name="name" class="input" value="<?php echo $row['first_name'], " ", $row['last_name']; ?>" disabled required />
                                        </div>
                                        <div class="input-container">
                                            <input type="email" name="email" class="input" value="<?php echo $row['f_email']; ?>" disabled required />
                                        </div>
                                        <div class="input-container">
                                            <input type="tel" name="phone" class="input" value="<?php echo $row['mobile_no']; ?>" disabled required />
                                        </div>
                                        <div class="input-container textarea">
                                            <textarea name="message" class="input" placeholder="Problem Description" required></textarea>
                                        </div>
                                        <input type="submit" name="submit" value="Send" class="btn" />
                                    </form>
                                </div>
                                </div>

                </div>
        <?php
                            }
                        }
        ?>

            </div>
        </div>
    </div>
</body>

</html>

