<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

$mail1 = $_GET['hire'];
$sql = "UPDATE `worker` SET `status`=0,`f_email`=NULL WHERE worker.w_email = '$mail1';";


        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location:myworker.php');
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }
