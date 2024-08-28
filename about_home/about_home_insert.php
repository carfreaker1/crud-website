<?php
session_start();

require_once '../dbconnection.php';

$data = mysqli_query($conn, "SELECT * FROM `about_home`");
$rowcount = mysqli_num_rows($data);

if ($rowcount > 0) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $about_home = $_POST['about']; // Move the variable definition inside the block
        $sql = "UPDATE about_home SET about = '".$about_home."'";

        // print_r($sql);
        // die;
        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location:../about_home/about_home_listing.php");
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['about_home'];
        $sql = "INSERT INTO about_home (about) VALUES ('{$name}')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("Location:../about_home/about_home_listing.php");
    }
}
?>
