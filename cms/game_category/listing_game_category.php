<?php
session_start();
include("../partials/header.php");
include("../partials/sidebar.php");
require_once '../dbconnection.php';
// print_r($_SESSION); die;
?>
<?php
if (isset($_SESSION['delete']) == 'Delete') {
    ?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Category Deleted',
        body: 'Category Deleted Succesfully'
      })
    });
  </script>
<?php
    unset($_SESSION['delete']);
}elseif(isset($_SESSION['update']) == 'Update'){
    ?>
      <script>    
        $(document).ready(function() {
          $(document).Toasts('create', {
            class: 'bg-success',
            title: 'Category Updated',
            subtitle: 'Subtitle',
            body: 'Category Updated Succesfully'
          })
        });
      </script>
    <?php
      unset($_SESSION['update']);
    } 
    ?>
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Logo List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Logo</a></li>
                        <li class="breadcrumb-item active">Table</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Logo Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Game Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            $category = mysqli_query($conn, "SELECT * FROM `game_category`");
                                            $sno = 0;
                                            while ($categories = mysqli_fetch_array($category)) {
                                                $sno = $sno + 1;
                                                // print_r($about_home);
                                                // die()
                                        ?>
                                        <tr>
                                            <td><?php echo "$sno"; ?></td>
                                            <td><?php echo $categories['category_name']; ?></td>
                                            <td>
                                                <a href="edit_game_category.php?id=<?php echo urlencode(openssl_encrypt($categories['id'], 'AES-128-ECB', 'your_secret_key')); ?>"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                                <a  href="delete_game_category.php?id=<?php echo urlencode(openssl_encrypt($categories['id'], 'AES-128-ECB', 'your_secret_key')); ?>" class='del_btn'><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
<?php
include("../partials/footer.php");
?>