<?php
// Enqueue styles and scripts
function theme_enqueue_scripts() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.min.css', [], filemtime(get_template_directory() . '/assets/css/style.min.css'), 'all');
    wp_enqueue_script('theme-scripts', get_template_directory_uri() . '/assets/js/app.min.js', ['jquery'], filemtime(get_template_directory() . '/assets/js/app.min.js'), true);
    
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', [], null, true);

   }

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Enqueue styles and scripts Bootstrap 5
function chocosec_enqueue_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'chocosec_enqueue_scripts');

// Enqueue Icon
function ajouter_google_fonts_icons() {
    wp_enqueue_style('google-fonts-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', [], null);
}
add_action('wp_enqueue_scripts', 'ajouter_google_fonts_icons');

function ajouter_material_symbols() {
    wp_enqueue_style('material-symbols', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined', [], null);
}
add_action('wp_enqueue_scripts', 'ajouter_material_symbols');

// Enqueue Font
function ajouter_fonts_google() {
    wp_enqueue_style('noto-serif', 'https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap', [], null);
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&display=swap', [], null);
}
add_action('wp_enqueue_scripts', 'ajouter_fonts_google');

// Enqueue AOS animation
function aos_animation() {
    wp_enqueue_style('aos-style', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_script('aos-script', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'aos_animation');

// Enqueue Slick Slider
function enqueue_slick_slider() {
    // CSS Slick Slider
    wp_enqueue_style('slick-slider', get_template_directory_uri() . '/assets/slick/slick.css', [], '1.8.1');
    //wp_enqueue_style('slick-slider-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', ['slick-slider'], '1.8.1');

    // JS Slick Slider
    wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/slick/slick.min.js', ['jquery'], '1.8.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');
?>
