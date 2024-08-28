<?php
session_start();
require_once '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    // Insert query
    $sql = "UPDATE game_category SET category_name = '".$name."' WHERE id ='".$id."'";
    // print_r($sql);
    // die;
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Success";
        header("Location:../game_category/listing_game_category.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
        print_r($conn->error);

    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['game_category'];

    // Insert query
    $sql = "INSERT INTO game_category (category_name) VALUES ('$name')";
    // print_r($sql);
    // die;
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Success";
        header("Location:../game_category/listing_game_category.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
        print_r($conn->error);
    }
}

?>