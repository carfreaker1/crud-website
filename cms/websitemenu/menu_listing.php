<?php
session_start();
include("../partials/header.php");
include("../partials/sidebar.php");
require_once '../dbconnection.php';

?>
<?php
if (isset($_SESSION['delete']) == 'Delete') {
    ?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Menu Delete',
        subtitle: 'Subtitle',
        body: 'Menu Deleted Succesfully'
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
                                        <th>Menu Name</th>
                                        <th>Menu Url</th>
                                        <th>Sort Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $menus = mysqli_query($conn, "SELECT * FROM `websitemenu` ORDER BY `sortorder`");
                                    $sno = 0;
                                    while ($menu = mysqli_fetch_array($menus)) {
                                        $sno = $sno + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo "$sno"; ?></td>
                                            <td><?php echo $menu['menu_name']; ?></td>
                                            <td><?php echo $menu['menu_url']; ?></td>
                                            <td><?php echo $menu['sortorder']; ?></td>
                                            <td>
                                                <a href="edit_menu.php?id=<?php echo urlencode(openssl_encrypt($menu['id'], 'AES-128-ECB', 'your_secret_key')); ?>"><button type="button" class="btn btn-primary btn-sm">Edit Menu</button></a>
                                                <a  href="delete_menu.php?id=<?php echo $menu['id']; ?>" class='del_btn'><button type="button" class="btn btn-danger btn-sm">Delete Menu</button></a>
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