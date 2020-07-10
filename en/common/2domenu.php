<nav class="navbar navbar-expand-lg navbar-light py-0 bg-white" id="navbar2">
  <div class="container my-0 bg-transparent">
    <a class="navbar-brand py-0" href="/index.php">
      <img class="logo_2menu mr-0" src="/imagen/letters_logo.svg" alt="SVG">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-3">
      <li class="nav-item pt-2">
        <a class="nav-link text_menu_2 <?php if($section=="home"){echo "active";} ?> py-4" href="/en/index.php">Home</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="divisiones"){echo "active";} ?>" href="/en/products/index.php?products=1">Divisions</a>
          <div class="dropdown-content">
            <a class="text_menu_2" href="/en/products/index.php?id_div=1">Food</a>
            <a class="text_menu_2" href="/en/products/index.php?id_div=2">Especialty</a>
            <a class="text_menu_2" href="/en/products/index.php?id_div=3">Commodities</a>
            <a class="text_menu_2" href="/en/products/index.php?id_div=4">Plastics</a>
          </div>
        </div>
      </li>
      <li class="nav-item px-2 pt-2">
        <div class="dropdown">
          <a class="nav-link dropbtn text_menu_2 py-4 <?php if($section=="industrias"){echo "active";} ?>" href="/en/products/index.php?industries=1">Industries</a>
          <div class="dropdown-content2">
            <ul class="col3">
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=1">Adhesives and Glue</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=2">Food and Beverages</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=3">Building</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=4">Pharmaceuticals and Cosmetic</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=13">Other Industries</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=22">Metal Products</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=23">Services</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=9">Agro</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=10">Cleaning</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=11">Leather</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=12">Printing</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=5">Sugar mills</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=6">Pretroleum</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=7">Pulpa</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=8">Textiles and Garments</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=18">Feed</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=18">Retail</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=19">Foams</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=20">Chemical Industry</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=21">Pulp and paper</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=14">Plastics</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=15">Coverings</a></li>
              <li><a class="text_menu_2" href="/en/products/index.php?id_ind=16">Water treatment</a></li>
            </ul>
          </div>
        </div>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="nuestra_company"){echo "active";} ?>" href="/en/our-company/index.php">Our Company</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="pagos"){echo "active";} ?>" href="/en/pay/index.php">Pay Online</a>
      </li>
      <li class="nav-item px-2 pt-2">
        <a class="nav-link text_menu_2 py-4 <?php if($section=="contacto"){echo "active";} ?>" href="/en/contact-us/index.php">Contact Us</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
