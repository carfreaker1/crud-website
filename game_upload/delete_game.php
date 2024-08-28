<?php
session_start();
require_once '../dbconnection.php';



$id = $_REQUEST['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$sql = "DELETE FROM `game_content` WHERE id = $decrypted_id ";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



    if ($conn->query($sql) === TRUE) {
        $_SESSION['delete'] = "Delete";
        header("Location:../game_upload/game_listing.php");
    }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

// print_r($_SESSION);
// die();




?>