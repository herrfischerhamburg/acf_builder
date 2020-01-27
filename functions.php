<?php
/**
 * acfpb functions and definitions
 *
 * @package acfpb
 */

/**
 * Paths
 *
 * @since  1.0
 */
if ( !defined('ACFPB_THEME_DIR') ) {
	define ('ACFPB_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template() );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'acfpb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acfpb_setup() {
	// Add default WordPress functions
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// wp_nav_menu()
	register_nav_menus( array(
		'primary' => esc_html__( 'Main', 'acfpb' ),
		'sidebar' => esc_html__( 'Sidebar', 'text_domain', 'acfpb' ),
		'footer'  => esc_html__( 'Footer', 'text_domain', 'acfpb' ),
	));

	// HTML5 theme support
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // acfpb_setup
add_action( 'after_setup_theme', 'acfpb_setup' );

/**
 *
 * Scripts
 *
 * @since  1.0.0
 *
 */
function acfpb_scripts() {
	/* JS */
	// jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/inc/jquery.min.js', false, false, false);
	wp_enqueue_script('jquery');
	
	// Vendor
    // wp_enqueue_script('acfpb_vendorsJs', get_template_directory_uri() . '/assets/js/vendor.min.js');
    wp_enqueue_script('acfpb_bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('acfpb_slick', get_template_directory_uri() . '/inc/slick/slick.min.js');
	// wp_enqueue_script('acfpb_dropotron', get_template_directory_uri() . '/inc/dropotron/jquery.dropotron.min.js');
	wp_enqueue_script('acfpb_moby', get_template_directory_uri() . '/inc/moby/moby.min.js', array(), '1.0', 'all');
	wp_enqueue_script('acfpb_aos', get_template_directory_uri() . '/inc/aos/aos.js', array(), '1.0', 'all');
	
	// Custom
	wp_enqueue_script('acfpb_customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '1.0', 'all');
    
    /* CSS */
    // Vendor
    wp_enqueue_style('acfpb_style_bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('acfpb_style_bootstrap-grid', get_template_directory_uri() . '/bootstrap/css/bootstrap-grid.min.css', array(), '1.0', 'all');
	wp_enqueue_style('acfpb_style_bootstrap-reboot', get_template_directory_uri() . '/bootstrap/css/bootstrap-reboot.min.css', array(), '1.0', 'all');
	wp_enqueue_style('acfpb_style_vendors_slick', get_template_directory_uri() . '/inc/slick/slick.css', array(), '1.0', 'all');
	wp_enqueue_style('acfpb_style_vendors_genericons', get_template_directory_uri() . '/inc/icons/genericons/Genericons-Neue.min.css', array(), '1.0', 'all');
	wp_enqueue_style('acfpb_style_smpl', get_template_directory_uri() . '/inc/icons/smpl-v1.0/style.css', array(), '1.0', 'all');
	wp_enqueue_style('acfpb_style_aos', get_template_directory_uri() . '/inc/aos/aos.css', array(), '1.0', 'all');
	
	// Custom
	wp_enqueue_style('acfpb_main_style', get_template_directory_uri() . '/style.css', array(), '1', 'all' );
} 
add_action('wp_enqueue_scripts','acfpb_scripts');

/**
 * Add support for a featured image and the size
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'square-xxs', 70, 70, true );
add_image_size( 'square', 400, 400, true );	
add_image_size( 'img-xs', 400, 253, true );
add_image_size( 'img-s', 992, 627, true );
add_image_size( 'img-m', 1200, 758, true );
add_image_size( 'img-xl', 1920, 1200, true );

/**
 * Safari datepicker fallback
 */
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

/**
 * Excerpt
 */
function new_excerpt_more($more) {
    global $post;
    return '<span class="ellipsis"> …<span>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Pagination
 */
require_once( get_stylesheet_directory() . '/functions/pagination.php' );

/**
 * Breadcrumb
 */
require_once( get_stylesheet_directory() . '/functions/breadcrumb.php' );

/**
 * ACF Options
 */
require_once( get_stylesheet_directory() . '/functions/acf_options.php' );

/**
 * ACF backend styles
 */
require_once( get_stylesheet_directory() . '/functions/acf_backend_style.php' );

/**
 * Copyright footer
 */
require_once( get_stylesheet_directory() . '/functions/footer_copyright.php' );
