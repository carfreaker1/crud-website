<!-- Sidebar -->
<?php $activePage = basename($_SERVER['REQUEST_URI']); ?> 
<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php if($activePage != 'cms'){echo '../../upload/logo.png';} elseif($activePage == 'cms'){ echo '../upload/logo.png';}?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">LUGX DASHBOARD</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php $activePage = basename($_SERVER['REQUEST_URI']); ?>
          <li class="nav-item">
            <a href="#" class="nav-link <?php if($activePage == 'cms') echo 'active' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item  <?php if($activePage == 'logo.php' || $activePage == 'logolisting.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'logo.php' || $activePage == 'logolisting.php') echo 'active' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                  Home Logo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>websitelogo/logo.php" class="nav-link <?php if($activePage == 'logo.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Logo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>websitelogo/logolisting.php" class="nav-link <?php if($activePage == 'logolisting.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo Listing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($activePage == 'create_about_home.php' || $activePage == 'about_home_listing.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'create_about_home.php' || $activePage == 'about_home_listing.php') echo 'active' ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>about_home/create_about_home.php" class="nav-link <?php if($activePage == 'create_about_home.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create About Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>about_home/about_home_listing.php" class="nav-link <?php if($activePage == 'about_home_listing.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Home Listing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($activePage == 'createmenus.php' || $activePage == 'menu_listing.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'createmenus.php' || $activePage == 'menu_listing.php') echo 'active' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Website Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>websitemenu/createmenus.php" class="nav-link <?php if($activePage == 'createmenus.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>websitemenu/menu_listing.php" class="nav-link <?php if($activePage == 'menu_listing.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Listing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($activePage == 'create_middle_menu.php' || $activePage == 'listing_middle_menu.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'create_middle_menu.php' || $activePage == 'listing_middle_menu.php') echo 'active' ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Website Middle Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>middle_menu/create_middle_menu.php" class="nav-link <?php if($activePage == 'create_middle_menu.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Middle Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>middle_menu/listing_middle_menu.php" class="nav-link <?php if($activePage == 'listing_middle_menu.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Middle Menu Listing</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($activePage == 'create_new_category.php' || $activePage == 'listing_game_category.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'create_new_category.php' || $activePage == 'listing_game_category.php') echo 'active' ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                 Game Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>game_category/create_new_category.php" class="nav-link <?php if($activePage == 'create_new_category.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Game Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>game_category/listing_game_category.php" class="nav-link <?php if($activePage == 'listing_game_category.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Game Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($activePage == 'create_game.php' || $activePage == 'game_listing.php') echo 'menu-open' ?>">
            <a href="#" class="nav-link <?php if($activePage == 'create_game.php' || $activePage == 'game_listing.php') echo 'active' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Create Game
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>game_upload/create_game.php" class="nav-link <?php if($activePage == 'create_game.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Game</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php if($activePage != 'cms') echo '../'?>game_upload/game_listing.php" class="nav-link <?php if($activePage == 'game_listing.php') echo 'active' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Game Listing</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <!-- /.sidebar -->
  </aside>
    <!-- Content Wrapper. Contains page content -->   