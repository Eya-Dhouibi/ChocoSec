<?php
/**
 * chocoSec functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chocoSec
 */

require('inc/class-wp-bootstrap-navwalker.php');
require get_template_directory() . '/inc/head.php';  // Inclure head.php pour les enqueuers
require get_template_directory() . '/inc/menu.php';  // Inclure menu.php pour les fonctions de menu

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function chocoSec_setup() {
    load_theme_textdomain( 'chocoSec', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
    add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', 'default-image' => '' ) );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo', array( 'height' => 250, 'width' => 250, 'flex-width' => true, 'flex-height' => true ) );
}
add_action( 'after_setup_theme', 'chocoSec_setup' );

function chocoSec_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chocoSec_content_width', 640 );
}
add_action( 'after_setup_theme', 'chocoSec_content_width', 0 );

// Register widgets
function chocoSec_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'chocoSec' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'chocoSec' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'chocoSec_widgets_init' );

// Additional theme setup and functions
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/woocommerce-customizer.php';
require get_template_directory() . '/inc/jetpack.php';

?>

