<?php
/*
Plugin Name: Haz Traveling
Description: Útiles y configuración para Haz Traveling de TravelClub
Version: 1.0
Author: Félix Zapata	
Author URI: http://www.meetup.com/WordPress-Madrid/
Author Email: madridwordpress@gmail.com
License:

*/

class HazTraveling {

/*--------------------------------------------*
* Constructor
*--------------------------------------------*/

/**
* Initializes the plugin by setting localization, filters, and administration functions.
*/
function __construct() {


register_activation_hook( __FILE__, array( &$this, 'activate' ) );
register_deactivation_hook( __FILE__, array( &$this, 'deactivate' ) );


add_action( 'init', array( $this, 'register_post_types' ) );
add_action( 'add_meta_boxes', array( $this, 'post_options' ) );
add_action( 'save_post', array( $this, 'post_options_save' ) );
add_action( 'admin_print_styles-post.php', array( $this, 'post_options_estilos' ) );
add_action( 'admin_print_styles-post-new.php', array( $this, 'post_options_estilos' ) );
add_action( 'admin_init', array( $this, 'add_post_options_meta_styles' ) );
add_action( 'admin_print_scripts-post.php', array( $this, 'add_post_options_scripts' ) );
add_action( 'admin_print_scripts-post-new.php', array( $this, 'add_post_options_scripts' ) ) ;


//add_filter( 'TODO', array( $this, 'filter_method_name' ) );

} // end constructor

/**
* Fired when the plugin is activated.
*
* @params $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
*/
function activate( $network_wide ) {	
	//global $wp_rewrite;
	//add_rewrite_endpoint( 'send', EP_PAGES | EP_PERMALINK | EP_ROOT );  
	//$wp_rewrite->flush_rules();
	flush_rewrite_rules();

} // end activate

/**
* Fired when the plugin is deactivated.
*
* @params $network_wide True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
*/
function deactivate( $network_wide ) {
	remove_action( 'init', array( $this, 'register_post_types' ));	

} // end deactivate




/*--------------------------------------------*
* Core Functions
*---------------------------------------------*/

function register_post_types() {
  $labels = array(
    'name' => _x('Hoteles', 'post type general name'),
    'singular_name' => _x('Hotel', 'post type singular name'),
    'add_new' => _x('Añadir un hotel', 'hotel'),
    'add_new_item' => __('Añadir un hotel'),
    'edit_item' => __('Editar hotel'),
    'new_item' => __('Nuevo hotel'),
    'all_items' => __('Todos los hoteles'),
    'view_item' => __('Ver hotel'),
    'search_items' => __('Buscar hoteles'),
    'not_found' =>  __('No se han encontrado hoteles'),
    'not_found_in_trash' => __('No se han encontrado hoteles en la papelera'), 
    'parent_item_colon' => '',
    'menu_name' => 'Hoteles'

  );

  $labelsSorteos = array(
    'name' => _x('Sorteos', 'post type general name'),
    'singular_name' => _x('Sorteo', 'post type singular name'),
    'add_new' => _x('Añadir un sorteo', 'sorteo'),
    'add_new_item' => __('Añadir un sorteo'),
    'edit_item' => __('Editar sorteo'),
    'new_item' => __('Nuevo sorteo'),
    'all_items' => __('Todos los sorteos'),
    'view_item' => __('Ver sorteo'),
    'search_items' => __('Buscar sorteos'),
    'not_found' =>  __('No se han encontrado sorteos'),
    'not_found_in_trash' => __('No se han encontrado sorteos en la papelera'), 
    'parent_item_colon' => '',
    'menu_name' => 'Sorteos'

  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  ); 

 $argsSorteos = array(
    'labels' => $labelsSorteos,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
  ); 

  register_post_type('hotel',$args);
  register_post_type('sorteo',$argsSorteos);	

  
     
} 

function post_options(){
	add_meta_box('post_options', 'Contenidos propios del hotel', array( $this, 'post_options_init'), 'hotel', 'normal', 'high');
	add_meta_box('post_options', 'Datos adicionales del sorteo', array( $this, 'post_options_sorteo_init'), 'sorteo', 'normal', 'high');
}

function post_options_init($post){
	
	$txt = esc_html(get_post_meta($post->ID,"_txt",true)); 	
	$imgPie = get_post_meta($post->ID,"_img_pie",true);
	$imgPie2 = get_post_meta($post->ID,"_img_pie2",true);
	$imgPie3 = get_post_meta($post->ID,"_img_pie3",true);

?>

	<p> 	  
	 <label for="imgPie3">Imagen para el logotipo del detalle del hotel:</label>
	 <input type="text" id="imgPie3" name="imgPie3" value="<?php echo esc_url($imgPie3) ?>" size="90" />
	 <input type="button" id="subir_imagen_modulo3" value="Subir imagen para el logotipo del detalle del hotel" class="button_secundary" />
	</p> 
	
	<p> 	  
	 <label for="txt">Url de consulta de más hoteles:</label>
	 <input id="txt" class="text" name="txt" value="<?php echo $txt; ?>" />
	</p> 
	<p> 	  
	 <label for="imgPie">Imagen para el logotipo del pie de la página:</label>
	 <input type="text" id="imgPie" name="imgPie" value="<?php echo esc_url($imgPie) ?>" size="90" />
	 <input type="button" id="subir_imagen_modulo" value="Subir imagen para el logotipo del pie" class="button_secundary" />
	</p> 

	<p> 	  
	 <label for="imgPie2">Imagen para la imagen del pie de la página:</label>
	 <input type="text" id="imgPie2" name="imgPie2" value="<?php echo esc_url($imgPie2) ?>" size="90" />
	 <input type="button" id="subir_imagen_modulo2" value="Subir imagen para el pie" class="button_secundary" />
	</p> 
	
<?php
}

function post_options_sorteo_init($post){
	$fech = esc_html(get_post_meta($post->ID,"_fech",true)); 
	$fechPro = esc_html(get_post_meta($post->ID,"_fechPro",true)); 	
	$pPro = get_post_meta($post->ID, "_p_prot", true);
	$list = get_post_meta($post->ID, "_list", true);
?>

	<p class="chk">
	 <label for="pPro">Sorteo finalizado:</label>
	 <?php if($pPro == "on"){ ?>
	 <input type="checkbox" id="pPro" name="pPro" checked="checked" value="on" />
	 <?php }else{ ?>
	 <input type="checkbox" id="pPro" name="pPro" value="off" />
	 <?php } ?>
	</p> 

	<p class="chk">
	 <label for="list">Listado ganadores disponibles:</label>
	 <?php if($list == "on"){ ?>
	 <input type="checkbox" id="list" name="list" checked="checked" value="on" />
	 <?php }else{ ?>
	 <input type="checkbox" id="list" name="list" value="off" />
	 <?php } ?>
	</p> 
	
	<p> 	  
	 <label for="fech">Fecha celebración sorteo:</label>
	 <input id="fech" class="text" name="fech" value="<?php echo $fech; ?>" placeholder="dd/mm/aaaa" />
	</p> 
	<p> 	  
	 <label for="fechPro">Fecha celebración próximo sorteo:</label>
	 <input id="fechPro" class="text" name="fechPro" value="<?php echo $fechPro; ?>" placeholder="dd/mm/aaaa" />
	</p> 
<?php 
}

function post_options_save($post_id){
	
	if(isset($_POST["list"])){		
		update_post_meta($post_id,"_list","on");
	}else{
		update_post_meta($post_id,"_list","off");
	}
	if(isset($_POST["pPro"])){		
		update_post_meta($post_id,"_p_prot","on");
	}else{
		update_post_meta($post_id,"_p_prot","off");
	}
	if(isset($_POST["fech"])){
		update_post_meta($post_id,"_fech",esc_textarea($_POST["fech"]));
	}
	if(isset($_POST["fechPro"])){
		update_post_meta($post_id,"_fechPro",esc_textarea($_POST["fechPro"]));
	}


	if(isset($_POST["txt"])){
		update_post_meta($post_id,"_txt",esc_textarea($_POST["txt"]));
	}
	if(isset($_POST["imgPie"])){
		update_post_meta($post_id,"_img_pie",esc_url_raw($_POST["imgPie"]));
	}
	if(isset($_POST["imgPie2"])){
		update_post_meta($post_id,"_img_pie2",esc_url_raw($_POST["imgPie2"]));
	}
	if(isset($_POST["imgPie3"])){
		update_post_meta($post_id,"_img_pie3",esc_url_raw($_POST["imgPie3"]));
	}
	
}


function add_post_options_scripts(){
	wp_enqueue_script( 'img-pie',  plugins_url( 'haztraveling/js/img-pie.js' ), array( 'jquery','media-upload','thickbox' ) );
}

function add_post_options_meta_styles(){
	wp_register_style( 'mod_lateral_meta_styles', plugins_url( 'haztraveling/css/post-options.css' ) );
}

function post_options_estilos(){
	wp_enqueue_style("thickbox");
	wp_enqueue_style("mod_lateral_meta_styles");
}

}
new HazTraveling();
?>
