<?php

require_once '../dbconnection.php';


$id = $_GET['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$category  = mysqli_query($conn, "SELECT  * FROM `game_category`  WHERE id = ".$decrypted_id."");
$categories = mysqli_fetch_assoc($category);
// print_r($categories);  
// die;    
?>


<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Admin Panel</title>
  </head>
  <body>
    <?php
    include("../navbar.php");
    ?>


<?php
    if (isset($_SESSION['status']) == 'Succes') {

        ?>

        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>You Have Submitted Your Form Sucessfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>


    <form action="game_category_insert.php" method="post" enctype="multipart/form-data" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
        <div class="mt-3">
            <div class="bg-dark py-3">
                <div class="h4 text-white">Edit category</div>
            </div>
        </div>
        <input type="hidden" class="form-control" value="<?php echo $categories['id']?>" name="id" aria-describedby="emailHelp" pattern="{3,255}" placeholder="Enter About Home" required>

        <div class="mr-3">
            <label for="name" class="form-label">Game Category</label>
            <input type="textarea" class="form-control" value="<?php echo $categories['category_name']?>" name="name" aria-describedby="emailHelp" pattern="{3,255}" placeholder="Enter About Home" required>
        </div>            

  
        <div class="mb-3 ">
            <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
        </div>
            
          <button type="submit" class="btn btn-primary mb-3" name="update" >Submit</button>
        

    </form>
        <!-- onclick="function aman()" -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->


  </body>
</html>
<?php
session_start();
// Retrieve old values and errors if available
$old = isset($_SESSION['old']) ? $_SESSION['old'] : [];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
// print_r($errors); die();
// Clear session errors and old values
unset($_SESSION['old']);
unset($_SESSION['errors']);
include("../partials/header.php");
include("../partials/sidebar.php");
require_once '../dbconnection.php';
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$category  = mysqli_query($conn, "SELECT  * FROM `game_category`  WHERE id = ".$decrypted_id."");
$categories = mysqli_fetch_assoc($category);
?>

<?php
if (isset($_SESSION['error']) == 'Error') {
    ?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Error Occur',
        subtitle: 'Subtitle',
        body: 'Some Error Occured During Edit'
      })
    });
  </script>
<?php
    unset($_SESSION['status']);
}elseif(isset($_SESSION['update']) == 'Update'){
?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Menu Updated',
        subtitle: 'Subtitle',
        body: 'Category Updated Succesfully'
      })
    });
  </script>
<?php
  unset($_SESSION['update']);
} 
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Game Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">CMS</a></li>
            <li class="breadcrumb-item active">Game Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="game_category_insert.php" enctype="multipart/form-data" method="post" id="quickForm">
              <div class="card-body">
                <input type="hidden" class="form-control" id="id" value="<?php echo openssl_encrypt(urlencode($categories['id']), 'AES-128-ECB', 'your_secret_key');?>" name="id" value="<?php ?>" required>
                <div class="form-group">
                <label for="name" class="form-label">Add Game Category</label>
                <input type="text" class="form-control" id="game_category" value="<?php echo $categories['category_name']?>" name="game_category" value="<?php ?>" aria-describedby="emailHelp" pattern="[A-Z a-z\s]{3,255}" placeholder="Enter Game Category" required>
                  <?php if (isset($errors['game_category'])): ?><small class="text-danger"><?php echo $errors['game_category'] ?></small> <?php endif;?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="update" value="update" class="btn btn-primary mb-3">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <?php
  include("../partials/footer.php");
  ?>