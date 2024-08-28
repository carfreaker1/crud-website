<?php

require_once '../dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['update'])) {
        $id = $_POST ['id'];
        $name = $_POST['name'];
        $discount = $_POST['discount_price'];
        $price = $_POST['our_price'];
        $category = $_POST['category'];
        $about = $_POST['about_game'];
        $place = $_POST['game_place'];
        $description = $_POST['game_description'];
        $gameID = $_POST['game_id'];
        $genre = $_POST['genre'];
        $multitags = $_POST['multitags'];

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

// print_r($errors);
// die;
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');

        $sql = "UPDATE game_content SET name = '".$name."', discount_price = '".$discount."', our_price = '".$price."', category = '".$category."', about_game = '".$about."',game_place = '".$place."', game_description = '".$description."',game_id = '".$gameID."',genre = '".$genre."', multitags =  '".$multitags."', image = '".$file_name."' WHERE id = '".$id."'"; 
        // print_r($sql);
        // die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Location:../game_upload/game_listing.php");
    }

    ?>