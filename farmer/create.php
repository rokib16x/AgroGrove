<?php
require_once('../config.php');

session_start();

if (!isset($_SESSION["tempmail"])) {
    header("Location: ../index.php");
} //If not logged in yet.

$sql = "SELECT * FROM farmer WHERE f_email='{$_SESSION["tempmail"]}'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result))
        $p_id = $row['p_id'];
}


if (isset($_POST['Submit'])) {
$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

if (!isset($errorMsg)) {

$sql = "INSERT INTO product(product_name, Price, Quantity,p_id)
        values('" . $name . "', '" . $price . "', '" . $quantity . "','" . $p_id . "')";
$result = mysqli_query($conn, $sql);
if ($result) {
$successMsg = 'New record added successfully';
header('Location: addproduct.php');
} else {
$errorMsg = 'Error ' . mysqli_error($conn);
}
}
else{
echo "<script>
    alert('Error to add product.')
</script>";
}
}