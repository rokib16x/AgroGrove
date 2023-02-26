<?php

include '../config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['tempmail'])) {
    header("Location: workerdashboard.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM worker WHERE w_email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['tempmail'] = $row['w_email'];
        header("Location: workerdashboard.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=Ddevice-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Worker-Login-Form</title>

</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>

            <div class="input-group">
                <input type="email" placeholder="Email" name="email" <?php echo $email; ?> required>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Password" name="password" <?php echo $_POST['password']; ?> required>
            </div>

            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>


            <p class="login-register-text">Don't have an account? <a href="workerregister.php">Register Here</a></p>
            <p class="home-text">Go Back-><a href="../index.php">Home</a></p>

        </form>
    </div>
</body>

</html>