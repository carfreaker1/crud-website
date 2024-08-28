<?php
require_once 'dbconnection.php';
$id = $_GET['id'];
$decrypted_id = openssl_decrypt(urldecode($id), 'AES-128-ECB', 'your_secret_key');
$trendingGames = mysqli_query($conn, "SELECT game_content.id, game_content.name, game_content.discount_price,game_content.our_price, game_content.about_game, game_content.game_place, game_content.game_description, game_content.game_id, game_content.genre, game_content.multitags, game_content.image, game_category.category_name FROM game_content LEFT JOIN game_category ON game_content.category = game_category.id WHERE game_content.id = '".$decrypted_id."' OR game_content.id ='".$id."'");
// print_r($decrypted_id);
$games = mysqli_fetch_assoc($trendingGames);
// print_r($games);
// die;
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming - Product Detail</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
  </head>

<body>
<?php

?>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.php" class="logo">
                      <?php
                      $results = mysqli_query($conn, "SELECT * FROM `logo`");
                      $logo = mysqli_fetch_assoc($results);
                      // print_r($logo);
                      ?>
                        <img src="upload/<?php echo $logo ['image']; ?> "style="width: 158px;">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <?php $menusName = mysqli_query($conn, "SELECT * FROM `websitemenu`");
                        while ($menuListing = mysqli_fetch_assoc($menusName)) {
                            ?>
                            <li><a href="<?php echo $menuListing['menu_url'] ?>" class=""><?php echo $menuListing['menu_name']; ?></a></li>
                        <?php
                            }
                        ?>
                      <!-- <li><a href="index.php">Home</a></li>
                      <li><a href="shop.php">Our Shop</a></li>
                      <li><a href="product-details.php" class="active">Product Details</a></li>
                      <li><a href="contact.php">Contact Us</a></li>
                      <li><a href="#">Sign In</a></li> -->
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3><?php echo $games['name'];  ?></h3>
          <span class="breadcrumb"><a href="#">Home</a>  >  <a href="#">Shop</a>  >  Assasin Creed</span>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="upload/<?php echo $games['image'] ?>" alt="">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h4><?php echo $games['name'];  ?></h4>
          <span class="price"><em><?php echo $games['our_price']; ?></em> <?php echo $games['discount_price']; ?></span>
          <p><?php echo $games['about_game'];  ?></p>
          <!-- <form id="qty" >
            <input type="qty" class="form-control" id="1" aria-describedby="quantity" placeholder="1">
            <button type="submit"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
          </form> -->
          <ul>
            <li><span>Game ID:</span> <?php echo $games['game_id'];  ?></li>
            <li><span>Genre:</span> <?php echo $games['genre'];  ?></li>
            <li><span>Multi-tags:</span> <?php echo $games['multitags']; ?></li>
          </ul>
        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews (3)</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <?php echo $games['game_description'];  ?>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean shorts edison bulb poutine next level humblebrag la croix adaptogen. <br><br>Hashtag poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents street art.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section categories related-games">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <h6>Action</h6>
            <h2>Related Games</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="main-button">
            <a href="shop.html">View All</a>
          </div>
        </div>
        <?php
              $trendingGames = mysqli_query($conn, "SELECT game_content.id, game_content.name, game_content.our_price, game_content.game_place, game_content.genre, game_content.image, game_category.category_name FROM game_content LEFT JOIN game_category ON game_content.category = game_category.id WHERE game_place = 'CATEGORIES' ORDER BY RAND() LIMIT 0,5;");
                    // print_r($trendingGames);
                    // die;
                    foreach($trendingGames as $games){  
                      // print_r($games);

                      echo '<div class="col-lg col-sm-6 col-xs-12">
                      <div class="item">
                        <h4>'.$games['category_name'].'</h4>
                        <div class="thumb">
                          <a href="product-details.php?id='.$games['id'].'"><img src="upload/'.$games['image'].'" alt=""></a>
                        </div>
                      </div>
                    </div>';

                    }
        ?> 
        <!-- <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/categories-01.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/categories-03.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/categories-04.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="col-lg col-sm-6 col-xs-12">
          <div class="item">
            <h4>Action</h4>
            <div class="thumb">
              <a href="product-details.html"><img src="assets/images/categories-05.jpg" alt=""></a>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 AMAN Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>