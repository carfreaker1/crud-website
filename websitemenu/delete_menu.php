<?php
session_start();
require_once '../dbconnection.php';



$id = $_REQUEST['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$sql = "DELETE FROM `websitemenu` WHERE id = $decrypted_id ";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// print_r($sql);
// die();


if ($conn->query($sql) === TRUE) {
    $_SESSION['delete'] = "Delete";


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// print_r($_SESSION);
// die();


header("Location:./menu_listing.php")


    ?>