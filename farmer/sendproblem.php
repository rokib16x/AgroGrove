<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

if (isset($_POST["submit"])) {
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    $sql = "UPDATE farmer SET problem='$message', solvedstatus=1 WHERE f_email='{$_SESSION["tempmail"]}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Profile Updated successfully.');</script>";
        header('Location:farmerdashboard.php');
    } else {
        echo "<script>alert('Profile can not Updated.');</script>";
        echo  $conn->error;
    }
    
}