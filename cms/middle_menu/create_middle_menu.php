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
?>

<?php
if (isset($_SESSION['status']) == 'Succes') {
    ?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Menu Save',
        subtitle: 'Subtitle',
        body: 'Menu Save Succesfully'
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
        body: 'Menu Updated Succesfully'
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
          <h1>Create Middle Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">CMS</a></li>
            <li class="breadcrumb-item active">MiddleMenu</li>
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
            <form action="middle_menu_insert.php" enctype="multipart/form-data" method="post" id="quickForm">
              <div class="card-body">
                <div class="form-group">
                  <label for="name" class="form-label">Middle Menu Name</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" pattern="[A-Z a-z\s]{3,30}" placeholder="Enter Your Middle Menu Name" required>
                  <?php if (isset($errors['name'])): ?><small class="text-danger"><?php echo $errors['name'] ?></small> <?php endif;?>
                </div>
                <div class="form-group">
                  <label for="name" class="form-label">Middle Menu URL</label>
                  <input type="text" class="form-control" id="url" name="url" aria-describedby="emailHelp" pattern="{1,255}" placeholder="Enter Your Middle Menu URL" required>
                  <?php if (isset($errors['url'])): ?><small class="text-danger"><?php echo $errors['url'] ?></small> <?php endif;?>
                </div>
                <div class="form-group">
                  <label for="sortorder" class="form-label">Middle Menu</label>
                  <input type="file" name="image" class="form-control" id="image" required>
                  <?php if (isset($errors['image'])): ?><small class="text-danger"><?php echo $errors['image'] ?></small>
                    <?php elseif(isset($errors['image_Spec'])): ?>
                      <small class="form-text text-danger"><?= $errors['image_Spec'] ?></small>
                  <?php endif ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
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