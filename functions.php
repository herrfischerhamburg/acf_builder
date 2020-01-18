<?php
/**
 * oc functions and definitions
 *
 * @package oc
 */

/**
 * Paths
 *
 * @since  1.0
 */
if ( !defined('OC_THEME_DIR') ) {
	define ('OC_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template() );
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'oc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function oc_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
    'primary' => esc_html__( 'Main', 'oc' ),
    'sidebar' => esc_html__( 'Sidebar', 'text_domain', 'oc' ),
    'footer'  => esc_html__( 'Footer', 'text_domain', 'oc' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // oc_setup
add_action( 'after_setup_theme', 'oc_setup' );

/**
 *
 * Scripts
 *
 * @since  1.0.0
 *
 */
function oc_scripts() {
	/* JS */
	// jquery
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/inc/jquery.min.js', false, false, false);
	wp_enqueue_script('jquery');
	
	// Vendor
    // wp_enqueue_script('oc_vendorsJs', get_template_directory_uri() . '/assets/js/vendor.min.js');
    wp_enqueue_script('oc_bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('oc_slick', get_template_directory_uri() . '/inc/slick/slick.min.js');
	// wp_enqueue_script('oc_dropotron', get_template_directory_uri() . '/inc/dropotron/jquery.dropotron.min.js');
	wp_enqueue_script('oc_moby', get_template_directory_uri() . '/inc/moby/moby.min.js', array(), '1.0', 'all');
	
	// Custom
	wp_enqueue_script('oc_customJs', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '1.0', 'all');
    
    /* CSS */
    // Vendor
    wp_enqueue_style('oc_style_bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('oc_style_bootstrap-grid', get_template_directory_uri() . '/bootstrap/css/bootstrap-grid.min.css', array(), '1.0', 'all');
	wp_enqueue_style('oc_style_bootstrap-reboot', get_template_directory_uri() . '/bootstrap/css/bootstrap-reboot.min.css', array(), '1.0', 'all');
	wp_enqueue_style('oc_style_vendors_slick', get_template_directory_uri() . '/inc/slick/slick.css', array(), '1.0', 'all');
	wp_enqueue_style('oc_style_vendors_genericons', get_template_directory_uri() . '/inc/icons/genericons/Genericons-Neue.min.css', array(), '1.0', 'all');
	
	// Custom
	wp_enqueue_style('oc_main_style', get_template_directory_uri() . '/style.css', array(), '1', 'all' );
} 
add_action('wp_enqueue_scripts','oc_scripts');

/**
 * Add support for a featured image and the size
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'square-xxs', 70, 70, true );
add_image_size( 'square', 500, 500, true );
add_image_size( 'img-s', 720, 480, true );
add_image_size( 'img-m', 1100, 720, true );
add_image_size( 'img-l', 1500, 720, true );
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
function pagination($range = 6, $show_one_pager = true, $show_page_hint = false) {
    global $wp_query;
    $num_of_pages = (int)$wp_query->max_num_pages;

    if(!is_single() && $num_of_pages > 1) {
        $current_page = get_query_var('paged') === 0 ? 1 : get_query_var('paged');
        $num_of_display_pages = ($range * 2) + 1;
        $output = '<div id="pagination" class="cf">';
        if($show_page_hint) {
            $output .= '<span class="pagination-overview">Seite ' . $current_page . ' von ' . $num_of_pages . '</span>';
        }
        if($current_page > 2 && $current_page > $range + 1 && $num_of_display_pages < $num_of_pages) {
            $output .= '<a href="' . get_pagenum_link(1) . '" class="pagination_arrow" title="Seite 1 - Neueste Artikel">&laquo;</a>';
        }
        if($show_one_pager && $current_page > 1) {
            $output .= '<a href="' . get_pagenum_link($current_page - 1) . '" class="pagination_arrow" title="Seite ' . ($current_page - 1) . ' - Neuere Artikel"> ' . '<' . '</a>';
        }
        for($i = 1; $i <= $num_of_pages; $i++) {
            if($i < $current_page + $range + 1 && $i > $current_page - $range - 1) {
                if($current_page === $i) {
                    $output .= '<span class="current">' . $i . '</span><span class="bslash"></span>';
                } else {
                    $output .= '<a href="' . get_pagenum_link($i) . '" title="Seite ' . $i . '" >' . $i . '</a><span class="bslash"></span>';
                }
            }
        }
        if($show_one_pager && $current_page < $num_of_pages) {
            $output .= '<a href="' . get_pagenum_link($current_page + 1) . '" class="pagination_arrow" title="Seite ' . ($current_page + 1) . ' - &Auml;ltere Artikel">' . '>' . '</a>';
        }
        if($current_page < $num_of_pages - 1 && $current_page + $range < $num_of_pages && $num_of_display_pages < $num_of_pages) {
            $output .= '<a href="' . get_pagenum_link($num_of_pages) . '" class="pagination_arrow" title="Seite ' . $num_of_pages . ' - &Auml;lteste Artikel">&raquo;</a>';
        }
        $output .= '</div>';
        return $output;
    }
}

/**
 * Breadcrumb
 */
function nav_breadcrumb() {
    $delimiter = '&nbsp;&nbsp;/&nbsp;&nbsp;';
    $home = 'Startseite'; 
    $before = '<span class="current">'; 
    $after = '</span>'; 

    if ( !is_home() && !is_front_page() || is_paged() ) {

    echo '<div id="breadcrumb" class="breadcrumb_footer">';

    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
    global $wp_query;
    $cat_obj = $wp_query->get_queried_object();
    $thisCat = $cat_obj->term_id;
    $thisCat = get_category($thisCat);
    $parentCat = get_category($thisCat->parent);
    if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
    echo $before . single_cat_title('', false) . $after;

    } elseif ( is_day() ) {
    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
    echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
    echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
    if ( get_post_type() != 'post' ) {
    $post_type = get_post_type_object(get_post_type());
    $slug = $post_type->rewrite;
    echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
    echo $before . get_the_title() . $after;
    } else {
    $cat = get_the_category(); $cat = $cat[0];
    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    echo $before . get_the_title() . $after;
    }

    } elseif ( !is_single() && !is_page() /* hffix */ && !is_search() && get_post_type() != 'post' && !is_404() ) {
    $post_type = get_post_type_object(get_post_type());
    echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
    $parent = get_post($post->post_parent);
    $cat = get_the_category($parent->ID); $cat = $cat[0];
    echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
    echo $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
    echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
    $parent_id  = $post->post_parent;
    $breadcrumbs = array();
    while ($parent_id) {
    $page = get_page($parent_id);
    $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
    $parent_id  = $page->post_parent;
    }
    $breadcrumbs = array_reverse($breadcrumbs);
    foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
    echo $before . get_the_title() . $after;

    } elseif ( is_search() ) {
    echo $before . 'Ergebnisse für die Suche nach "' . get_search_query() . '"' . $after;

    } elseif ( is_tag() ) {
    echo $before . 'Beiträge mit dem Schlagwort "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
    global $author;
    $userdata = get_userdata($author);
    echo $before . 'Beiträge veröffentlicht von ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
    echo $before . 'Fehler 404' . $after;
    }

    if ( get_query_var('paged') ) {
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
    echo ': ' . __('Seite') . ' ' . get_query_var('paged');
    if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';
    }
}

/**
 * ACF Options
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page("Template");	
	acf_add_options_page("Texte");	
	acf_add_options_page("Bilder");	
}

/**
 * ACF backend styles
 */
function my_acf_admin_head() {
	?>
	<style type="text/css">
		.acf-flexible-content .layout .acf-fc-layout-handle {
			background-color: #0073aa;
			color: #eee;
		}
	
		.acf-repeater.-row > table > tbody > tr > td,
		.acf-repeater.-block > table > tbody > tr > td {
			border-top: 2px solid #0073aa;
		}
	
		.acf-repeater .acf-row-handle {
			vertical-align: top !important;
			padding-top: 16px;
		}
	
		.acf-repeater .acf-row-handle span {
			font-size: 20px;
			font-weight: bold;
			color: #0073aa;
		}
	
		.imageUpload img {
			width: 75px;
		}
	
		.acf-repeater .acf-row-handle .acf-icon.-minus {
			top: 30px;
		}

		/* Icons */
		@font-face {
			font-family: 'icomoon';
			src:  url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.eot?r8rtdx');
			src:  url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.eot?r8rtdx#iefix') format('embedded-opentype'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.ttf?r8rtdx') format('truetype'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.woff?r8rtdx') format('woff'),
				url('<?php bloginfo('template_directory'); ?>/inc/icons/fonts/icomoon.svg?r8rtdx#icomoon') format('svg');
			font-weight: normal;
			font-style: normal;
			font-display: block;
		}
		.oc_icons .acf-input .acf-checkbox-list li {
			background-color: #efefef;
			padding: 3px 10px;
			padding-bottom: 8px;
			margin-bottom: 3px;
		}
		.oc_icons .acf-input .acf-checkbox-list li label span[class*="icon-"] {
			/* use !important to prevent issues with browser extensions that change fonts */
			font-family: 'icomoon' !important;
			speak: none;
			font-style: normal;
			font-weight: normal;
			font-variant: normal;
			text-transform: none;
			line-height: 1;
			font-size: 1.5em;
			top: 4px;
			position: relative;

			/* Better Font Rendering =========== */
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
		}
		.icon-home4:before {
		content: "\e900";
		}
		.icon-bathtub:before {
		content: "\e901";
		}
		.icon-toothbrush:before {
		content: "\e902";
		}
		.icon-bed:before {
		content: "\e903";
		}
		.icon-couch:before {
		content: "\e904";
		}
		.icon-cloud-windy:before {
		content: "\e905";
		}
		.icon-key:before {
		content: "\e906";
		}
		.icon-joystick:before {
		content: "\e907";
		}
		.icon-heart:before {
		content: "\e908";
		}
		.icon-guitar:before {
		content: "\e909";
		}
		.icon-socks:before {
		content: "\e90a";
		}
		.icon-flip-flops:before {
		content: "\e90b";
		}
		.icon-hanger:before {
		content: "\e90c";
		}
		.icon-laundry:before {
		content: "\e90d";
		}
		.icon-ice-cream:before {
		content: "\e90e";
		}
		.icon-bowling-pins:before {
		content: "\e90f";
		}
		.icon-refund:before {
		content: "\e910";
		}
	</style>
	<?php
	}
add_action('acf/input/admin_head', 'my_acf_admin_head');

/** 
 * ACF colors
 */
function klf_acf_input_admin_footer() { ?>
    <script type="text/javascript">
		(function($) {
			acf.add_filter('color_picker_args', function( args, $field ){
				// add the hexadecimal codes here for the colors you want to appear as swatches
				args.palettes = ['#0074D9', '#7FDBFF', '#39CCCC', '#FF4136', '#8914c9', '#111111', '#FFFFFF', '#AAAAAA', '#DDDDDD']
				// return colors
				return args;
			});
		})(jQuery);
    </script>
    <?php }
add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

/**
 * Copyright footer
 */
function comicpress_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
}