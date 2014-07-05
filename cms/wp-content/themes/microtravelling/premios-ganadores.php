<?php
/**
 * Template Name: Premios y Ganadores
 
 */
get_header(); ?>

		<div id="content" class="wide">

			<?php if ( have_posts() ) : ?>

				<h1 class="subTitle"><span><? the_title(); ?></span></h1>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="entry-content wysiwyg">
						<?php the_content(); ?>
						
					</div>
				<?php endwhile; ?>

		
			<?php endif; ?>	

					<?php

						$params=array(				
							'post_type'=>'sorteo',
							'orderby' => 'menu_order',	
							'order' => 'ASC',
						);
						$wp_query = new WP_Query($params); 
						$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"); 
						if ( $wp_query->have_posts() ) {  ?>
							<ul id="ganadores">
							<?php while ( $wp_query->have_posts() ) {
									$wp_query->the_post(); 
									$title = get_the_title();
									$link = get_permalink();
									$id = get_the_ID();
									$fech = get_post_meta($id, "_fech", true);
									$fechPro = get_post_meta($id, "_fechPro", true);
									$listGanadores = get_post_meta($id, "_list", true);
									$finalizado = get_post_meta($id, "_p_prot", true);

									$mo = explode("/", $fech);
									$mes = $meses[intval($mo[1]) - 1];

									if ($finalizado == "on") {
										if ($listGanadores == "on") { ?>	
								
											<li>
												<a href="<?php echo $link; ?>" class="mes lightbox"><?php echo $mes ?></a>
												<div class="img">
													<a href="<?php echo $link; ?>" class="lightbox"><?php the_post_thumbnail(); ?></a>
													<div class="text">Consulta aqu&iacute; los ganadores</div>
												</div>
											</li>

							<?php
										} else { ?>

											<li class="none">
												<span class="mes"><?php echo $mes ?></span>
												<div class="img next">
													<div class="text"><?php the_post_thumbnail(); ?></div>
													<div class="text2">Sorteo celebrado el <?php echo $fech; ?> <br />¡Muy pronto publicaremos los ganadores!</div>
												</div>
											</li>
								<?php }
									}else{ ?> 
									<li class="none">
										<span class="mes"><?php echo $mes ?></span>
										<div class="img next">
											
											<div class="text"><?php the_post_thumbnail(); ?></div>
											<div class="text2">Pr&oacute;ximo sorteo: <br /><?php echo $fechPro ?></div>
										</div>
									</li>
									<?php } ?>	
						<?php 
							} ?>
							</ul>
						<?php } 
					?>

	

		</div>	

<?php get_sidebar("navBar"); ?>

<?php get_footer("corto"); ?>

	
