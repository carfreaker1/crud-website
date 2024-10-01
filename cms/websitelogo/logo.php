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



// $id = $_GET['id']; 
// $result = mysqli_query($con, $query) or die ( mysqli_error($con));
$logo = mysqli_query($conn, "SELECT * FROM `logo` ");
$row = mysqli_fetch_assoc($logo);
// print_r($row);
// die();

?>

<?php
if (isset($_SESSION['status']) == 'Succes') {
    ?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Logo Save',
        subtitle: 'Subtitle',
        body: 'Logo Save Succesfully'
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
        title: 'Logo Updated',
        subtitle: 'Subtitle',
        body: 'Logo Updated Succesfully'
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
          <h1>Create Logo</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">CMS</a></li>
            <li class="breadcrumb-item active">Logo</li>
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
              <h3 class="card-title">Create Logo</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="logo_insert.php" enctype="multipart/form-data" method="post" id="quickForm">
              <div class="card-body">
                <div class="form-group">
                  <label for="name" class="form-label">Logo Name</label>
                  <input type="text" class="form-control" id="project" name="name" value="<?php echo isset($row) ? $row['name'] : ''; ?>"  aria-describedby="emailHelp" pattern="[A-Z a-z\s]{3,30}" placeholder="Enter Your Logo name" required>
                  <?php if (isset($errors['name'])): ?><small class="text-danger"><?php echo $errors['name'] ?></small> <?php endif;?>
                </div>
                <div class="form-group">
                  <label for="name" class="form-label">Logo Image</label>
                  <input type="file" class="form-control" id="formFile" name="logo_image" value="<?php echo isset($row) ? $row['image'] : ''; ?>" required>
                  <?php if (isset($errors['logo_image'])): ?>
                      <small class="form-text text-danger"><?= $errors['logo_image'] ?></small>
                  <?php elseif(isset($errors['logo_image_Spec'])): ?>
                      <small class="form-text text-danger"><?= $errors['logo_image_Spec'] ?></small>
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