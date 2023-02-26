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
    <title>My Farmer</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="workerdashboard.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="container-body">
            <div class="sidebar">
                <ul>
                    <li>
                        <i class="fa fa-dashcube"></i>
                        <a href="workerdashboard.php">Dashboard</a>
                    </li>

                    <li class="dashboard">
                        <i class="fa fa-envelope-o"></i>
                        <a href="myfarmer.php">My Farmer</a>
                    </li>

                    <li>
                        <i class="fa fa-history"></i>
                        <a href="workerprofile.php">My Profile</a>
                    </li>
                    <li>
                        <i class="fa fa-info-circle"></i>
                        <a href="updateprofile.php">Update Profile</a>
                    </li>

                    <li>
                        <i class="fa fa-sign-out"></i>
                        <a href="../logout.php">Log-out</a>
                    </li>
                </ul>
            </div>

            <div class="main-body">
                <div class="headtittle">
                    <section id="post">
                        <div class="">
                            <div class="row">
                                <table class="table table-bordered table-hover table-striped">
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM worker WHERE w_email='{$_SESSION["tempmail"]}'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $farmerinf = $row['f_email'];
                                            }
                                        }


                                        $sql = "SELECT * FROM farmer WHERE f_email='$farmerinf'";
                                        $que = mysqli_query($conn, $sql);
                                        if ($result = mysqli_fetch_assoc($que)) {
                                        ?>

                                            <tr>
                                                <thead>
                                                    <th>Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Address</th>
                                                    <th>Email</th>
                                                </thead>
                                                <td><?php echo $result['first_name'], " ", $result['last_name']; ?></td>
                                                <td><?php echo $result['mobile_no']; ?></td>
                                                <td><?php echo $result['Address']; ?></td>
                                                <td><?php echo $result['f_email']; ?></td>
                                            <?php
                                        } else {
                                            ?>
                                            
                                                <h3 style="margin: auto; width: 80%; padding: 10px;" class="cardtittle"></h3>
                                                <br><br>
                                                <div style="margin: auto;width: 50%;padding: 10px;">
                                                <h3>No farmer have appointed you yet.</h3>
                                                </div>



                                            <?php
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
</body>

</html>