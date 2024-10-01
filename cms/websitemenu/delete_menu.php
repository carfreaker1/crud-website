<?php
session_start();
require_once '../dbconnection.php';



$id = $_GET['id'];
$sql = "DELETE FROM `websitemenu` WHERE id = $id ";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

// print_r($sql);
// die();


if ($conn->query($sql) === TRUE) {
    $_SESSION['delete'] = "Delete";
    header(header: "Location:menu_listing.php");


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header(header: "Location:menu_listing.php");
    
}


// print_r($_SESSION);
// die();




    ?>