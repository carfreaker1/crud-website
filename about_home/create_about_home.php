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


<?php
    if (isset($_SESSION['status']) == 'Succes') {

        ?>

        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>You Have Submitted Your Form Sucessfully!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>


    <form action="about_home_insert.php" method="post" enctype="multipart/form-data" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
        <div class="mt-3">
            <div class="bg-dark py-3">
                <div class="h4 text-white">About Home</div>
            </div>
        </div>

        <div class="mr-3">
            <label for="name" class="form-label">About Home</label>
            <textarea type="textarea" class="form-control" id="about_home" name="about_home" aria-describedby="emailHelp" pattern="[A-Z a-z\s]{3,255}" placeholder="Enter About Home" required></textarea>
        </div>            

  
        <div class="mb-3 ">
            <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
        </div>
            
          <button type="submit" class="btn btn-primary mb-3" name="submit" >Submit</button>
        

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