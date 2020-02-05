<nav class="navbar navbar-expand-lg navbar-light bg-white pt-0 navbar_fixed" id="navbar2">
  <div class="container my-0">
    <a class="navbar-brand py-2" href="/index.php">
      <img src="/imagen/logo_texto.png" alt="" width="100%">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-3">
      <li class="nav-item pt-2">
        <a class="nav-link text_menu_2 <?php if($section=="home"){echo "active";} ?> py-4" href="/en/index.php">Home</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="divisiones"){echo "active";} ?>" href="/en/products/index.php?products=1">Divisions</a>
          <div class="dropdown-content">
            <a class="text_menu_2" href="#">Food</a>
            <a class="text_menu_2" href="#">Specialty</a>
            <a class="text_menu_2" href="#">Commodities</a>
            <a class="text_menu_2" href="#">Plastic</a>
          </div>
        </div>
      </li>
      <li class="nav-item ml-3 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="industrias"){echo "active";} ?>" href="/en/products/index.php?industries=1">Industries</a>
          <div class="dropdown-content2">
            <ul class="col3">
              <li><a class="text_menu_2" href="#">Adhesives and Glue</a></li>
              <li><a class="text_menu_2" href="#">Food and Beverages</a></li>
              <li><a class="text_menu_2" href="#">Building</a></li>
              <li><a class="text_menu_2" href="#">Pharmaceuticals and Cosmetic</a></li>
              <li><a class="text_menu_2" href="#">Other Industries</a></li>
              <li><a class="text_menu_2" href="#">Metal Products</a></li>
              <li><a class="text_menu_2" href="#">Services</a></li>
              <li><a class="text_menu_2" href="#">Agro</a></li>
              <li><a class="text_menu_2" href="#">Cleaning</a></li>
              <li><a class="text_menu_2" href="#">Leather</a></li>
              <li><a class="text_menu_2" href="#">Printing</a></li>
              <li><a class="text_menu_2" href="#">Sugar mills</a></li>
              <li><a class="text_menu_2" href="#">Pretroleum</a></li>
              <li><a class="text_menu_2" href="#">Pulpa</a></li>
              <li><a class="text_menu_2" href="#">Textiles and Garments</a></li>
              <li><a class="text_menu_2" href="#">Feed</a></li>
              <li><a class="text_menu_2" href="#">Retail</a></li>
              <li><a class="text_menu_2" href="#">Foams</a></li>
              <li><a class="text_menu_2" href="#">Chemical Industry</a></li>
              <li><a class="text_menu_2" href="#">Pulp and paper</a></li>
              <li><a class="text_menu_2" href="#">Plastics</a></li>
              <li><a class="text_menu_2" href="#">Coverings</a></li>
              <li><a class="text_menu_2" href="#">Water treatment</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="nuestra_company"){echo "active";} ?>" href="/en/our-company/index.php">Our Company</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="pagos"){echo "active";} ?>" href="/en/pay/index.php">Pay Online</a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="contacto"){echo "active";} ?>" href="/en/contact-us/index.php">Contact Us</a>
      </li>
      <li class="nav-item ml-5 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section==""){echo "active";} ?>" href="/en/index.php">
          <img src="/imagen/usa.png" alt="" width="18px">
        </a>
      </li>
      <li class="nav-item ml-3 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section==""){echo "active";} ?>" href="/es/index.php">
          <img src="/imagen/vzla.png" alt="" width="18px">
        </a>
      </li>
    </ul>
  </div>
  </div>
</nav>
