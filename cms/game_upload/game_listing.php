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
}elseif(isset($_SESSION['update']) == 'Update'){
?>
  <script>    
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Upadate ',
        subtitle: 'Subtitle',
        body: 'Content Updated Succesfully'
      })
    });
  </script>
<?php
    unset($_SESSION['update']);
    }elseif (isset($_SESSION['error']) == 'Error') {
        ?>
        <script>    
            $(document).ready(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Game Error',
                    body: 'Game Content Error Occur'
                });
            });
        </script>
        <?php
        unset($_SESSION['error']);
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
                                        <th>Game Name</th>
                                        <th>Discount</th>
                                        <th>Price</th>
                                        <th>Place</th>
                                        <th>Category</th>
                                        <th>Multitags</th>
                                        <th>Images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $games = mysqli_query($conn, "SELECT game_content.id, game_content.name, game_content.discount_price, game_content.our_price,game_content.game_place, game_content.multitags, game_content.image, game_category.category_name FROM game_content LEFT JOIN game_category ON game_content.category = game_category.id;");
                                        $sno = 0;
                                    
                                        while ($game = mysqli_fetch_array($games)) {
                                            $sno = $sno + 1;
                                            // print_r($game);
                                            // die();
                                    ?>
                                    <tr>
                                        <td><?php echo "$sno"; ?></td>
                                        <td><?php echo $game['name']; ?></td>
                                        <td><?php echo $game['discount_price']; ?></td>
                                        <td><?php echo $game['our_price']; ?></td>
                                        <td><?php echo $game['game_place']; ?></td>
                                        <td><?php echo $game['category_name']; ?></td>
                                        <td><?php echo $game['multitags']; ?></td>
                                        <td><img style="width:50px" : src="../../upload/<?php echo $game['image']; ?>" alt=""></td>
                                        <td>
                                            <a href="edit_game.php?id=<?php echo openssl_encrypt(urlencode($game['id']), 'AES-128-ECB', 'your_secret_key');?>" ><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                                            <a href="delete_game.php?id=<?php echo openssl_encrypt(urlencode($game['id']), 'AES-128-ECB', 'your_secret_key');?>" class='del_btn'><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
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