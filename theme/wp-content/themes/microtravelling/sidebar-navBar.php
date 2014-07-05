<?php
/**
 * The Sidebar containing the main widget area.
 
 */
?>


<div id="navBar">
	<?php 
		//wp_nav_menu( array( 'menu' => 'principal' ) );



						$menu_items = wp_get_nav_menu_items("3"); // items del menú principal
						
						$menu_list = '<ul>';
						
						foreach ( (array) $menu_items as $key => $menu_item ) {
							$title = $menu_item->title;
							$url = $menu_item->url;

							$menu_list .= "<li>";	
							if ($post->ID != $menu_item->object_id ) {
								$menu_list .= '<a href="' . $url . '"><span>' . $title . '</span></a>';
							}else{
								$menu_list .= '<span><span>' . $title . '</span></span>';
							}
							$menu_list .= "</li>";
						}
						$menu_list .= '</ul>';
						
						echo $menu_list;




	?>
</div>