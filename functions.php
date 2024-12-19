<?php
/**
 * chocoSec functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package chocoSec
 */

 require('inc/class-wp-bootstrap-navwalker.php');

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function chocoSec_setup() {

	load_theme_textdomain( 'chocoSec', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'chocoSec' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'chocoSec_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'chocoSec_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chocoSec_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'chocoSec_content_width', 640 );
}
add_action( 'after_setup_theme', 'chocoSec_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chocoSec_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'chocoSec' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'chocoSec' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'chocoSec_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

 function chocosec_enqueue_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'chocosec_enqueue_scripts');


/**
 * Enqueue AOS animation.
 */

 function aos_animation() {
	
	wp_enqueue_style( 'aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );
	wp_enqueue_script( 'aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js');

}
add_action( 'wp_enqueue_scripts', 'aos_animation' );

/**
 * Enqueue Icon
 */
function ajouter_google_fonts_icons() {
    wp_enqueue_style('google-fonts-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', [], null);
}
add_action('wp_enqueue_scripts', 'ajouter_google_fonts_icons');

function ajouter_material_symbols() {
    wp_enqueue_style('material-symbols', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined', [], null);
}
add_action('wp_enqueue_scripts', 'ajouter_material_symbols');

function ajouter_fonts_google() {
    // Enqueue des polices Noto Serif et Open Sans
    wp_enqueue_style(
        'Noto Serif','https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap',[],
        null
    );
    wp_enqueue_style(
        'open-sans','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&display=swap', [],null
    );
}
add_action('wp_enqueue_scripts', 'ajouter_fonts_google');


function chocoSec_scripts_woocommerce() {
	wp_enqueue_style( 'product style', get_template_directory_uri() . '/woocommerce/assets/css/product.css',[], false );

}
add_action( 'wp_enqueue_scripts', 'chocoSec_scripts_woocommerce' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * NAV_MENUS
 */
function register_my_menu() {
    register_nav_menus(array(
        'primary' => __('Primary Menu'),
    ));
}
add_action('after_setup_theme', 'register_my_menu');

// Enveloppez le menu dans un conteneur Bootstrap
function bootstrap_nav_menu() {
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'depth'          => 4,
        'container'      => '',
        'menu_class'     => 'navbar-nav mr-auto',
        'walker'         => new bootstrap_5_wp_nav_menu_walker(),
    ));
} 

 /**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 * woocommerce
 */
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


// Ajouter un champ personnalisé pour l'URL de l'image
function add_menu_image_field($item_id, $item, $depth, $args, $id) {
    $image_url = get_post_meta($item_id, '_menu_item_image', true); // Récupérer l'URL enregistrée
    ?>
    <p class="field-custom description description-wide">
        <label for="edit-menu-item-image-<?php echo esc_attr($item_id); ?>">
            <?php esc_html_e('Image URL'); ?><br>
            <input type="text" id="edit-menu-item-image-<?php echo esc_attr($item_id); ?>" class="widefat" name="menu-item-image[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($image_url); ?>">
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'add_menu_image_field', 10, 5);

function save_menu_image_field($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-image'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_image', sanitize_text_field($_POST['menu-item-image'][$menu_item_db_id]));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_image');
    }
}
add_action('wp_update_nav_menu_item', 'save_menu_image_field', 10, 3);

add_filter( 'woocommerce_cart_block_is_active', '__return_false' );
add_filter( 'woocommerce_checkout_block_is_active', '__return_false' );


add_action('wp_logout', function() {
    wp_redirect(home_url('/')); // Redirige vers la page d'accueil
    exit;
});






