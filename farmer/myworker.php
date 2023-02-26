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
    <title>My Workers</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="dashboard.css">
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

                    <li>
                        <i class="fa fa-pagelines"></i>
                        <a href="addproduct.php">My Products</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="contactinstructor.php">Contact Instructor</a>
                    </li>
                    <li class="dashboard">
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
                <div class="headtittle">



                    <!--This is section-->
                    <!-- Designed and developed by Habibur Rahman Mahid -->
                    <section id="sections" class="py-4 mb-4">
                        <div>
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="workermodal.php" class="btn btn-primary btn-block" style="border-radius:0%;"><i class="fa fa-plus"></i> Find Worker</a>
                                </div>

                            </div>
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
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Minimum Salary Per Day</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM worker WHERE f_email='{$_SESSION["tempmail"]}'";
                                        $que = mysqli_query($conn, $sql);
                                        $cnt = 1;
                                        while ($result = mysqli_fetch_assoc($que)) {
                                        ?>


                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $result['first_name'], " ", $result['last_name']; ?></td>
                                                <td><?php echo $result['mobile_no']; ?></td>
                                                <td><?php echo $result['Address']; ?></td>
                                                <td><?php echo $result['w_email']; ?></td>
                                                <td><?php echo $result['minsalary']; ?></td>
                                                <td>
                                                    <a href="deleworkersql.php?hire=<?php echo $result['w_email'] ?>" class="btn btn-info"><i class="fa fa-ban"></i></a>
                                                </td>
                                            <?php

                                            $cnt++;
                                        }
                                            ?>
                                            </td>
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