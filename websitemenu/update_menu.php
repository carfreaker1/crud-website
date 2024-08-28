        <?php
        session_start();
        require_once '../dbconnection.php';

        if (($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Update']))) {
            // $menu_id = $_POST['id'];
            $menuname = $_POST['menu_name'];
            $menu_url = $_POST['menuurl'];
            $menu_id = $_POST['id'];
        }
            $sql = "UPDATE websitemenu SET menu_name='" . $menuname . "', menu_url='" . $menu_url . "' WHERE id ='".$menu_id."'";
            // // print_r($_POST);
            // print_r($sql);
            // die();
            if($conn->query($sql) === TRUE) {
                $_SESSION['update'] = "Success";
                header("Location:../websitemenu/menu_listing.php");
                exit; // Exit after redirection to prevent further execution
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
    
        ?>
