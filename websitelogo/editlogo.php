<?php

require_once '../dbconnection.php';

$id = $_GET['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
// $result = mysqli_query($con, $query) or die ( mysqli_error($con));
$logo = mysqli_query($conn, "SELECT * FROM `logo` WHERE id=" . $decrypted_id . "");
$row = mysqli_fetch_assoc($logo);


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
<!-- -->


 <form action="logo_insert.php" method="post" enctype="multipart/form-data" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
            <div class="mt-3">
            <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Fill The Field</div>
        </div>
    </div>


                <label for="name" class="form-label">Logo Name</label>
                <input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>" name="name" aria-describedby="emailHelp"
                    pattern="[A-Z a-z\s]{3,30}" placeholder="Enter Your Name" required>


            </div>


            <div class="mt-3">
            <input type="hidden" name="old_image" class="form-control" id="image"
                        value="<?php echo $row['image']; ?>">
                    Select image to
                    upload:
                    <input type="file" name="image" class="form-control" id="image"
                        value="<?php echo $row['image']; ?>">
            </div>
            <img style="width:50px" src="../upload/<?php echo $row['image']; ?>" />

                <div class="mb-3">
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                </div>
                <button type="submit" onclick="return confirm('Your Are Now Going On to The Listing Page.')"
                    class="btn btn-primary mb-3" name="update" >Submit</button>
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