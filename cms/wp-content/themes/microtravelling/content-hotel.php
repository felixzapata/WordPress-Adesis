


	<?php

			$title = get_the_title();
			$link = get_permalink();
			$id = get_the_ID();
			$imgPie = get_post_meta($id, "_img_pie", true);
			$imgPie2 = get_post_meta($id, "_img_pie2", true);
			$imgPie3 = get_post_meta($id, "_img_pie3", true);
			$urlConsultarMasHoteles = get_post_meta($id, "_txt", true); 

  
		    $args = array(  
		        'post_parent'    => $id,            // For the current post  
		        'post_type'      => 'attachment',        // Get all post attachments  
		        'post_mime_type' => 'image',         // Only grab images  
		        'order'          => 'ASC',               // List in ascending order  
		        'orderby'        => 'menu_order',        // List them in their menu order  
		        'numberposts'    => -1,                  // Show all attachments  
		        'post_status'    => null,                // For any post status  
    		);  


	 ?>
	
		<span class="name"><?php echo $title ?></span>
	
		<div id="img">

			<?php 
				// Retrieve the items that match our query; in this case, images attached to the current post.  
				$attachments = get_posts($args);  
  
    			// If any images are attached to the current post, do the following:  
    			if ($attachments) {   
  
        		// Initialize a counter so we can keep track of which image we are on.  
        		$count = 0;  
  
        		// Now we loop through all of the images that we found  
        		foreach ($attachments as $attachment) { 

					if($count == 0) { ?>
					
					<!-- Set the parameters for the image we are about to display. -->
					<?php $default_attr = array(
							'id' 	=> "ig-hero",
							'alt'   => trim(strip_tags( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) )),
							'title' => trim(strip_tags( $attachment->post_title )),
						);
					?>

					<!-- Display the first image attachment as the large image in the main gallery area -->
					<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $default_attr); ?>

				
					<ul id="carrusel">
				<?php } ?>
					<li>
						
								<?php if ($count==0) {

									
									$thumb_attr = array(
										'class' => "thumb selected",
									);

								} else {

								
									$thumb_attr = array(
										'class' => "thumb",
									);

								} ?>
					
							
							<?php //echo wp_get_attachment_image($attachment->ID, array(48,48), false, $thumb_attr); ?>
							<?php echo wp_get_attachment_image($attachment->ID, 'hotel-detalle-thumb', false, $thumb_attr); ?>
			
						</li>															
					
				<?php $count = $count + 1; } 

				} ?>
					
				</ul>	
			</div>

			
		
		
		
		<div id="content">
		

			 <img src="<?php echo $imgPie3; ?>" alt="<?php echo $title; ?>" class="hotel" />
		
			<div class="wysiwyg" align="justify">
			
			
			<?php the_content() ?>
			
			
			</div>
			
			
			<span class="btn"><a href="<?php echo $urlConsultarMasHoteles; ?>" target="_blank">Consulta aqu&iacute; m&aacute;s hoteles</a></span>
		
		
		</div>
	
	
	

