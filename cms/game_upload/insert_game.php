<?php

require_once '../dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
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
        


        $photo_image = $_FILES['image'] ?? null;
        $maxFileSize = 5242880;
        $allowedTypes = ["image/jpeg", "image/gif", "image/png"];
          if (!$photo_image['name']) $errors['image'] = 'Image is required.';
          if ($photo_image['size'] > $maxFileSize || !in_array($photo_image['type'], $allowedTypes)) $errors['image_Spec'] = 'Invalid image type or size.';
          if ($errors) {
            session_start();
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $_POST;
            header("Location: create_game.php");
            exit();
        }
        function generateUniqueFileName($extension) {
            return uniqid() . '.' . $extension;
        }

        $photoImagePath =  generateUniqueFileName(pathinfo($photo_image['name'], PATHINFO_EXTENSION));
        $uploadPath = "../../upload/" . $photoImagePath;
        move_uploaded_file($photo_image['tmp_name'], $uploadPath);

        $sql = "INSERT INTO game_content (name, discount_price, our_price,category, about_game,game_place, game_description,game_id,genre,multitags, image) VALUES ('{$name}','{$discount}','{$price}','{$category}','{$about}','{$place}','{$description}','{$gameID}','{$genre}','{$multitags}','{$photoImagePath}')";
        // print_r($sql);
        //     die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Succes";
            header("Location:game_listing.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            $_SESSION['errr'] = "Error";
            header("Location:game_listing.php");
        }
        
    }

    ?>