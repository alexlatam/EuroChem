<footer>
  <div class="container-fluid bg-dark pt-5 pb-3">
    <div class="row">
      <div class="col-sm-6 col-md-2 d-none d-sm-block">
        <ul class="lista">
          <li><h4 class="text-white">General</h4></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/index.php?id=9">Nosotros</a></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/terminos.php">Términos y condiciones</a></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/index.php">Preguntas Frecuentes</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-2 d-none d-sm-block">
        <ul class="lista">
          <li><h4 class="text-white">Acerca de</h4></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/p_priv.php">Políticas de Privacidad</a></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/p_env.php">Políticas de envíos</a></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/p_dev.php">Políticas de devoluciones</a></li>
          <li><a class="disabled enlace" href="<?php echo $root_folder;?>/info/index.php?id=4">Métodos de Pago</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-2 d-none d-sm-block">
        <ul class="lista">
          <li><h4 class="text-white">Tienda</h4></li>
          <li><a class="disabled enlace" href="<?php echo $root_folder;?>/index.php#mapa_tienda" target="_blank">Tienda Fisica</a></li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-2 d-none d-sm-block">
        <ul class="lista">
          <li><h4 class="text-white">Soporte</h4></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/atencion.php">Atención Cercana</a></li>
          <li><a class="enlace" href="<?php echo $root_folder;?>/info/contacto.php">Contáctanos</a></li>
          <li></li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-4 justify-content-center">
        <div class="text-center mb-3">
          <a href="<?php echo $root_folder;?>/index.php" style="text-decoration:none;">
            <img src="<?php echo $root_folder;?>/admin/img/<?php echo $imageLogo;?>" alt="SuministrosMavic" width="50px">
            <span class="nombreFooter"><?php echo $nombrePagina;?></span>
          </a>
        </div>
        <div class="row justify-content-center mt-2">
          <?php if (isset($facebook) && !empty($facebook)): ?>
            <span class="col-1">
              <a href="<?php echo $facebook;?>" target="_blank">
                <svg width='30px' version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.196 112.196" style="enable-background:new 0 0 112.196 112.196;" xml:space="preserve">
                  <g><circle style="fill:#ffffff;" cx="56.098" cy="56.098" r="56.098"/><path style="fill:#000000;" d="M70.201,58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34
                    c0-5.964,2.833-15.303,15.301-15.303L71.56,21.81v12.51h-8.151c-1.337,0-3.217,0.668-3.217,3.513v7.585h11.334L70.201,58.294z"/></g>
                  </a>
                </span>
          <?php endif; ?>
          <?php if (isset($instagram) && !empty($instagram)): ?>
            <span class="col-1">
              <a href="<?php echo $instagram;?>#" target="_blank">
                <svg width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 89.758 89.758" style="enable-background:new 0 0 89.758 89.758;background-color:#000;border-radius:50%" xml:space="preserve">
                  <g>
                    <path style="fill:#ffffff;" d="M58.255,23.88H31.503c-4.27,0-7.744,3.474-7.744,7.744v26.752c0,4.27,3.474,7.745,7.744,7.745
                    h26.752c4.27,0,7.745-3.474,7.745-7.745V31.624C66,27.354,62.526,23.88,58.255,23.88z M44.879,58.906
                    c-7.667,0-13.905-6.238-13.905-13.906c0-7.667,6.238-13.905,13.905-13.905c7.668,0,13.906,6.238,13.906,13.905
                    C58.785,52.667,52.546,58.906,44.879,58.906z M59.232,33.97c-1.815,0-3.291-1.476-3.291-3.29c0-1.814,1.476-3.29,3.291-3.29
                    c1.814,0,3.29,1.476,3.29,3.29C62.522,32.494,61.046,33.97,59.232,33.97z"/>
                    <path style="fill:#ffffff;" d="M44.879,36.971c-4.426,0-8.03,3.602-8.03,8.028c0,4.428,3.604,8.031,8.03,8.031
                    c4.428,0,8.029-3.603,8.029-8.031C52.908,40.574,49.306,36.971,44.879,36.971z"/>
                    <path style="fill:#ffffff;" d="M44.879,0C20.094,0,0,20.094,0,44.879c0,24.785,20.094,44.879,44.879,44.879
                    c24.785,0,44.879-20.094,44.879-44.879C89.758,20.094,69.664,0,44.879,0z M71.875,58.376c0,7.511-6.109,13.62-13.62,13.62H31.503
                    c-7.51,0-13.62-6.109-13.62-13.62V31.624c0-7.51,6.11-13.62,13.62-13.62h26.752c7.511,0,13.62,6.11,13.62,13.62V58.376z"/>
                  </g>
                </a>
              </span>
          <?php endif; ?>
          <?php if (isset($twitter) && !empty($twitter)): ?>
              <span class="col-1">
                <a href="<?php echo $twitter;?>" target="_blank">
                <svg width="30px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.197 112.197" style="enable-background:new 0 0 112.197 112.197;" xml:space="preserve">
                  <g>
                    <circle style="fill:#ffffff;" cx="56.099" cy="56.098" r="56.098"/>
                    <g>
                      <path style="fill:#000000;" d="M90.461,40.316c-2.404,1.066-4.99,1.787-7.702,2.109c2.769-1.659,4.894-4.284,5.897-7.417
                      c-2.591,1.537-5.462,2.652-8.515,3.253c-2.446-2.605-5.931-4.233-9.79-4.233c-7.404,0-13.409,6.005-13.409,13.409
                      c0,1.051,0.119,2.074,0.349,3.056c-11.144-0.559-21.025-5.897-27.639-14.012c-1.154,1.98-1.816,4.285-1.816,6.742
                      c0,4.651,2.369,8.757,5.965,11.161c-2.197-0.069-4.266-0.672-6.073-1.679c-0.001,0.057-0.001,0.114-0.001,0.17
                      c0,6.497,4.624,11.916,10.757,13.147c-1.124,0.308-2.311,0.471-3.532,0.471c-0.866,0-1.705-0.083-2.523-0.239
                      c1.706,5.326,6.657,9.203,12.526,9.312c-4.59,3.597-10.371,5.74-16.655,5.74c-1.08,0-2.15-0.063-3.197-0.188
                      c5.931,3.806,12.981,6.025,20.553,6.025c24.664,0,38.152-20.432,38.152-38.153c0-0.581-0.013-1.16-0.039-1.734
                      C86.391,45.366,88.664,43.005,90.461,40.316L90.461,40.316z"/>
                    </g>
                  </g>
                  </a>
              </span>
              <?php endif; ?>
              <?php if (isset($linkedin) && !empty($linkedin)): ?>
              <span class="col-1">
                <a href="<?php echo $linkedin;?>" target="_blank">
                <svg width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 112.196 112.196" style="enable-background:new 0 0 112.196 112.196;" xml:space="preserve">
                  <g>
                    <circle style="fill:#ffffff;" cx="56.098" cy="56.097" r="56.098"/>
                    <g>
                      <path style="fill:#000000;" d="M89.616,60.611v23.128H76.207V62.161c0-5.418-1.936-9.118-6.791-9.118
                      c-3.705,0-5.906,2.491-6.878,4.903c-0.353,0.862-0.444,2.059-0.444,3.268v22.524H48.684c0,0,0.18-36.546,0-40.329h13.411v5.715
                      c-0.027,0.045-0.065,0.089-0.089,0.132h0.089v-0.132c1.782-2.742,4.96-6.662,12.085-6.662
                      C83.002,42.462,89.616,48.226,89.616,60.611L89.616,60.611z M34.656,23.969c-4.587,0-7.588,3.011-7.588,6.967
                      c0,3.872,2.914,6.97,7.412,6.97h0.087c4.677,0,7.585-3.098,7.585-6.97C42.063,26.98,39.244,23.969,34.656,23.969L34.656,23.969z
                      M27.865,83.739H41.27V43.409H27.865V83.739z"/>
                    </g>
                  </g>
                  </a>
              </span>
              <?php endif; ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row text-muted pl-5 text-center">
      <small><?php echo $nombrePagina;?> Rif: J-296302197 &copy; 2019. Todos los derechos reservados.</small>
      <span class="ml-auto pr-5">Diseñado y Desarrollado por <a class="enlace" href="http://eutuxia.org.ve" target="_blank">Eutuxia Web</a>.</span>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <a class="mb-1 enlace2" href="<?php echo $root_folder;?>/index.php">
        <img class="p-0 m-0" width="20px" src="<?php echo $root_folder;?>/admin/img/<?php echo $imageLogo;?>">
        <?php echo $nombrePagina;?>.</a>
    </div>
  </div>
</footer>
