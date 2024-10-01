<?php
session_start();

require_once '../dbconnection.php';

$data = mysqli_query($conn, "SELECT * FROM `about_home`");
$rowcount = mysqli_num_rows($data);

if ($rowcount > 0) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $about_home = $_POST['about_home'];
        if(empty($about_home)){
            $errors['about_home'] = "Please enter the Data in the field";
        }
        if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: create_about_home.php");
            exit();
        }
        $sql = "UPDATE about_home SET about = '".$about_home."'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['update'] = "Update";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location:create_about_home.php");
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $about_home = $_POST['about_home'];
        $errors = [];
        if(empty($about_home)){
            $errors['about_home'] = "Please enter the Data in the field";
        }
        if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: create_about_home.php");
            exit();
        }
        $sql = "INSERT INTO about_home (about) VALUES ('{$about_home}')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location:create_about_home.php");
    }
}
?>
