<?php
/*
 * Template Name: Home
 */
  get_header();
?>

    <div id="content">

      <div class="carrusel">

        <div class="clip">
          <ul class="items clear">
            <li>
              <img src="http://lorempixel.com/403/165/" alt="" />
              <a href="">948 millones de facturación en 2011</a>
            </li>
            <li>
              <img src="http://lorempixel.com/403/165/" alt="" />
              <a href="">948 millones de facturación en 2011</a>
            </li>
            <li>
              <img src="http://lorempixel.com/403/165/" alt="" />
              <a href="">948 millones de facturación en 2011</a>
            </li>
            <li>
              <img src="http://lorempixel.com/403/165/" alt="" />
              <a href="">948 millones de facturación en 2011</a>
            </li>
          </ul>
        </div>

        <div class="paginacion">
          <ul>
            <li><a href="" class="activo">ir a página 1</a></li>
            <li><a href="">ir a elemento 2</a></li>
            <li><a href="">ir a elemento 3</a></li>
            <li><a href="">ir a elemento 4</a></li>
          </ul>
        </div>
        <div class="navegacion jcarousel-scroll">
          <a href="" class="next">siguiente elemento</a>
          <a href="" class="prev oculto">anterior elemento</a>
        </div>


      </div>

      <div class="clear">
        <div id="innerContentCol">


          <div class="areasEuropac roundModule">

            <ul>
              <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_residuos.jpg" alt="" width="348" height="126" />
                <a href="">GESTIÓN INTEGRAL DE <strong>RESIDUOS</strong></a>
              </li>
              <li class="c2">
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_explotaciones.jpg" alt="" width="195" height="112" />
                <a href="">GESTIÓN DE <strong>EXPLOTACIONES FORESTALES</strong></a>
              </li>
              <li>
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_papel.jpg" alt="" width="188" height="117" />
                <a href=""><strong>PAPEL</strong></a>
              </li>
              <li class="c2">
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_embalajes.jpg" alt="" width="170" height="125" />
                <a href=""><strong>CARTÓN</strong> Y <strong>EMBALAJE</strong></a>
              </li>
              <li class="wide">
                <img src="<?php echo get_template_directory_uri(); ?>/img/img_inno.jpg" alt="" width="69" height="101" />
                <a href=""><strong>INNOVACIÓN</strong></a>
              </li>
            </ul>

          </div>

          <div class="grid2 clear roundModule">

            <div class="flt">
              <img src="<?php echo get_template_directory_uri(); ?>/img/img_modHome.png" alt="" />
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_modHome.png" alt="europac" class="logo" width="170" height="50" />
              <div class="wrap">
                <h2 class="title"><a href="">Proin molestie lorem ut est sodales mattis.</a></h2>
                <p>lorem ut est sodales mattis. Proin molestie </p>
              </div>
            </div>

            <div class="frt">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_europac-re.png" alt="europac recicla" width="131" height="164" />
              <div class="wrap">
                <h2 class="title"><a href="">Destrucción de información confidencial</a></h2>
                <p>Proin molestie lorem ut est sodales mattis. </p>
              </div>
            </div>


          </div>




        </div>

        <aside id="colLateral">

          <section class="modBolsa roundModule">

            <h2 class="title">Accionistas e <span>inversores</span></h2>

            <h3 class="subTit">Última Cotización</h3>

            <div class="clear">
              <span class="date"><time>01/10/2012 13:39 </time></span>
              <span class="cot"><span class="pos"><strong>1,970 €</strong></span></span>
            </div>

            <!-- <div class="clear">
              <span class="date"><time>01/10/2012 13:39 </time></span>
              <span class="cot"><span class="neg"><strong>-1,970 €</strong></span></span>
            </div> -->

            <h3 class="subTit">Evolución del Grupo Europac</h3>
            <img src="http://lorempixel.com/181/107/" alt="" />


          </section>

          <section class="modActualidad roundModule">

            <h2 class="title">Actualidad Europac</h2>
            <ul>
              <li>
                <img src="http://lorempixel.com/35/35/" alt="" />
                <div class="desc">
                  <h3 class="title"><a href="">Primer Trimestre 2012</a></h3>
                  <a href="">Aenean sit amet commodo sem. Nunc hendrerit, mauris </a>
                </div>
              </li>
              <li>
                <img src="http://lorempixel.com/35/35/" alt="" />
                <div class="desc">
                  <h3 class="title"><a href="">Primer Trimestre 2012</a></h3>
                  <a href="">Aenean sit amet commodo sem. Nunc hendrerit, mauris </a>
                </div>
              </li>
            </ul>
            <span class="more"><a href="">Más noticias &rsaquo;</a></span>


          </section>

          <section class="modNewsletter roundModule">
            <div class="msgError">
              <p>Se ha producido un error</p>
            </div>
            <form action="" method="post">
              <fieldset>
                <legend><span>¿Quiere recibir información del grupo Europac?</span></legend>
                <label for="lbRecibir" class="indentado">Dirección de correo</label>
                <input type="text" id="lbRecibir" name="lbRecibir" placeholder="Dirección de correo" />
                <input type="submit" value="Enviar" />
              </fieldset>
            </form>

          </section>





        </aside>

      </div>

<?php
  get_footer();
?>
