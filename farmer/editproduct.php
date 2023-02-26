<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

$sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result))
        $p_id = $row['p_id'];
}


$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE product_id='$id' AND p_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        $errorMsg = 'Could not Find Any Record';
    }
}

if (isset($_POST['Submit'])) {

    $Quantity = $_POST['Quantity'];
    $price = $_POST['Price'];
    if (!isset($errorMsg)) {
        $sql = "UPDATE product SET Price='$price', Quantity='$Quantity' 
                WHERE 
                product_id='$id' AND p_id = '$p_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $successMsg = 'New record updated successfully';
            header('Location:addproduct.php');
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>


</head>

<body>
    <div class="container">
    
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
                        <ul class="navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="btn btn-primary" href="addproduct.php"><i class="fa fa-sign-out-alt"></i></a></li>
                        </ul>
                    </div>
                </nav>


                <div class="headtittle">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Add Product</div>
                                <div class="card-body">
                                    <form class="" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $row['product_name']; ?>" disabled required>
                                        </div>

                                        <div class="form-group">
                                            <label for="Quantity">Quantity</label>
                                            <input type="text" class="form-control" name="Quantity" value="<?php echo $row['Quantity']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="Price">Price</label>
                                            <input type="text" class="form-control" name="Price" value="<?php echo $row['Price']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
</body>

</html>