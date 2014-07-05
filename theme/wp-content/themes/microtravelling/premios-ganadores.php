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
						<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'travel' ) . '</span>', 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

	
					<?php edit_post_link( __( 'Edit', 'travel' ), '<span class="edit-link">', '</span>' ); ?>

				<?php endwhile; ?>

				

			

			<?php endif; ?>

		</div>	

<?php get_sidebar("navBar"); ?>

<?php get_footer("corto"); ?>

	
