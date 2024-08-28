<?php
session_start();

require_once '../dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $url = $_POST['url'];

    // Check if image is uploaded
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        // Check file size
        if (empty($file_name)) {
            $file_name = $_POST['old_image'];
        } else {
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
                move_uploaded_file($file_tmp, "../upload/" . $file_name);
            } else {
                print_r($errors);
                exit();
            } // Exit if there are errors
        }
    }

    $sql = "UPDATE middle_menu SET name = '".$name."', url = '".$url."' ,image = '".$file_name."' WHERE id = '".$id."'";
    // print_r($sql);
    // die;

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Update";
        // print_r();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location:../middle_menu/listing_middle_menu.php");
}
?>
