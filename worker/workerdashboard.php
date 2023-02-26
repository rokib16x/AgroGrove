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
    <title>Worker Dasboard</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="workerdashboard.css">
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
                    <li class="dashboard">
                        <i class="fa fa-dashcube"></i>
                        <a href="workerdashboard.php">Dashboard</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="myfarmer.php">My Farmer</a>
                    </li>

                    <li>
                        <i class="fa fa-history"></i>
                        <a href="workerprofile.php">My Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="updateprofile.php">Update Profile</a>
                    </li>

                    <li>
                        <i class="fa fa-sign-out"></i>
                        <a href="../logout.php">Log-out</a>
                    </li>
                </ul>
            </div>

            <div class="main-body">
                <div class="headtittle">

                    <div class="cards">
                        <div class="row row-1">
                            <div class="col">
                                <div class="balance-card">
                                    <h3 style="margin: auto; width: 100%; padding: 10px;" class="cardtittle">About My Farmer</h3>
                                    <br>

                                    <?php

                                    $sql = "SELECT * FROM worker WHERE w_email='{$_SESSION["tempmail"]}'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $farmerinf = $row['f_email'];
                                        }
                                    }


                                    $sql = "SELECT * FROM farmer WHERE f_email='$farmerinf'";
                                    $que = mysqli_query($conn, $sql);
                                    if ($result = mysqli_fetch_assoc($que)) {
                                    ?>

                                        <div class="balance-card">

                                            <div style="margin: auto;width: 50%;">
                                                <div style="margin: auto;width: 100%;background-color: #FFF;padding: 10px;">
                                                    <h1 style="margin: auto;"><?php echo $result['first_name'], " ", $result['last_name'], "\n", $result['mobile_no'];
                                                                                ?></h1>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php
                                    } else {
                    ?>


                        <div style="margin: auto;width: 80%;background-color: #FFF;padding: 10px;">
                            <h1 style="margin: auto;width: 100%;padding: 5px;">No farmer has appointed you yet</h1>
                        </div>

                    <?php
                                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>