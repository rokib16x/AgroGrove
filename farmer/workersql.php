<?php

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

include '../config.php';

$mail = $_GET['hire'];
$sql = "UPDATE `worker` SET `status`=1,`f_email`='{$_SESSION["tempmail"]}' 
        WHERE worker.w_email ='$mail'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header('Location:workermodal.php');
        } else {
            $errorMsg = 'Error ' . mysqli_error($conn);
        }


?>