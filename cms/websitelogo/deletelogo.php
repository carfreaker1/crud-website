<?php
    
    require_once '../dbconnection.php';
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `logo` WHERE id = $id";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['delete'] = "Delete";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    // print_r($_SESSION);
    // die();

    header("Location:logolisting.php")

?>