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
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> aria-label="Page Body">
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'chocoSec'); ?>
        </a>

        <!-- Site Header -->
        <header id="masthead" class="<?php echo is_front_page() ? 'front-page-header' : 'inner-page-header'; ?>">
            <div class="header-wrapper sticky-top">
                <div class="container">

                    <!-- Overlay for dark background -->
                    <div id="menu-overlay" class="cart-overlay"></div>

                    <!-- Topbar for Mobile and Tablet -->
                    <?php /* <div class="mobile-topbar">
                        <div class="mobile-topbar-content d-lg-none d-flex justify-content-between align-items-center py-2">
                            <div class="topbar-contact d-flex align-items-center gap-3">
                                <span class="material-symbols-outlined">phone</span>
                                <span><?php esc_html_e('+216 123 456 789', 'chocoSec'); ?></span>
                </div>
                <?php get_template_part('template-parts/composants/reseaux-sociaux'); ?>
            </div>
    </div> */ ?>

    <!-- Top Header -->
    <div class="topbar-header pt-2 pb-2">
        <div class="topbar-header-content d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="site-branding">
                <?php if (has_custom_logo()) {
                                    the_custom_logo();
                                } else { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                    <?php bloginfo('name'); ?>
                </a>
                <?php } ?>
            </div>

            <div class="main-nav-content">
                <nav id="navmenu" class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false"
                        aria-label="<?php esc_attr_e('Toggle navigation', 'chocoSec'); ?>">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <?php if (function_exists('bootstrap_nav_menu')) {
                                            bootstrap_nav_menu();
                                        } ?>
                    </div>
                </nav>
            </div>

            <!-- User and Cart -->
            <div class="header-icons d-flex align-items-center gap-3">
                <!-- Search Bar -->
                <div class="search-bar d-flex">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                        class="d-flex w-100">
                        <span id="search-icon" class="material-symbols-outlined">search</span>
                        <!-- Search Input -->
                        <div class="search-bar input-group">
                            <div id="search-input-container">
                                <input id="search-input" type="search" name="s" class="form-control"
                                    placeholder="<?php esc_attr_e('Recherchez des produits...', 'chocoSec'); ?>"
                                    value="<?php echo esc_attr(get_search_query()); ?>" />
                                <input type="hidden" name="post_type" value="product" />
                                <!-- Search Button -->
                                <button id="button-search" type="submit" class="btn">
                                    <span class="material-symbols-outlined">search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php get_template_part('template-parts/cart'); ?>
                <?php get_template_part('template-parts/user'); ?>
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
    </div>