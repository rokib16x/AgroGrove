<?php
include '../config.php';

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.


$product_id = $_GET['update'];


$p_id;
$sql = "SELECT * FROM product WHERE product_id='$product_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $p_id = $row['p_id'];
        $product_name = $row['product_name'];
        $product_quantity = $row['Quantity'];
        $product_price = $row['Price'];
    }
}
$totalprice = $product_price * $product_quantity;
$p_id;
$sql = "SELECT * FROM farmer WHERE p_id='$p_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $farmer_mobile = $row['mobile_no'];
        $farmer_address = $row['Address'];
        $farmersold_total = $row['totalsold'];
    }
}
$totalprice += $farmersold_total;
$farmer_name = $first_name . ' ' . $last_name;
if (isset($_GET['update'])) {

    $sql = "INSERT INTO `storebuyinformation`(`f_name`, `f_mobile`, `f_address`, `f_product`, `f_quantity`, `f_price`, `b_email`) 
        VALUES ('$farmer_name','$farmer_mobile','$farmer_address','$product_name','$product_quantity','$product_price','{$_SESSION["tempmail"]}')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "DELETE FROM `product` WHERE product_id ='$product_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            $sql = "UPDATE `farmer` SET `totalsold`='$totalprice' WHERE p_id =$p_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
                header('Location:nationwideproduct.php');
            }
        }
    } else {
        $errorMsg = 'Error ' . mysqli_error($conn);
    }
}
?>