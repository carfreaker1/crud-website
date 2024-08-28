<?php
session_start();


require_once '../dbconnection.php';

// $data = mysqli_query($conn, "SELECT * FROM `logo`");
// $rowcount=mysqli_num_rows($data);{
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $menuname = $_POST['menu_name'];
        $menu_url = $_POST['menuurl'];

    }
//   insert query
    $sql = "INSERT INTO websitemenu (menu_name,  menu_url)
            VALUES ( '{$menuname}','{$menu_url}')";{

            

    }
// print_r($sql);


// Connection Query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Succes";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

        header("Location:../websitemenu/menu_listing.php");


}





    ?>