<?php
session_start();

require_once '../dbconnection.php';


?>
<!doctype html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Form for Submission</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">


    <!--Data table css and  jquery  ends  -->


    <!-- <meta http-equiv="refresh" content="0;URL='http://localhost/aman/22_New_Form.php'" />     -->
    <style>
        .dropdown-menu li {
            text-align: left;
        }
    </style>
     <!-- <style>.bg-dark {
    background-color: #3300ff61!important;
}</style> -->
</head>

<body>

<?php
    include("../navbar.php");
    ?>



                <?php
                if (isset($_SESSION['status'])) {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>You Have Submitted Your Form Sucessfully!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>'
                    <?php
                    unset($_SESSION['status']);
                }
                ?>


                <div class="container">
                    <form action="insert_game.php" method="post" enctype="multipart/form-data" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
                        <div class="mt-3">
                        <div class="bg-dark py-3">
                    <div class="container">
                        <div class="h4 text-white">Fill The Form</div>
                    </div>
                </div>

                <div>
                    <label for="name" class="form-label">Game Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                        pattern="{3,40}" placeholder="Enter Your Game Name" required>


                </div>


                <div class="mt-3">
                    <label for="email" class="form-label">Discount Price </label>
                    <input type="text" required class="form-control" name="discount_price" id="discount_price"
                        placeholder="Enter Your Discount Price">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="mt-3">
                    <label for="email" class="form-label">Our Price </label>
                    <input type="text" required class="form-control" name="our_price" id="our_price"
                        placeholder="Enter Price">
                    <div id="emailHelp" class="form-text"></div>
                </div>

                <div class="mt-3">
                    <label for="category">Choose Your Category:</label>
                    <select name="category" id="category" class="form-control" required>
                        <option>--- Select Your Game Category ---</option>
                        <?php 
                        $gameCategory = mysqli_query($conn,"SELECT * FROM `game_category`");
                              while($gameCategories = mysqli_fetch_assoc($gameCategory)){
                                ?>
                        <option value ="<?php echo $gameCategories['id'];?>"><?php echo $gameCategories['category_name'] ?></option>
                        <?php
                             } ?>
                       
                    </select>
                </div>


                <div class="mt-3">
                    <label for="hobbies" class="form-label">About Game </label>
                    <textarea type="text" class="form-control" name="about_game" id="game_description"
                        placeholder="Write Something About Game"></textarea>
                </div>


                <div class="mt-3">
                    <label for="city">Choose Your Game Place:</label>
                    <select name="game_place" id="game_place" class="form-control" required>
                        <option value="game_place">--- Select Your Game Place ---</option>
                            <option>TRENDING</option>
                            <option>TOP_GAMES</option>
                            <option>CATEGORIES</option>
                    </select>
                </div>


              

                <div class="mt-3">
                    <label for="hobbies" class="form-label">Enter The Game Description</label>
                    <textarea type="text" class="form-control" name="game_description" id="game_description"
                        placeholder="Write Something About Game"></textarea>
                </div>

                <div class="mt-3">
                    <label for="hobbies" class="form-label">Enter The Game ID</label>
                    <input type="text" class="form-control" name="game_id" id="game_description"
                        placeholder="Write Something About Game"></input>
                </div>
         
                <div class="mt-3">
                    <label for="hobbies" class="form-label">Enter The Game Genre</label>
                    <input type="text" class="form-control" name="genre" id="genre"
                        placeholder="Write Something About Game"></input>
                </div>

                <div class="mt-3">
                    <label for="hobbies" class="form-label">Enter The Game Multitags</label>
                    <input type="text" class="form-control" name="multitags" id="game_description"
                        placeholder="Write Something About Game"></input>
                </div>


                <div class="mt-3">
                     Select image to
                        upload:
                        <input type="file" name="image" class="form-control" id="image" required>
                </div>

                <div class="mt-3">
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                </div>
                <button type="submit" onclick="return confirm('Your Are Now Going On to The Listing Page.')"
                    class="btn btn-primary mt-3" name="submit" onclick="">Submit</button>
        </form>

    </div>

                            </div>

    <div class="alert alert-success" role="alert" mt-3>
    <strong><a target="_blank" onclick="return confirm('This link will take you to on another tab .')" href="http://localhost/my_form/listing.php" style="display: flex; justify-content : center">Click Here to See Your Submitted Form
</a></strong>
    </div>


    
    <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- <script src="number_validation.js"></script> -->

    <!-- Option 1: Bootstrap Bundle with Popper -->



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
    <script>
        function aman() {
            alert();
        }
    </script>
</body>

</html>