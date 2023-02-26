<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

//Delete Product

$sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'"; //Specific farmer sql code
$result = mysqli_query($conn, $sql); // Database
if (mysqli_num_rows($result) > 0) { //
    while ($row = mysqli_fetch_assoc($result))
        $p_id = $row['p_id']; //p_id
}

$id;
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "SELECT * FROM product WHERE product_id='$id' AND p_id = '$p_id'"; // farmer id (p_id) id= (product id)
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { //
        $row = mysqli_fetch_assoc($result);
        $sql = "DELETE FROM product WHERE product_id='$id' AND p_id = '$p_id'";
        if (mysqli_query($conn, $sql)) {
            header('location:addproduct.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>


</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <span class="logoname">AGROGROVE</span>
            </div>

        </div>

        <div class="container-body">
            <div class="sidebar">
                <ul>
                    <li>
                        <i class="fa fa-dashcube"></i>
                        <a href="farmerdashboard.php">Dashboard</a>
                    </li>

                    <li class="dashboard">
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

            <div class="main-body">
                <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="btn btn-primary" href="createproduct.php">Add Product &nbsp;<i class="fa fa-plus-square"></i></a></li>
                        </ul>
                    </div>
                </nav>


                <div class="headtittle">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        $cnt = 1;
                                        $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result))
                                                $p_id = $row['p_id'];
                                        }
                                        ?>


                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM product WHERE p_id = '$p_id'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result)) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <th><?php echo $cnt ?></th>
                                                        <td><?php echo $row['product_name'] ?></td>
                                                        <td><?php echo $row['Quantity'] ?></td>
                                                        <td><?php echo $row['Price'] ?></td>


                                                        <td class="text-center">
                                                            <a href="editproduct.php?id=<?php echo $row['product_id'] ?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i></a>

                                                            <a href="addproduct.php?delete=<?php echo $row['product_id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete this record?')"><i class="fa fa-trash-o"></i></a>
                                                        </td>

                                                    </tr>
                                            <?php
                                            $cnt++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>