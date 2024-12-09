<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package chocoSec
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'chocoSec'); ?>
        </a>

        <!-- Site Header -->
        <header id="masthead" class="site-header">
            <div class="header-wrapper sticky-top">

                <!-- Topbar for Mobile and Tablet -->
                <div class="mobile-topbar">
                    <div class="container">
                        <div
                            class="mobile-topbar-content d-lg-none d-flex justify-content-between align-items-center py-2">
                            <div class="topbar-contact d-flex align-items-center gap-3">
                                <span class="material-symbols-outlined">phone</span>
                                <span><?php esc_html_e('+216 123 456 789', 'chocoSec'); ?></span>
                            </div>
                            <?php get_template_part('template-parts/composants/reseaux-sociaux'); ?>
                        </div>
                    </div>
                </div>
                <!-- Top Header -->
                <div class="topbar-header">
                    <div class="container">
                        <div class="topbar-header-content  d-flex justify-content-between align-items-center">
                            <!-- Logo -->
                            <div class="site-branding">
                                <?php 
                             if (has_custom_logo()) {
                                the_custom_logo();
                              } else { ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                                    <?php bloginfo('name'); ?>
                                </a>
                                <?php } ?>
                            </div>

                            <!-- Search Bar -->
                            <div class="search-bar d-flex">
                                <!-- Dropdown pour les catégories -->
                                <select name="product_cat" class="form-select border-0 d-none d-lg-block"
                                    aria-label="<?php esc_attr_e('Product Categories', 'chocoSec'); ?>">
                                    <option value=""><?php esc_html_e('Toutes nos catégories', 'chocoSec'); ?></option>
                                    <?php
                                        $args = array(
                                        'taxonomy'   => 'product_cat',
                                        'hide_empty' => false,
                                        );
                                       $product_categories = get_terms($args);

                                     if (!empty($product_categories)) {
                                      foreach ($product_categories as $product_category) {
                                        echo '<option value="' . esc_attr($product_category->slug) . '">' . esc_html($product_category->name) . '</option>';
                                     }
                                      }
                                   ?>
                                </select>

                                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                                    class="d-flex w-100">
                                    <span id="search-icon" class="material-symbols-outlined">search</span>
                                    <!-- Barre de recherche -->
                                    <div class="search-bar input-group">
                                        <div id="search-input-container">
                                            <input id="search-input" type="search" name="s" class="form-control"
                                                placeholder="<?php esc_attr_e('Recherchez des produits...', 'chocoSec'); ?>"
                                                value="<?php echo get_search_query(); ?>" />
                                            <input id="search-input" type="hidden" name="post_type" value="product" />
                                            <!-- Bouton de recherche -->
                                            <button id="button-search" type="submit" class="btn">
                                                <span class="material-symbols-outlined">search</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <!-- Contact Info -->
                            <div class="header-contact d-flex justify-content-end align-items-center gap-3">
                                <div class="d-flex align-items-center">
                                    <span class="material-symbols-outlined me-2" aria-hidden="true">phone</span>
                                    <span><?php esc_html_e('+216 123 456 789', 'chocoSec'); ?></span>
                                </div>
                                <!-- Social Links -->
                                <?php get_template_part('template-parts/composants/reseaux-sociaux'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation and User/Cart -->
                <div class="main-nav-content">
                    <div class="container">
                        <div
                            class="d-flex flex-lg-row flex-row-reverse align-items-center justify-content-lg-between pt-2 pb-2">
                            <nav id="navmenu" class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="<?php esc_attr_e('Toggle navigation', 'chocoSec'); ?>">
                                    <span class="material-symbols-outlined">menu</span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <?php bootstrap_nav_menu(); ?>
                                </div>
                            </nav>

                            <!-- User and Cart -->
                            <div class="header-icons d-flex align-items-center gap-3">
                                <a href="<?php echo wc_get_cart_url(); ?>"
                                    aria-label="<?php esc_attr_e('View Cart', 'chocoSec'); ?>">
                                    <span class="material-symbols-outlined">shopping_cart</span>
                                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                                </a>
                                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
                                    aria-label="<?php esc_attr_e('My Account', 'chocoSec'); ?>">
                                    <span class="material-symbols-outlined">person</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hero Section -->
            <?php if (is_front_page()) : ?>
            <?php get_template_part('template-parts/hero'); ?>
            <?php endif; ?>

        </header>