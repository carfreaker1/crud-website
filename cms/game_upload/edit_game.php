<?php
session_start();
// Retrieve old values and errors if available
$game = isset($_SESSION['old']) ? $_SESSION['old'] : [];
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

// Clear session errors and old values
unset($_SESSION['old']);
unset($_SESSION['errors']);
include("../partials/header.php");
include("../partials/sidebar.php");
require_once '../dbconnection.php';

$id = $_GET['id'];
// print_r($id);
// die;
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$games = mysqli_query($conn, "SELECT game_content.id, game_content.name, game_content.discount_price, game_content.our_price ,game_content.about_game,game_content.game_place, game_content.game_description, game_content.game_id, game_content.genre, game_content.multitags, game_content.image, game_category.category_name, game_content.category FROM game_content LEFT JOIN game_category ON game_content.category = game_category.id WHERE game_content.id ='".$decrypted_id."' ");
$game = mysqli_fetch_assoc($games);
?>

<?php
if (isset($_SESSION['status']) == 'Succes') {
    ?>
    <script>    
        $(document).ready(function() {
            $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Game Content Save',
                body: 'Game Content Save Succesfully'
            });
        });
    </script>
    <?php
    unset($_SESSION['status']);
} elseif (isset($_SESSION['error']) == 'Error') {
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
                    <h1>Create Game Content</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">CMS</a></li>
                        <li class="breadcrumb-item active">Game Content</li>
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
                        <form action="update_game.php" enctype="multipart/form-data" method="post" id="quickForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $id ?>" class="form-control" id="" name="id">
                                    <label for="name" class="form-label">Game Name</label>
                                    <input type="text" value="<?= isset($game['name']) ? $game['name'] : '' ?>" class="form-control" id="name" name="name" pattern="{3,40}" placeholder="Enter Your Game Name" >
                                    <?php if (isset($errors['name'])): ?><small class="text-danger"><?php echo $errors['name']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"  value="<?= isset($game['discount_price']) ? $game['discount_price'] : '' ?>" class="form-control" id="discount_price" name="discount_price" 
                                           placeholder="Enter the number for how much you discount % give" >
                                    <?php if (isset($errors['discount_price'])): ?>
                                        <small class="text-danger"><?php echo $errors['our_price']; ?></small>
                                    <?php elseif(isset($errors['discount_price_validate'])): ?>
                                        <small class="text-danger"><?php echo $errors['discount_price_validate']; ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="our_price" class="form-label">Our Price</label>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"  value="<?= isset($game['our_price']) ? $game['our_price'] : '' ?>" class="form-control" id="our_price" name="our_price" 
                                           placeholder="Enter Price in Dollar" >
                                    <?php if (isset($errors['our_price'])): ?>
                                        <small class="text-danger"><?php echo $errors['our_price']; ?></small>
                                    <?php elseif(isset($errors['our_price_validate'])): ?>
                                        <small class="text-danger"><?php echo $errors['our_price_validate']; ?></small>
                                    <?php endif ?>

                                </div>

                                <div class="form-group">
                                    <label for="category">Choose Your Category:</label>
                                    <select name="category" id="category" class="form-control" >
                                        <option value="">--- Select Your Game Category ---</option>
                                        <?php 
                                        $gameCategory = mysqli_query($conn,"SELECT * FROM `game_category`");
                                        while($gameCategories = mysqli_fetch_assoc($gameCategory)) {
                                        ?>
                                            <option value ="<?php echo $gameCategories['id'];?>" <?php echo (isset($game['category']) && $game['category'] == $gameCategories['id']) ? 'selected' : ''; ?> ><?php echo $gameCategories['category_name']; ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                    <?php if (isset($errors['category'])): ?><small class="text-danger"><?php echo $errors['category']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="about_game" class="form-label">About Game</label>
                                    <textarea class="form-control" name="about_game" id="about_game" 
                                              placeholder="Write Something About Game"><?= isset($game['about_game']) ? $game['our_price'] : '' ?></textarea>
                                    <?php if (isset($errors['our_price'])): ?><small class="text-danger"><?php echo $errors['our_price']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="game_place">Choose Your Game Place:</label>
                                    <select name="game_place" id="game_place" class="form-control" >
                                        <option value="">--- Select Your Game Place ---</option>
                                        <option value="TRENDING" <?php echo (isset($game['game_place']) && $game['game_place'] == 'TRENDING') ? 'selected' : ''; ?>>TRENDING</option>
                                        <option value="TOP_GAMES" <?php echo (isset($game['game_place']) && $game['game_place'] == 'TOP_GAMES') ? 'selected' : ''; ?>>TOP GAMES</option>
                                        <option value="CATEGORIES" <?php echo (isset($game['game_place']) && $game['game_place'] == 'CATEGORIES') ? 'selected' : ''; ?>>CATEGORIES</option>
                                    </select>
                                    </select>
                                    <?php if (isset($errors['game_place'])): ?><small class="text-danger"><?php echo $errors['game_place']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="game_description">Enter The Game Description</label>
                                    <textarea class="form-control" name="game_description" id="game_description" 
                                              placeholder="Write Something About Game"><?= isset($game['game_description']) ? $game['game_description'] : '' ?></textarea>
                                    <?php if (isset($errors['game_description'])): ?><small class="text-danger"><?php echo $errors['game_description']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="game_id">Enter The Game ID</label>
                                    <input type="text" value="<?= isset($game['game_id']) ? $game['game_id'] : '' ?>" class="form-control" name="game_id" id="game_id" 
                                           placeholder="Enter Game ID" >
                                    <?php if (isset($errors['game_id'])): ?><small class="text-danger"><?php echo $errors['game_id']; ?></small><?php endif; ?>

                                </div>

                                <div class="form-group">
                                    <label for="genre">Enter The Game Genre</label>
                                    <input type="text" value="<?= isset($game['genre']) ? $game['genre'] : '' ?>" class="form-control" name="genre" id="genre" 
                                           placeholder="Enter Game Genre" >
                                    <?php if (isset($errors['genre'])): ?><small class="text-danger"><?php echo $errors['genre']; ?></small><?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="multitags">Enter The Game Multitags</label>
                                    <input type="text" value="<?= isset($game['multitags']) ? $game['multitags'] : '' ?>" class="form-control" name="multitags" id="multitags" 
                                           placeholder="Enter Game Multitags" >
                                     <?php if (isset($errors['multitags'])): ?><small class="text-danger"><?php echo $errors['multitags']; ?></small><?php endif; ?>

                                </div>

                                <div class="form-group">
                                    <label for="image">Select image to upload:</label>
                                    <input type="file" name="image" value="<?= isset($game['image']) ? $game['image'] : '' ?>" class="form-control" id="image" >
                                    <input type="hidden" name="old_image" value="<?= isset($game['image']) ? $game['image'] : '' ?>" class="form-control" id="image" >
                                    <?php if (isset($errors['image'])): ?>
                                        <small class="form-text text-danger"><?= $errors['image'] ?></small>
                                    <?php elseif(isset($errors['image_Spec'])): ?>
                                        <small class="form-text text-danger"><?= $errors['image_Spec'] ?></small>
                                    <?php endif ?>
                                    <img class="mt-2" style="width:100px" : src="../../upload/<?php echo $game['image']; ?>" alt="">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mb-3" value="update" name="update">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?php
    include("../partials/footer.php");
    ?>
</div>
