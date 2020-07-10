<div class="py-3">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-auto">
        <div class="dropdown_menu_cel">
          <span class="dropbtn_menu_cel">
            <svg style="max-height:1rem;" width="15px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#000066" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg>
          </span>
          <small class="dropdown-content_menu_cel">
            <a href="tel:1-786-702-9996">+1 786 702 9996</a>
          </small>
        </div>
        <div class="dropdown_menu_email">
          <span class="dropbtn_menu_email">
            <svg style="max-height:1rem;" width="17px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="#000066" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
          </span>
          <small class="dropdown-content_menu_email">
            <a href="mailto:info@eurochemus.com">info@eurochemus.com</a>
          </small>
        </div>
      </div>
      <div class="col-auto d-none d-md-block">
        <span class="px-1">
          <a class="enlace_menu <?php if($section=="certificaciones"){echo "active";} ?>" href="/es/certificaciones/">Certificaciones</a>
        </span>
        <span class="px-1">
          <a class="enlace_menu <?php if($section=="trabaje"){echo "active";} ?>" href="/es/trabaje/">Trabaje con nosotros</a>
        </span>
        <span class="px-1">
          <a class="enlace_menu <?php if($section=="actualidad"){echo "active";} ?>" href="/es/actualidad/">Actualidad</a>
        </span>
      </div>
      <div class="col-auto ml-auto">
        <svg class="search_button" id="search_button_menu" width="16px" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
        <div class="dropdown_menu">
          <img class="dropdown-item-icon ml-3 mr-0" src="/imagen/us.svg" alt="SVG">
          <span class="dropbtn_menu">Inglés</span>
          <div class="dropdown-content_menu">
            <a href="/en/">Inglés</a>
            <a href="/index.php">Español</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="cont_input_search">
    <form action="/es/productos/index.php" method="get" id="search1">
    <input class="search_input_menu" type="search" hidden name="search" placeholder="Buscar productos..." onkeypress="if (event.keyCode == 13) enviar_formulario()" id="input_search_menu">
  </form>
  </div>
</div>
<script>
function enviar_formulario(){document.search1.submit()}
</script>
<script>
  var search_button=document.querySelector("#search_button_menu");
  var input_search_menu=document.querySelector("#input_search_menu");
  //Al dar click en el icono buscar
  search_button.addEventListener('click',function(e){
    var clase =input_search_menu.classList;
    if(clase=="search_input_menu"){
      input_search_menu.classList.replace("search_input_menu","search_input_menu_active");
      input_search_menu.removeAttribute('hidden');
      input_search_menu.focus();
    }else{
      input_search_menu.classList.replace("search_input_menu_active","search_input_menu");
      input_search_menu.setAttribute('hidden','hidden');
    }
  });
  //cuando pierde el enfoque el input
  input_search_menu.addEventListener('blur',function(e){
    var clase =input_search_menu.classList;
    setTimeout(function(){
        var input_search_menu=document.querySelector("#input_search_menu");
        input_search_menu.classList.replace("search_input_menu_active","search_input_menu");
        input_search_menu.setAttribute('hidden','hidden');
    },300);
  });
</script>
