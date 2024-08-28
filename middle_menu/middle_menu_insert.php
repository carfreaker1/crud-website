<?php
session_start();
require_once '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $url = $_POST['url'];
    
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        // Check file size
        if ($file_size > 5242880) {
            $errors[] = 'File size must be exactly 5 MB';
        }
        
        // Check file type
        $allowed = array("image/jpeg", "image/gif", "image/png");
        if (!in_array($file_type, $allowed)) {
            $errors[] = 'Only jpg, gif, and png files are allowed.';
        }

        // If no errors, move uploaded file
        if (empty($errors)) {
            if (move_uploaded_file($file_tmp, "../upload/" . $file_name)) {
                // Insert query
                $sql = "INSERT INTO middle_menu (name, url, image) VALUES ('$name', '$url', '$file_name')";
                // print_r($sql);
                // die;
                // Execute SQL query
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['status'] = "Success";
                    header("Location:../middle_menu/listing_middle_menu.php");
                    exit(); // Ensure script execution stops after redirection
                } else {
                    $_SESSION['status'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $errors[] = 'Failed to move uploaded file';
            }
        } else {
            print_r($errors);
        }
    }
}

?>
