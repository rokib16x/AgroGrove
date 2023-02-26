<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

if (isset($_POST["submit"])) {
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    // $mobileno = mysqli_real_escape_string($conn, $_POST["mobile_no"]);
    $address = mysqli_real_escape_string($conn, $_POST["address1"]);


    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    if ($password == $cpassword) {

        $sql = "UPDATE farmer SET first_name='$first_name', last_name='$last_name', address='$address', password='$password' WHERE f_email='{$_SESSION["tempmail"]}'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Profile Updated successfully.');</script>";
        } else {
            echo "<script>alert('Profile can not Updated.');</script>";
            echo  $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="updateprofiledem.css">
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
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="contactinstructor.php">Contact Instructor</a>
                    </li>
                    <li>
                        <i class="fa fa-credit-card-alt"></i>
                        <a href="#">My Workers</a>
                    </li>
                    <li>
                        <i class="fa fa-history"></i>
                        <a href="myprofile.php">My Profile</a>
                    </li>
                    <li class="dashboard">
                        <i class="fa fa-info-circle"></i>
                        <a href="">Update Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-sign-out"></i>
                        <a href="../logout.php">Log-out</a>
                    </li>

                </ul>
            </div>

            <div class="main-body">
                <div class="headtittle">
                    <div class="formlevel">
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php
                            $sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <div class="inputBox">
                                        <label for="">First Name:</label>
                                        <input type="text" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $row['first_name']; ?>" required>
                                    </div>
                                    <br>
                                    <div class="inputBox">
                                        <label for="">Last Name:</label>
                                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $row['last_name']; ?>" required>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <label for="">Address: </label>
                                        <input type="text" placeholder="Address" name="address1" value="<?php echo $row['Address'] ?>" required>
                                    </div>
                                    <br>

                                    <div class="inputBox">
                                        <label for="">Email: </label>
                                        <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $row['f_email']; ?>" disabled required>
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <label for="">Mobile No:</label>
                                        <input type="text" placeholder="Mobile No" name="mobileno" value="<?php echo $row['mobile_no']; ?>" disabled required>
                                    </div>
                                    <br>

                                    <div class="inputBox">
                                        <label for="">Password</label>
                                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                    <br>
                                    <div class="inputBox">
                                        <label for="">Repeat Password</label>
                                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
                                    </div>
                                    <br>

                            <?php
                                }
                            }

                            ?>
                            <div>
                                <button type="submit" name="submit" class="btn">Update Profile</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
</body>

</html>