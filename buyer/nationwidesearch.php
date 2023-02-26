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
    <title>NationWide Product</title>
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

                    <li class="dashboard">
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
                    <!--This is section-->
                    <!-- Designed and developed by Habibur Rahman Mahid -->
                    <section id="sections" class="py-4 mb-4">
                        <div class="searchbox">
                            <form action="" method="post">
                                <input type="text" name="search" placeholder="Search products">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </section>







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
                                        <th>Status</th>
                                    </thead>
                                    <tbody>


                                        <?php
                                        if (isset($_POST["submit"])) {
                                        $search = $_POST["search"];
                                        $sql= "SELECT * FROM `product` where product_name LIKE '%$search%'";
                                        $que = mysqli_query($conn, $sql);

                                        while($result = mysqli_fetch_assoc($que))
                                        {
                                                $sql = "SELECT fam.first_name, fam.last_name,fam.mobile_no,fam.Address, fam.p_id, pro.product_id,pro.product_name, pro.Quantity, pro.Price 
                                                FROM farmer fam
                                                LEFT JOIN product pro
                                                ON fam.p_id = pro.p_id
                                                WHERE pro.Quantity>0";
                                                $que = mysqli_query($conn, $sql);                              
                                            while ($result = mysqli_fetch_assoc($que)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $result['first_name'], " ", $result['last_name']; ?></td>
                                                <td><?php echo $result['mobile_no']; ?></td>
                                                <td><?php echo $result['Address']; ?></td>
                                                <td><?php echo $result['product_name']; ?></td>
                                                <td><?php echo $result['Quantity']; ?></td>
                                                <td><?php echo $result['Price']; ?></td>
                                                <td>
                                                    <a href="buyersql.php?update=<?php echo $result['product_id'] ?>" class="btn btn-info"><i class="fa fa-cart-plus"></i></a>
                                                </td>
                                            <?php
                                            $cnt++;
                                        }}
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