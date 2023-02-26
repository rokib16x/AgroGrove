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
    <title>Buyer Dasboard</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="buyerdashboard.css">
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
                        <option value="">Bangla</option>
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
                        <a href="buyerdashboard.php">Dashboard</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="nationwideproduct.php">Nationwide Market</a>
                    </li>

                    <li>
                        <i class="fa fa-dashcube"></i>
                        <a href="purchasedproduct.php">Purchased Product</a>
                    </li>


                    <li>
                        <i class="fa fa-history"></i>
                        <a href="buyerprofile.php">My Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="buyerupdateprofile.php">Update Profile</a>
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
                    $count = 0;
                    $price = 0;
                    $totalprice = 0;
                    $query = "SELECT * FROM `storebuyinformation` where b_email ='{$_SESSION["tempmail"]}'";
                    $query_result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($query_result)) {
                        $count += $row['f_quantity'];
                        $price += $row['f_price'];
                        $totalprice += $price * $count;
                    }
                    ?>
                </div>
                <div class="cards">
                    <div class="row row-1">
                        <div class="col">
                            <div class="balance-card">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class="cardtittle">Total Purchased Products</h3>
                                <br><br>
                                <div style="margin: auto;width: 20%;background-color: #FFF;padding: 10px;">
                                    <h1 style="margin: auto;"><?php echo $count; ?></h1>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="latest-activity">
                                <h3 style="margin: auto; width: 80%; padding: 10px;" class=" cardtittle">Total Expenditure Till Now&nbsp;(In Taka)</h3>
                                <br><br>
                                <h1 style="margin: auto;width: 30%;background-color: #FFF;padding: 10px;"><?php echo $totalprice; ?></h1>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</body>

</html>