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
        title: 'Logo Delete',
        subtitle: 'Subtitle',
        body: 'Logo Deleted Succesfully'
      })
    });
  </script>
<?php
    unset($_SESSION['delete']);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Project</a></li>
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
                            <h3 class="card-title">Projects Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>About Home</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $about = mysqli_query($conn, "SELECT * FROM `about_home`");
                                        $sno = 0;
                                        while ($about_home = mysqli_fetch_array($about)) {
                                            $sno = $sno + 1;
                                            // print_r($about_home);
                                            // die()
                                    ?>
                                    <tr>
                                        <td><?php echo "$sno"; ?></td>
                                        <td><?php echo $about_home['about'] ?></td>
                                        <td><a class='btn btn-sm btn-danger' href="../about_home/delete_about_home.php?id=<?php echo $about_home['id']; ?>"class='del_btn'>Delete</a></td>
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