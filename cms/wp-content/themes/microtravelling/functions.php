<?php
/**
  *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'travel_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run travel_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'travel_setup' );

if ( ! function_exists( 'travel_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override travel_setup() in a child theme, add your own travel_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * 
 */
function travel_setup() {

	/* Make Twenty Eleven available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Eleven, use a find and replace
	 * to change 'travel' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'travel', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();


	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'travel' ) );
	

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	


	// The next four constants set how Twenty Eleven supports custom headers.

	// The default header text color
	define( 'HEADER_TEXTCOLOR', '000' );

	// By leaving empty, we allow for random image rotation.
	define( 'HEADER_IMAGE', '' );

	// The height and width of your custom header.
	// Add a filter to travel_header_image_width and travel_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'travel_header_image_width', 1000 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'travel_header_image_height', 288 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add Twenty Eleven's custom image sizes
	add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
	add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist


	add_image_size( 'hotel-detalle-thumb', 48, 48, true );
	



}
endif; // travel_setup


/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function travel_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'travel_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function travel_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'travel' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and travel_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function travel_auto_excerpt_more( $more ) {
	return ' &hellip;' . travel_continue_reading_link();
}
add_filter( 'excerpt_more', 'travel_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function travel_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= travel_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'travel_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function travel_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'travel_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * 
 */
function travel_widgets_init() {


	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'travel' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'travel_widgets_init' );

if ( ! function_exists( 'travel_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function travel_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'travel' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'travel' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'travel' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // travel_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * 
 * @return string|bool URL or false when no link is present.
 */
function travel_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}



if ( ! function_exists( 'travel_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own travel_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * 
 */
function travel_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'travel' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'travel' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'travel' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'travel' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'travel' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'travel' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'travel' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for travel_comment()

if ( ! function_exists( 'travel_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own travel_posted_on to override in a child theme
 *
 * 
 */
function travel_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'travel' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'travel' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * 
 */
function travel_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'travel_body_classes' );

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );
remove_action( 'personal_options', '_admin_bar_preferences' );

/* quitar versión de WP de páginas y RSS */

function wpbeginner_remove_version() { return ''; }
add_filter('the_generator', 'wpbeginner_remove_version');

/* fin quitar versión de WP de páginas y RSS */

/* quitar menu de entradas en el panel */
add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
	remove_menu_page('edit.php');
	remove_menu_page('edit-comments.php');
	remove_menu_page('link-manager.php');
}
/* fin quitar menu de entradas en el panel */

