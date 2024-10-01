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
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $logos = mysqli_query($conn, "SELECT * FROM `logo`");
                                    $sno = 0;
                                    while ($logo = mysqli_fetch_array($logos)) {
                                        $sno = $sno + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo "$sno"; ?></td>
                                            <td><?php echo $logo['name']; ?></td>
                                            <td><img style="width:50px" : src="../../upload/<?php echo $logo['image']; ?>" alt=""></td>
                                            <td><a href="deletelogo.php?id=<?php echo $logo['id'];?>" class='del_btn'><button type="button" class="btn btn-danger btn-sm">Delete Logo</button></a></td>
                                            <!-- <td>
                                                <?php
                                                    if ($row['status'] == 1) {
                                                        echo '<a class="btn btn-sm btn-success" href="status.php?id=' . $logo['id'] . '&status=1">Active</a>';
                                                    } else {
                                                        echo '<a class="btn btn-sm btn-danger" href="status.php?id=' . $logo['id'] . '&status=0">Inactive</a>';
                                                    }
                                                ?>
                                            </td> -->
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