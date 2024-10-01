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