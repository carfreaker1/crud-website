        <?php
        session_start();
        require_once '../dbconnection.php';
        $id = $_POST['id'];
        $decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $menuname = $_POST['menu_name'];
            $menu_url = $_POST['menuurl'];
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
            $sql = "UPDATE websitemenu SET menu_name='" . $menuname . "', menu_url='" . $menu_url . "', sortorder='" . $sortOrder . "' WHERE id ='".$decrypted_id."'";
            if($conn->query($sql) === TRUE) {
                $_SESSION['update'] = "Update";
                header("Location:menu_listing.php");
                exit; // Exit after redirection to prevent further execution
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
        ?>
