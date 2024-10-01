<?php

require_once '../dbconnection.php';

$id = $_POST['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'&& isset($_POST['update'])) {
        // Collect POST data
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

        // Initialize errors array
        $errors = [];

        // Define required fields and their error messages
        $requiredFields = [
            'name' => "The logo title is required",
            'discount_price' => "The Discount Price is required",
            'our_price' => "The Our Price is required",
            'category' => "The category is required",
            'about_game' => "About Game is required",
            'game_place' => "Game Place is required",
            'game_description' => "Game Description is required",
            'game_id' => "Game ID is required",
            'genre' => "Genre is required",
            'multitags' => "Multitags are required",
        ];

        // Validate required fields
        foreach ($requiredFields as $field => $errorMessage) {
            if (empty($_POST[$field])) {
                $errors[$field] = $errorMessage;
            }
        }
        if (!preg_match('/^\d{1,10}(\.\d+)?$/', $_POST['our_price'])) {
            $errors['our_price_validate'] = "Please enter a valid number.";
        }
        if (!preg_match('/^\d{1,10}(\.\d+)?$/', $_POST['discount_price'])) {
            $errors['discount_price_valildate'] = "Please enter a valid number.";
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: edit_game.php");
            exit();
        }
        
        $photoImagePath = $_POST['old_image'] ?? null; // Default to old image path

        $photo_image = $_FILES['image'] ?? null;
        $maxFileSize = 5242880; // 5MB
        $allowedTypes = ["image/jpeg", "image/gif", "image/png"];

        // Check if a new image is uploaded
        if ($photo_image && $photo_image['name']) {
            // Validate uploaded image
            if (!$photo_image['name']) $errors['image'] = 'Image is required.';
            if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) {
                $errors['image_Spec'] = 'Invalid image type or size.';
            }

            // Generate new image filename
            function generateUniqueFileName($extension) {
                return uniqid() . '.' . $extension;
            }
            
            $photoImagePath = generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
            $uploadPath = "../../upload/" . $photoImagePath;
            move_uploaded_file($photo_image['tmp_name'], $uploadPath);


            // Move uploaded file to the specified directory
            if ($errors) {
                session_start();
                $errors['upload'] = 'Failed to upload image.';
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $_POST;
                header("Location: edit_game.php");
                exit();
            }
        }

        // Proceed with the database update
        $decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
        $sql = "UPDATE game_content SET name = '".$name."', discount_price = '".$discount."', our_price = '".$price."', category = '".$category."', about_game = '".$about."', game_place = '".$place."', game_description = '".$description."', game_id = '".$gameID."', genre = '".$genre."', multitags = '".$multitags."', image = '".$photoImagePath."' WHERE id = '".$decrypted_id."'";

        // Execute your SQL statement here
        
        // print_r($sql);
        // die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['update'] = "Update";
            header("Location: game_listing.php");
        } else {
            $_SESSION['error'] = "Errror";
            echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: game_listing.php");

        }

    }

    ?>