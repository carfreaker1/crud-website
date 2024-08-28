<?php
session_start();

require_once '../dbconnection.php';

$data = mysqli_query($conn, "SELECT * FROM `logo`");
$rowcount = mysqli_num_rows($data);

if ($rowcount > 0) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $name = $_POST['name'];

        // Check if image is uploaded
        if (empty($file_name)) {
            $file_name = $_POST['old_image'];
        } else {

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
                move_uploaded_file($file_tmp, "../upload/" . $file_name);
            } else {
                print_r($errors);
                exit();
            } // Exit if there are errors
        }
    }

        $sql = "UPDATE logo SET name = '".$name."', image = '".$file_name."'";
        // print_r($sql);
        // die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Location:../websitelogo/logolisting.php");
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];

        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
    
            if ($file_size > 5242880) {
                $errors[] = 'File size must be exactly 5 MB';
            }
            if ($file_tmp) {
                $allowed = array("image/jpeg", "image/gif", "image/png");
                if (!in_array($file_type, $allowed)) {
                    $error_message = 'Only jpg, gif, and png files are allowed.';
                    echo $error_message;
                    exit();
                }
                if (empty($errors)) {
                    move_uploaded_file($file_tmp, "../upload/" . $file_name);
                } else {
                    print_r($errors);
                }
            }
        }

        $sql = "INSERT INTO logo (name, image) VALUES ('{$name}','{$file_name}')";
        print_r($sql);
        die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Location:../websitelogo/logolisting.php");
    }
}
?>
