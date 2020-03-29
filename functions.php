<?php
/**
 * majadc_coffee functions and definitions
 *
 * @package majadc_coffee
 */
// Set content-width.
global $content_width;
if ( ! isset( $content_width ) ) {
	$content_width = 580;
}
 

if ( ! function_exists( 'majadc_coffee_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function majadc_coffee_setup() {

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on majadc_coffee, use a find and replace
		* to change 'majadc_coffee' to the name of your theme in all the template files
		*/
		load_theme_textdomain( 'majadc_coffee', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		//add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'majadc_coffee' ),
		) );

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/*
		* Enable support for Post Formats.
		* See http://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );
	}
	endif; // majadc_coffee_setup
add_action( 'after_setup_theme', 'majadc_coffee_setup' );




function add_my_favicon() {
   $favicon_path = get_template_directory_uri() . '/favicon.ico';

   echo '<link rel="shortcut icon" href="' . $favicon_path . '" />';
}

add_action( 'wp_head', 'add_my_favicon' ); //front end
add_action( 'admin_head', 'add_my_favicon' ); //admin end

function majadc_coffee_filter_image_sizes( $sizes) {
	unset( $sizes['large']);
	unset( $sizes['medium']);
	unset( $sizes['thumbnail']);
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'majadc_coffee_filter_image_sizes'); 
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function majadc_coffee_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'majadc_coffee' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'majadc_coffee_widgets_init' );


// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

//Custom post type function
function create_posttype () {
	$argsTravelCards = array(
		'labels' => array(
			'name' => __( 'Travel Cards' ),
			'singular_name' => __( "Travel Card" ), 
		),
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revision' ),
		'public' => true,
		'has_archive' => true,
		'rewrite' => array( 'slug' => 'travel_card'),
		'show_in_rest' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'exclude_from_search' => true,
		'menu_icon' => 'data:image/svg+xml;base64,PCEtLSBHZW5lcmF0ZWQgYnkgSWNvTW9vbi5pbyAtLT4KPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMyIiB2aWV3Qm94PSIwIDAgMzMgMzIiPgo8c3R5bGU+LmNscy0xe2ZpbGw6bm9uZTtzdHJva2U6I2ZmZjs8L3N0eWxlPgo8dGl0bGU+cGljdHVyZXM8L3RpdGxlPgo8cGF0aCBjbGFzcz0iY2xzLTEiIGQ9Ik0xLjUgMjhoMjZjMC44MjcgMCAxLjUtMC42NzMgMS41LTEuNXYtMjVjMC0wLjgyNy0wLjY3My0xLjUtMS41LTEuNWgtMjZjLTAuODI3IDAtMS41IDAuNjczLTEuNSAxLjV2MjVjMCAwLjgyNyAwLjY3MyAxLjUgMS41IDEuNXpNMSAxLjVjMC0wLjI3NiAwLjIyNS0wLjUgMC41LTAuNWgyNmMwLjI3NSAwIDAuNSAwLjIyNCAwLjUgMC41djI1YzAgMC4yNzYtMC4yMjUgMC41LTAuNSAwLjVoLTI2Yy0wLjI3NSAwLTAuNS0wLjIyNC0wLjUtMC41di0yNXpNMTggMTFjMS4xMDMgMCAyLTAuODk3IDItMnMtMC44OTctMi0yLTItMiAwLjg5Ny0yIDIgMC44OTcgMiAyIDJ6TTE4IDhjMC41NTIgMCAxIDAuNDQ5IDEgMXMtMC40NDggMS0xIDEtMS0wLjQ0OS0xLTEgMC40NDgtMSAxLTF6TTMuNSAyM2gyMmMwLjI3NiAwIDAuNS0wLjIyNCAwLjUtMC41di0xOWMwLTAuMjc2LTAuMjI0LTAuNS0wLjUtMC41aC0yMmMtMC4yNzYgMC0wLjUgMC4yMjQtMC41IDAuNXYxOWMwIDAuMjc2IDAuMjI0IDAuNSAwLjUgMC41ek00IDIydi00LjYzOGMwLjAyMi0wLjAxNiAwLjA0Ny0wLjAyNSAwLjA2Ny0wLjA0NWw1LjExNi01LjExNmMwLjI2LTAuMjYgMC43MTItMC4yNTkgMC45NzIgMGw3LjUyMSA3LjUyMWMwLjA5OCAwLjA5OCAwLjIyNiAwLjE0NiAwLjM1NCAwLjE0NiAwLjEyNCAwIDAuMjQ4LTAuMDQ2IDAuMzQ1LTAuMTM4bDMuODY2LTMuNjcyYzAuMTMtMC4xMyAwLjMwMy0wLjIwMiAwLjQ4Ni0wLjIwMiAwLjE4NCAwIDAuMzU1IDAuMDcyIDAuNDY0IDAuMTc4bDEuODA5IDIuMDU5djMuOTA3aC0yMXpNMjUgNHYxMi41ODFsLTEuMDgxLTEuMjI4Yy0wLjMxNy0wLjMxOS0wLjc0MS0wLjQ5NS0xLjE5MS0wLjQ5NS0wLjAwMSAwLTAuMDAxIDAtMC4wMDEgMC0wLjQ1MSAwLTAuODc1IDAuMTc2LTEuMTg1IDAuNDg2bC0zLjUwNCAzLjMyOC03LjE3Ni03LjE3N2MtMC42MzktMC42MzgtMS43NDktMC42MzctMi4zODYgMGwtNC40NzYgNC40NzZ2LTExLjk3MWgyMXpNNC41IDI5LjA4M2MtMC4yNzYgMC0wLjUgMC4yMjQtMC41IDAuNXYwLjkxN2MwIDAuODI3IDAuNjczIDEuNSAxLjUgMS41aDI2YzAuODI3IDAgMS41LTAuNjczIDEuNS0xLjV2LTI2YzAtMC44MjctMC42NzMtMS41LTEuNS0xLjVoLTAuOTE3Yy0wLjI3NiAwLTAuNSAwLjIyNC0wLjUgMC41czAuMjI0IDAuNSAwLjUgMC41aDAuOTE3YzAuMjc1IDAgMC41IDAuMjI0IDAuNSAwLjV2MjZjMCAwLjI3Ni0wLjIyNSAwLjUtMC41IDAuNWgtMjZjLTAuMjc1IDAtMC41LTAuMjI0LTAuNS0wLjV2LTAuOTE3YzAtMC4yNzYtMC4yMjQtMC41LTAuNS0wLjV6Ij48L3BhdGg+Cjwvc3ZnPgo=',


	); //$argsTravelCards
	
	register_post_type( 'travel_card', $argsTravelCards );

} //create_posttype
add_action( 'init', 'create_posttype' );




/**
 * Enqueue scripts and styles.
 */
function majadc_coffee_scripts() {
	wp_enqueue_style( 'majadc_coffee-style', get_stylesheet_uri() );
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'screen');
	
	if ( is_singular() ) {
		wp_enqueue_style('singular', get_template_directory_uri() . '/css/single-examples.css', array(), false, 'screen');
	}
	
	wp_enqueue_script('prism', get_template_directory_uri() . '/js/prism.js', array( 'jquery-core' ), false, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
	wp_enqueue_script('travel_cards', get_template_directory_uri() . '/js/projects/travel_cards.js', array(), '1.0.0', true);
	wp_enqueue_script('grid_system-floats', get_template_directory_uri() . '/js/projects/grid_system-floats.js', array(), '1.0.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_single( 1006 ) ) {
		wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Nosifer&display=swap', false );
	}
}
add_action( 'wp_enqueue_scripts', 'majadc_coffee_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//removing auto adding line break paragraph in editor
//remove_filter('the_content', 'wpautop'); 
// remove_filter('the_excerpt', 'wpautop');

