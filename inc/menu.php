<?php
// Register Nav Menus
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
?>
