<?php
require_once '../dbconnection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $menuname = $_POST['menu_name'];
        $menu_url = $_POST['menuurl'];
        $sortOrder = $_POST['sortorder'];
        $errors = [];
    if(empty($menuname)){
        $errors['menu_name'] = "Please enter the menu name";
    }
    if(empty($menu_url)){
        $errors['menuurl'] = "Please enter the menu url";
    }
    if(empty($sortOrder)){
        $errors['sortorder'] = "Please enter the sort order";
    }
    if ($errors) {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: createmenus.php");
        exit();
    }
    //   insert query
    $sql = "INSERT INTO websitemenu (menu_name,  menu_url,  sortorder)
            VALUES ( '{$menuname}','{$menu_url}','{$sortOrder}')"; 

    // Connection Query
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['status'] = "Success";
        header("Location:createmenus.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("Location:createmenus.php");
    }

}
?>
