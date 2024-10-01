<?php
session_start();
require_once '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $name = $_POST['game_category'];
    $id = $_POST['id'];
    $decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
    if (empty($name)) {
        $errors['game_category'] = "The Middle Menu name is required";
    }
    if ($errors) {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: listing_game_category.php");
        exit();
    }

    // Insert query
    $sql = "UPDATE game_category SET category_name = '" . $name . "' WHERE id ='" . $decrypted_id . "'";


    if ($conn->query($sql) === TRUE) {
        $_SESSION['update'] = "Update";
        header("Location:listing_game_category.php");
    } else {
        $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
        print_r($conn->error);
        header("Location:edit_game_category.php?id=".$id);
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['game_category'];

    if (empty($name)) {
        $errors['game_category'] = "The Middle Menu name is required";
    }
    if ($errors) {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: create_new_category.php");
        exit();
    }

    // Insert query
    $sql = "INSERT INTO game_category (category_name) VALUES ('$name')";
    // print_r($sql);
    // die;
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Success";
        header("Location:create_new_category.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location:create_new_category.php");

    }
}
