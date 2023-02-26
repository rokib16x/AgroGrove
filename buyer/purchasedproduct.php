<?php
include '../config.php';

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchased Product</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="buyerdashboard.css">
</head>

<body>
    <div class="container">


        <div class="container-body">
            <div class="sidebar">
                <ul>
                    <li>
                        <i class="fa fa-dashcube"></i>
                        <a href="buyerdashboard.php">Dashboard</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="nationwideproduct.php">Nationwide Market</a>
                    </li>
                    <li class="dashboard">
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
                    <!--This is section-->
                    <!-- Designed and developed by Habibur Rahman Mahid -->
                    <!----Section2 for showing Post Model ---->
                    <!-- Designed and developed by Habibur Rahman Mahid -->
                    <section id="post">
                        <div class="">
                            <div class="row">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Farmer Name</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM storebuyinformation WHERE b_email ='{$_SESSION["tempmail"]}'";
                                        $que = mysqli_query($conn, $sql);
                                        $cnt = 1;
                                        while ($result = mysqli_fetch_assoc($que)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $result['f_name'];?></td>
                                                <td><?php echo $result['f_mobile']; ?></td>
                                                <td><?php echo $result['f_address']; ?></td>
                                                <td><?php echo $result['f_product']; ?></td>
                                                <td><?php echo $result['f_quantity']; ?></td>
                                                <td><?php echo $result['f_price']; ?></td>
                                            <?php
                                            $cnt++;
                                        }
                                            ?>
                                            </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
</body>

</html>



<?php

?>