<?php
include '/common/conexion.php';
$facebook="";
$twitter="";
$linkedin="";
$instagram="";
$sql="SELECT * FROM `CONFIGURACION`";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    if($row['ATRIBUTO']=="facebook"){
      $facebook=$row['VALOR'];
    }else if($row['ATRIBUTO']=="twitter"){
      $twitter=$row['VALOR'];
    }else if($row['ATRIBUTO']=="linkedin"){
      $linkedin=$row['VALOR'];
    }else if($row['ATRIBUTO']=="instagram"){
      $instagram=$row['VALOR'];
    }
  }
}
 ?>
<section class="container-fluid pt-3 pb-1" style="background-color: #21325b">
  <div class="container px-5 px-sm-0 px-md-3 px-lg-5">
    <div class="row px-4 mb-2">
      <div class="col-12 col-md-6 col-lg-3">
        <div class="row justify-content-center justify-content-md-start">
          <h6 class="title_footer_ppal pt-1">Eurochem</h6>
        </div>
        <div class="row pr-4 mt-2">
          <p class="text-center text-md-left" style="color:#fff;opacity:0.7;">Comercializamos
            materias primas para la industria, generando valor para proveedores,
            clientes, empleados y accionistas.</p>
        </div>
        <div class="row">
          <div class="col-12 text-center text-md-left mt-4 mt-sm-0">
            <?php if ($facebook!=""): ?>
              <a class="enlace_footer mr-2" href="<?php echo $facebook;?>" target="_blank">
                <svg style="max-height:2rem;" aria-hidden="true" width="25px" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>
              </a>
            <?php endif; ?>
            <?php if ($instagram!=""): ?>
              <a class="enlace_footer mr-2" href="<?php echo $instagram;?>" target="_blank">
                <svg style="max-height:2rem;" aria-hidden="true" width="25px" focusable="false" data-prefix="fab" data-icon="instagram-square" class="svg-inline--fa fa-instagram-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"></path></svg>
              </a>
            <?php endif; ?>
            <?php if ($linkedin!=""): ?>
              <a class="enlace_footer mr-2" href="<?php echo $instagram;?>" target="_blank">
                <svg style="max-height:2rem;" aria-hidden="true" width="25px" focusable="false" data-prefix="fab" data-icon="linkedin" class="svg-inline--fa fa-linkedin fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
              </a>
            <?php endif; ?>
            <?php if ($twitter!=""): ?>
              <a class="enlace_footer mr-2" href="<?php echo $twitter;?>" target="_blank">
                <svg style="max-height:2rem;" aria-hidden="true" width="25px" focusable="false" data-prefix="fab" data-icon="twitter-square" class="svg-inline--fa fa-twitter-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"></path></svg>
              </a>
            <?php endif; ?>
            <a class="enlace_footer mr-2" href="https://wa.me/5211234567890?texto=Buen%20dia" target="_blank">
              <svg style="max-height:2rem;" aria-hidden="true" width="25px" focusable="false" data-prefix="fab" data-icon="whatsapp-square" class="svg-inline--fa fa-whatsapp-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 122.8c-72.7 0-131.8 59.1-131.9 131.8 0 24.9 7 49.2 20.2 70.1l3.1 5-13.3 48.6 49.9-13.1 4.8 2.9c20.2 12 43.4 18.4 67.1 18.4h.1c72.6 0 133.3-59.1 133.3-131.8 0-35.2-15.2-68.3-40.1-93.2-25-25-58-38.7-93.2-38.7zm77.5 188.4c-3.3 9.3-19.1 17.7-26.7 18.8-12.6 1.9-22.4.9-47.5-9.9-39.7-17.2-65.7-57.2-67.7-59.8-2-2.6-16.2-21.5-16.2-41s10.2-29.1 13.9-33.1c3.6-4 7.9-5 10.6-5 2.6 0 5.3 0 7.6.1 2.4.1 5.7-.9 8.9 6.8 3.3 7.9 11.2 27.4 12.2 29.4s1.7 4.3.3 6.9c-7.6 15.2-15.7 14.6-11.6 21.6 15.3 26.3 30.6 35.4 53.9 47.1 4 2 6.3 1.7 8.6-1 2.3-2.6 9.9-11.6 12.5-15.5 2.6-4 5.3-3.3 8.9-2 3.6 1.3 23.1 10.9 27.1 12.9s6.6 3 7.6 4.6c.9 1.9.9 9.9-2.4 19.1zM400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zM223.9 413.2c-26.6 0-52.7-6.7-75.8-19.3L64 416l22.5-82.2c-13.9-24-21.2-51.3-21.2-79.3C65.4 167.1 136.5 96 223.9 96c42.4 0 82.2 16.5 112.2 46.5 29.9 30 47.9 69.8 47.9 112.2 0 87.4-72.7 158.5-160.1 158.5z"></path></svg>
            </a>
          </div>
        </div>
      </div>
      <div class="d-none d-md-block col-md-6 col-lg-3 mt-4 mt-sm-0">
        <div class="row justify-content-center justify-content-sm-start">
          <h6 class="title_footer pt-3">Políticas y Privacidad</h6>
        </div>
        <div class="row justify-content-center justify-content-sm-start mt-2">
          <a class="enlace_footer mb-2" href="/es/proteccion/">Protección de datos</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/politicas/">Políticas de quejas y reclamos</a>
        </div>
      </div>
      <div class="d-none d-md-block col-md-6 col-lg-3 text-center text-sm-left mt-4 mt-sm-0">
        <div class="row justify-content-center justify-content-sm-start">
          <h6 class="title_footer pt-3">Contáctenos</h6>
        </div>
        <div class="row justify-content-center justify-content-sm-start mt-2 align-items-center">
          <a class="enlace_footer mb-2" href="tel:1-786-702-9996">
            <svg style="max-height:1rem;" class="mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" class="svg-inline--fa fa-phone-alt fa-w-16" width="14px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg>
             +1 786 702 9996
           </a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer mb-2" href="mailto:info@eurochemus.com">
            <svg style="max-height:1rem;" class="mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" width="14px" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
            info@eurochemus.com
          </a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer mb-2" href="/es/contacto/">
            <svg style="max-height:1rem;" class="mr-2" aria-hidden="true" width="14" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>
            Nuestras sedes
          </a>
        </div>
      </div>
      <div class="d-none d-md-block col-md-6 col-lg-3 text-center text-sm-left mt-4 mt-sm-0">
        <div class="row justify-content-center justify-content-sm-start">
          <h6 class="title_footer pt-3">Mapa del sitio</h6>
        </div>
        <div class="row justify-content-center justify-content-sm-start mt-2">
          <a class="enlace_footer" href="/es/productos/index.php?productos=1">Divisiones</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/productos/index.php?industrias=1">Industrias</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/certificaciones/">Certificaciones</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/actualidad/">Actualidad</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/trabaje/">Trabaje con Nosotros</a>
        </div>
        <div class="row justify-content-center justify-content-sm-start">
          <a class="enlace_footer" href="/es/nuestra_compania/">Nuestra Compañia</a>
        </div>
      </div>
    </div>
    <div class="row px-5 justify-content-center">
      <small class="mb-3" style="color:#fff;opacity:0.4;">Eurochem. Todos los derechos reservados 2020.</small>
    </div>
  </div>
</section>
