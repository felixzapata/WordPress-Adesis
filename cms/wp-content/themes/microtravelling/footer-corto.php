<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 
 */
?>

	</div><!-- #bodyContent -->

	<div id="footer">
	
		<p>Puedes ganar una estancia en una de las marcas Meli&aacute; Hotels International:</p>
		<?php

				$params=array(				
					'post_type'=>'hotel',
					'orderby' => 'menu_order',	
					'order' => 'ASC',
				);
				$wp_query = new WP_Query($params); 
				if ( $wp_query->have_posts() ) {  ?>
		
				<ul>
					<?php while ( $wp_query->have_posts() ) {
						$wp_query->the_post(); 
						$title = get_the_title();
						$link = get_permalink();
						$id = get_the_ID();
						$imgPie = get_post_meta($id, "_img_pie", true);
						$imgPie2 = get_post_meta($id, "_img_pie2", true); 
		
					?>
					<li>
						<a href="<?php echo $link; ?>" class="hotel lightbox"><img src="<?php echo $imgPie; ?>" alt="<?php echo $title ?>" /></a>
						
					</li>
					<?php } ?>
				
				</ul>
				<?php } ?>
        
		
		<div class="clearFix">
		
			<span class="flt">Bases depositadas ante notario y a tu disposici&oacute;n <a href="bases.html" class="lightbox">aqu&iacute;</a><br /><br />Copy Right AIR MILES ESPAÑA, S.A. 2012. Todos los derechos reservados.<br>
    Está prohibida la utilización y reproducción o copia del contenido parcial o total de este Sitio Web.</span>
			<div class="frt">
					S&iacute;guenos en: <a href="https://www.travelclub.es/redireccion_patros3.cfm?CODANALISIS=haz_traveling_2012_fb&NOMBRE_URL=http%3A//www.facebook.com/travelclub.es" target="_blank" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/img/ico_f.png" alt="Síguenos en Facebook" /></a> <a href="https://www.travelclub.es/redireccion_patros3.cfm?CODANALISIS=haz_traveling_2012_tw&NOMBRE_URL=http%3A//www.twitter.com/travelclub_es" target="_blank" title="Twitter"><img src="img/ico_t.png" alt="Síguenos en Twitter" /></a> 
				
				<!-- plugin compartir en Facebook -->
	<iframe src="http://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.travelclub.es%2Fhaztraveling%2F&amp;send=false&amp;layout=button_count&amp;width=125&amp;show_faces=true&amp;action=recommend&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:125px; height:21px; margin-left:30px" allowTransparency="true"></iframe>


				<!-- plugin twittear -->	
	<a href="http://twitter.com/share" class="twitter-share-button" data-url="https://www.travelclub.es/haztraveling/" data-text="@travelclub_es Haz Traveling y ll&eacute;vate una estancia en Meli&aacute; Hotels International de Espa&ntilde;a y Europa." data-width="80px" data-lang="es" data-align="right">Twittear</a>
	
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			</div>
		
		</div>



<?php wp_footer(); ?>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.innerfade.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
	

</body>
</html>