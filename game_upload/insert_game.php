<?php

require_once '../dbconnection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                    $errors = 'Only jpg, gif, and png files are allowed.';
                    exit();
                }
                if (empty($errors)) {
                    move_uploaded_file($file_tmp, "../upload/" . $file_name);
                } else {
                    print_r($errors);
                }
            }
        }

        $sql = "INSERT INTO game_content (name, discount_price, our_price,category, about_game,game_place, game_description,game_id,genre,multitags, image) VALUES ('{$name}','{$discount}','{$price}','{$category}','{$about}','{$place}','{$description}','{$gameID}','{$genre}','{$multitags}','{$file_name}')";
        // print_r($sql);
        //     die;

        if ($conn->query($sql) === TRUE) {
            $_SESSION['status'] = "Success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        header("Location:../game_upload/game_listing.php");
    }

    ?>