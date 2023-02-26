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
    <title>Farmer Dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
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
                        <!-- <option value="">Bangla</option> -->
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
                        <a href="farmerdashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-pagelines"></i>
                        <a href="addproduct.php">My Products</a>
                    </li>
                    <li>
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


            <?php

            $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $p_id = $row['p_id'];
                    $totalsold = $row['totalsold'];
                    $problem = $row['problem'];
                    $solved = $row['solved'];
                }
            }




            $query = "SELECT SUM(Quantity) as unsold
                                  FROM product
                                  WHERE p_id = '$p_id';";
            $query_result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($query_result)) {
                $unsold = $row['unsold'];
            }








            ?>

            <div class="main-body">
                <div class="headtittle">

                </div>

                <div class="cards">
                    <div class="row row-1">
                        <div class="col">
                            <div class="balance-card">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class="cardtittle">Last Problem On The Cropland</h3>
                                <br><br>
                                <div style="margin: auto;width: 50%;background-color: #FFF;padding: 10px;">
                                    <h1><?php echo $problem; ?></h1>
                                </div>

                            </div>
                        </div>

                        <div class="col">
                            <div class="latest-activity">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class=" cardtittle">Solution Provided For The Last Problem</h3>
                                <br><br>
                                <h1 style="margin: auto;width: 50%;background-color: #FFF;padding: 10px;"><?php echo $solved; ?></h1>
                            </div>
                        </div>

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
                                    <div class="col">
                                        <div class="latest-activity">
                                            <h3 style="margin: auto; width: 80%; padding: 10px;" class=" cardtittle">About My Instructor</h3>
                                            <br>
                                            <h1 style="margin: auto;width: 50%;background-color: #FFF;padding: 10px;"><?php echo $row['first_name'], " ", $row['last_name']; ?></h1>
                                            <h1 style="margin: auto;width: 50%;background-color: #FFF;padding: 10px;"><?php echo $row['ins_email']; ?></h1>
                                        </div>
                                    </div>


                        <?php
                                }
                            }
                        }
                        ?>
                    </div>


                    <div class="row row-2">

                        <div class="col">
                            <div class="paid-invoice">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class="cardtittle">Total Number Of My Remaining Unsold Products</h3>
                                <h2 style="margin: auto;width: 5%;background-color: #FFF;padding: 10px" class="balance">

                                    <?php echo $unsold ?>

                                </h2>
                            </div>
                        </div>
                        <div class="col">
                            <div class="unpaid-invoice">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class="cardtittle">Total Amount Earned Till Now (In Taka)</h3>
                                <h2 style="margin: auto;width: 20%;background-color: #FFF;padding: 20px" class="balance"><?php echo $totalsold; ?></h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>