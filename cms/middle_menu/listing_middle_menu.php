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
        title: 'Delete Middle menu',
        subtitle: 'Subtitle',
        body: 'Middle menu delete Succesfully'
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
        class: 'bg-succes',
        title: 'Middle menu',
        subtitle: 'Subtitle',
        body: 'Middle menu updated Succesfully'
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
                            <h3 class="card-title">Logos Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>URL</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $middle_menu = mysqli_query($conn, "SELECT * FROM `middle_menu`");
                                        $sno = 0;
                                        while ($data = mysqli_fetch_array($middle_menu)) {
                                            $sno = $sno + 1;
                                            // print_r($data);
                                            // die;
                                    ?>
                                        <tr>
                                            <td><?php echo "$sno"; ?></td>
                                            <td><?php echo $data['name']; ?></td>
                                            <td><?php echo $data['url']; ?></td>
                                            <td><img style="width:50px" : src="../../upload/<?php echo $data['image']; ?>" alt=""></td>
                                            <td>
                                                <a href="edit_middle_menu.php?id=<?php echo openssl_encrypt(urlencode($data['id']), 'AES-128-ECB', 'your_secret_key');?>" ><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                                <a href="delete_middle_menu.php?id=<?php echo $data['id'];?>" class='del_btn'><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
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