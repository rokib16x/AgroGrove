<?php

session_start();


include 'config.php';

?>

<html>

<head>
    <meta name="viewport" content="width=Ddevice-width, initial-scale=1.0">
    <title>AgroGrove</title>
    <link rel="stylesheet" href="stylefront.css">

    <link href="https://fonts.googleapis.com/css2?
    family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <img src="images/logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Region</a></li>
                    <li><a href="">About</a></li>
                </ul>
            </nav>
            <img src="images/menu.png" class="menu-icon">

        </div>

        <div class="row">
            <!-- Left side option -->
            <div class="col">
                <h1>AgroGrove</h1>
                <br>
                <p> is created so that Farmers, Workers and Buyers are benefited at the same time thorugh this one platform.</p>
                <br>
                <?php


                $query = "SELECT COUNT(*) AS count FROM instructor";
                $query_result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $output1 = $row['count'];
                }

                $query = "SELECT COUNT(*) AS count FROM farmer";
                $query_result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $output2 = $row['count'];
                }

                $query = "SELECT COUNT(*) AS count FROM worker";
                $query_result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $output3 = $row['count'];
                }
                
                $query = "SELECT COUNT(*) AS count FROM buyer";
                $query_result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($query_result)) {
                    $output4 = $row['count'];
                }

                $output = $output1+ $output2+ $output3+$output4;

                ?>
                <!-- <div style="width:100px;border:1px solid #000;"> -->
                <div style="width: 180;background-color: #FFF;border-radius: 5px;">
                    <h3 style="color: #282703; font-weight: bold; padding: 5px;"> Our total users: <?php echo $output ?></h3>

                </div>
                <button type="button">Explore</button>

            </div>

            <!-- Right side option -->
            <div class="col">
                <h2>Visiting As</h2>

                <a href="farmer/farmerlogin.php">
                    <div class="card card1">
                        <h5>Farmer</h5>
                    </div>
                </a>

                <a href="instructor/inslogin.php">
                    <div class="card card2">
                        <h5>Instructor</h5>
                    </div>
                </a>

                <a href="worker/workerlogin.php">
                    <div class="card card3">
                        <h5>Worker</h5>
                    </div>
                </a>

                <a href="buyer/buyerlogin.php">
                    <div class="card card4">
                        <h5>Buyer</h5>
                    </div>
                </a>
            </div>

        </div>



    </div>

</body>

</html>