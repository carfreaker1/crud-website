<?php
require_once '../dbconnection.php';

$id = $_REQUEST['id'];
$sql = "DELETE FROM `about_home` WHERE id = $id ";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['delete'] = "Delete";
    header("Location:about_home_listing.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header("Location:about_home_listing.php");
}


// print_r($_SESSION);
// die();




    ?>