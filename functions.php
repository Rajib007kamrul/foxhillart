<?php

if ( ! function_exists( 'foxhill_setup' ) ) {
    function foxhill_setup() {

    	load_theme_textdomain( 'foxhill', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_editor_style();
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'fox_reference_thumbnail', 546, 388 );
		add_image_size( 'fox_reference_small', 145, 145 );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'monte' ),
			'header_right' => esc_html__( 'Header Right Menu', 'monte' ),
			'footer' => esc_html__( 'footer Menu', 'monte' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-logo', array(
		   'flex-width' => false,
		   'height'     => 80,
	   	   'width'      => 250,
		) );

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
    }
}

add_action( 'after_setup_theme', 'foxhill_setup' );


if ( ! function_exists( 'foxhill_scripts' ) ) {
    function foxhill_scripts() {
    	global $wp_query;
    	wp_enqueue_style( 'foxhill_vendor_css', get_template_directory_uri() . '/assets/css/vendor.css');
    	wp_enqueue_style( 'foxhill_fullPage_css', get_template_directory_uri() . '/assets/css/fullPage.min.css');
    	wp_enqueue_style( 'foxhill_main_css', get_template_directory_uri() . '/style.css');
		wp_enqueue_style( 'foxhill_style_css', get_template_directory_uri() . '/assets/css/style.css');
		wp_enqueue_style( 'foxhill_responsive_css', get_template_directory_uri() . '/assets/css/responsive.css');

    	wp_enqueue_script( 'jquery' );
    	wp_enqueue_script( 'foxhill_vendor_js', get_template_directory_uri() . '/assets/js/vendor.js', ['jquery'], false, true );
    	wp_enqueue_script( 'foxhill_TweenMax_js', get_template_directory_uri() . '/assets/js/TweenMax.min.js', ['jquery'], false, true );
    	wp_enqueue_script( 'foxhill_main_js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true );

		wp_localize_script( 'foxhill_main_js', 'foxhil',
			array(
				'ajaxurl'        => admin_url( 'admin-ajax.php' ),
				'nonce'          => wp_create_nonce( "theme-nonce" )
			)
		);
    }
}

add_action( 'wp_enqueue_scripts', 'foxhill_scripts' );

add_action( 'admin_enqueue_scripts', 'add_media'  );

function add_media() {
	wp_enqueue_media();
}


add_filter( 'body_class', function( $classes ) {
	// if( is_page_template( 'template-custom.php' ) ) {
	// 	$classes[] = 'navbar-area style-two';
	// } else{
	// 	$classes[] = 'navbar-area';
	// }

    return $classes;
} );


add_filter( 'wp_nav_menu_items', 'foxhill_add_navitems_link', 10, 2 );

function foxhill_add_navitems_link( $items, $args ) {
	// if( $args->theme_location == 'header_right' ){
	// 	$items .= '<li><a class="dropdown-search-btn" href="#">Search</a></li>
	// 	<li><a class="dropdown-help-btn" href="#">Help</a></li>
	// 	<li><a class="dropdown-account-btn account-btn" href="#">My Account</a></li>
	// 	<li class="ml-0"><a class="nav-cart-btn" href="#"><span>0</span></a></li>';
	// }

    return $items;
}

add_action( 'init', 'foxhill_register_post' );

function foxhill_register_post() {

	$test_arr = array( 'supports' => array( 'title', 'editor', 'thumbnail' ), 'has_archive' => true );
	$test     = new post_type( 'Reference', 'reference', $test_arr );
}
require get_template_directory() . '/inc/customizer-list-field.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom_post.php';
require get_template_directory() . '/inc/custom-meta.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/custom-shortcode.php';
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);

    return $content;
});

// add_filter( 'wpcf7_form_class_attr', 'custom_custom_form_class_attr' );

// function custom_custom_form_class_attr( $class ) {
//   $class .= ' contact-form-inner fha-tab-content';
//   return $class;
// }


add_filter( "post_type_labels_art", 'change_art_label' );

function change_art_label( $labels ) {
    $labels->name               = __( 'Reference', 'your-custom-plugin' );
    $labels->singular_name      = __( 'Element', 'your-custom-plugin' );
	$labels->all_items          = __( 'All Reference', 'your-custom-plugin' );
    $labels->menu_name          = _x( 'Reference', 'Admin menu name', 'your-custom-plugin' );
    $labels->add_new            = __( 'Add Reference', 'your-custom-plugin' );
    $labels->add_new_item      = __( 'Add New Tour', 'your-custom-plugin' );
    $labels->edit              = __( 'Edit Reference', 'your-custom-plugin' );
    $labels->edit_item          = __( 'Edit Reference', 'your-custom-plugin' );
    $labels->new_item           = __( 'New Reference', 'your-custom-plugin' );
    $labels->view              = __( 'View Reference', 'your-custom-plugin' );
    $labels->view_item          = __( 'View Reference', 'your-custom-plugin' );
    $labels->search_items       = __( 'Search Reference', 'your-custom-plugin' );
    $labels->not_found          = __( 'No Reference found', 'your-custom-plugin' );
    $labels->not_found_in_trash = __( 'No Reference found in trash', 'your-custom-plugin' );
    $labels->parent            = __( 'Parent Reference', 'your-custom-plugin' );

	return $labels;
}