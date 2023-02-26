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
    <title>Instructor Dasboard</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="instructordashboard.css">
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
                        <a href="instructordashboard.php">Dashboard</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="farmerunderme.php">Farmers Under Me</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="requestsolution.php">Requested Solution</a>
                    </li>

                    <li>
                        <i class="fa fa-history"></i>
                        <a href="insmyprofile.php">My Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="insupdateprofile.php">Update Profile</a>
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
                <div class="cards">
                    <div class="row row-1">
                        <div class="col">
                            <div class="balance-card">
                                <h3 class="cardtittle">Number Of Farmers Under My Supersvion</h3>
                                <h2 class="balance">


                                    <?php

                                    $sql = "SELECT * FROM instructor WHERE ins_email='{$_SESSION["tempmail"]}'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $address1 = $row['Address'];
                                            $query = "SELECT COUNT(*) as count FROM farmer where address IN (SELECT address FROM instructor WHERE address ='$address1');";
                                            $query_result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($query_result)) {
                                                $output = $row['count'];
                                            }
                                            echo $output;
                                        }
                                    }
                                    ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>