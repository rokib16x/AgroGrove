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
    <title>Solution</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="instructordashboard.css">
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
                        <a href="instructordashboard.php">Dashboard</a>
                    </li>

                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="farmerunderme.php">Farmers Under Me</a>
                    </li>
                    <li class="dashboard">
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
                    <?php
                    $id;
                    if (isset($_GET['tmail'])) {
                        $id = $_GET['tmail'];
                    }

                    $sql = "SELECT * FROM farmer WHERE f_email='$id'";
                    $query_result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($query_result)) {

                    ?>
                        <div class="form">
                            <div class="contact-info">
                                <h3 class="title">Solution Portal</h3>
                                <p class="text">

                                </p>

                                <div class="info">
                                    <div class="information">
                                        <h4 class="title1">Farmer Information</h4>
                                    </div>
                                    <div class="information">
                                        <label for="Name">Name: &nbsp;</label>
                                        <p><?php echo $row['first_name'], " ", $row['last_name']; ?></p>
                                    </div>
                                    <div class="information">
                                        <label for="Email">Email: &nbsp;</label>
                                        <p><?php echo $row['f_email']; ?></p>
                                    </div>
                                    <div class="information">
                                        <label for="Phone">Phone: &nbsp;</label>
                                        <p><?php echo $row['mobile_no']; ?></p>
                                    </div>
                                </div>

                            </div>


                        <?php
                    }


                        ?>



                        <?php

                        $sql = "SELECT * FROM farmer WHERE f_email='$id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                <div class="contact-form">
                                    <span class="circle one"></span>
                                    <span class="circle two"></span>

                                    <form class="" action="" method="post" enctype="multipart/form-data">
                                        <h3 class="title">Solution</h3>
                                        <br>
                                        <h4>Problem</h4>
                                        <div class="input-container textarea">
                                            <textarea name="noth" class="input" disabled required><?php echo $row['problem']; ?>
                                            </textarea>
                                        </div>
                                        <br>
                                        <h4>Solution</h4>
                                        <div class="input-container textarea">
                                            <textarea name="message" class="input" placeholder="Solution" required></textarea>
                                        </div>
                                        <input type="submit" name="submit" value="Send" class="btn" />
                                    </form>
                                </div>
                        </div>

                </div>
        <?php
                            }
                        }
        ?>

            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $message = $_POST["message"];

    $sql = "UPDATE farmer SET solved='$message', solvedstatus=0 
            WHERE f_email='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        echo "<script>window.location.href='requestsolution.php';</script>";
    } else {
        echo "<script>alert('Profile can not Updated.');</script>";
        echo  $conn->error;
    }
}

?>
