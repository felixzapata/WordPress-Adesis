<?php
/*
Template Name: Inicio
*/

get_header(); ?>

		<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			

			<div class="text">

                      <div style="width:240px; display:inline; float:left;"><?php the_content() ?></div>
					  

            </div>

<?php 



			$title = get_the_title();
			$link = get_permalink();
			$id = get_the_ID();
			$imgPie = get_post_meta($id, "_img_pie", true);
			$imgPie2 = get_post_meta($id, "_img_pie2", true);
			$imgPie3 = get_post_meta($id, "_img_pie3", true);
			$urlConsultarMasHoteles = get_post_meta($id, "_txt", true); 

  
		    $args = array(  
		        'post_parent'    => $post->ID,            // For the current post  
		        'post_type'      => 'attachment',        // Get all post attachments  
		        'post_mime_type' => 'image',         // Only grab images  
		        'order'          => 'ASC',               // List in ascending order  
		        'orderby'        => 'menu_order',        // List them in their menu order  
		        'numberposts'    => -1,                  // Show all attachments  
		        'post_status'    => null,                // For any post status  
    		);  


    		$attachments = get_posts($args);  
  
    			// If any images are attached to the current post, do the following:  
    			if ($attachments) {   
  
        		// Initialize a counter so we can keep track of which image we are on.  
        		
				$thumb_attr = array(
					'class' => "thumb",
				);


        		?>


			<div class="fadeImages">
				<ul>

  <?php 
        		// Now we loop through all of the images that we found  
        			foreach ($attachments as $attachment) { 



?>

					<li><?php echo wp_get_attachment_image($attachment->ID, 'full', false, $thumb_attr); ?></li>

<?php 
					}
				}
?>					
				</ul>
				
			</div>	

	<?php endwhile ?>		


			</div><!-- #content -->
		

<?php get_sidebar("navBar"); ?>
<?php get_footer(); ?>