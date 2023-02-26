<?php

include '../config.php';
error_reporting(0);

session_start();

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $address1 = $_POST['address1'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM farmer WHERE f_email ='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO farmer (first_name, last_name, f_email, mobile_no, Address,password)
					VALUES ('$firstname', '$lastname','$email','$mobileno','$address1', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Wow! User Registration Completed.')</script>";
                $firstname = "";
                $lastname = "";
                $email = "";
                $mobileno = "";
                $address1 = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Something Wrong Went.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Already Exists.')</script>";
        }
    } else {
        echo "<script>alert('Password Not Matched.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../style.css">

    <title>Register Form</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>

            <div class="input-group">
                <input type="text" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>" required>
            </div>

            <div class="input-group">
                <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>" required>
            </div>

            <div class="input-group">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="input-group">
                <input type="text" placeholder="Mobile No" name="mobileno" value="<?php echo $mobileno; ?>" required>
            </div>

            <div class="input-group">
                <input type="text" placeholder="Address" name="address1" value="<?php echo $address1; ?>" required>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="input-group">
                <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
            </div>

            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>

            <p class="login-register-text">Have an account? <a href="farmerlogin.php">Login Here</a></p>
        </form>
    </div>
</body>

</html>