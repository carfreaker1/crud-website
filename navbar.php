<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Home Logo
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../websitelogo/logo.php">New Logo</a></li>
            <li><a class="dropdown-item" href="../websitelogo/logolisting.php">Edit Logo</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Home
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../about_home/create_about_home.php">About Home</a></li>
            <li><a class="dropdown-item" href="../about_home/edit_about_home.php">Edit Home</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Website Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../websitemenu/createmenus.php">Create Menu</a></li>
            <li><a class="dropdown-item" href="../websitemenu/menu_listing.php">Edit Menu</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Website Middle Menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../middle_menu/create_middle_menu.php">Create Middle Menu</a></li>
            <li><a class="dropdown-item" href="../middle_menu/listing_middle_menu.php">Edit Middle Menu</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Game Category
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../game_category/create_new_category.php">Create Game Category</a></li>
            <li><a class="dropdown-item" href="../game_category/listing_game_category.php">Edit Game Category</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Create Game
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../game_upload/create_game.php">Create Game Category</a></li>
            <li><a class="dropdown-item" href="./game_upload/game_listing.php">Edit Game Category</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>