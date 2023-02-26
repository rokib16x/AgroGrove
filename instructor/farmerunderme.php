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
    <title>Farmer Under Me</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="instructordashboard.css">
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
                        <a href="instructordashboard.php">Dashboard</a>
                    </li>

                    <li class="dashboard">
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
                    <section id="post">
                        <div class="">
                            <div class="row">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM instructor WHERE ins_email='{$_SESSION["tempmail"]}'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $address1 = $row['Address'];
                                            }
                                        }


                                        $sql = "SELECT * FROM farmer WHERE Address='$address1'";
                                        $que = mysqli_query($conn, $sql);
                                        $cnt = 1;
                                        while ($result = mysqli_fetch_assoc($que)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $result['first_name'], " ", $result['last_name']; ?></td>
                                                <td><?php echo $result['mobile_no']; ?></td>
                                                <td><?php echo $result['Address']; ?></td>
                                                <td><?php echo $result['f_email']; ?></td>
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
</body>

</html>