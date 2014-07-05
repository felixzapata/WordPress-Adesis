<?php


get_header("lightbox"); ?>

<div id="wrapper">

				<?php while ( have_posts() ) : the_post(); ?>

					

					<?php get_template_part( 'content', 'sorteo' ); ?>

					

				<?php endwhile; // end of the loop. ?>


</div><!-- #wrapper -->

<?php get_footer("lightbox"); ?>