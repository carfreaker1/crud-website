<?php
session_start();
require_once '../dbconnection.php';



$id = $_REQUEST['id'];
$sql = "DELETE FROM `about_home` WHERE id = $id ";
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


header("Location:../about_home/about_home_listing.php")


    ?>