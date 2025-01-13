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

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-M9R79ZCV');</script>
<!-- End Google Tag Manager -->

</head>


<?php wp_body_open(); ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9R79ZCV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Site Header -->
<header id="masthead">
    <div class="header-wrapper sticky-top <?php echo is_front_page() ? 'front-page-header' : 'inner-page-header'; ?>">
        <div class="container">
            <!-- Overlay for dark background -->
            <div id="page-overlay" class="cart-overlay"></div>
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
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="<?php esc_attr_e('Toggle navigation', 'chocoSec'); ?>">
                                <span class="material-symbols-outlined">menu</span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <button class="close-menu" id="close-menu" aria-label="Close menu">
                                    <span class="material-symbols-outlined">close</span>
                                </button>
                                <?php if (function_exists('bootstrap_nav_menu')) {
                                            bootstrap_nav_menu();
                                        } ?>
                            </div>
                        </nav>
                    </div>

                    <!-- User and Cart -->
                    <div class="header-icons d-flex align-items-center gap-2">
                        <!-- Search Bar -->
                        <div class="search-bar d-flex">
                            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                                class="d-flex w-100">
                                <span id="search-icon" class="material-symbols-outlined">search</span>
                                <!-- Search Input -->
                                <div id="search-input-container" class="search-bar search-input">
                                        <input id="search-input" type="search" name="s" class="form-control"
                                            placeholder="<?php esc_attr_e('Recherchez des produits...', 'chocoSec'); ?>"
                                            value="<?php echo esc_attr(get_search_query()); ?>" />
                                        <input type="hidden" name="post_type" value="product" />
                                        <!-- Search Button -->
                                        <button id="button-search" type="submit" class="btn">
                                            <span class="material-symbols-outlined">search</span>
                                        </button>
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
    <!-- Topbar for Mobile and Tablet -->
    <div class="mobile-topbar">
        <div class="container">
            <div class="mobile-topbar-content d-lg-none d-flex justify-content-end align-items-center py-2">
            </div>

        </div>
    </div>
    <!-- Hero Section -->
    <?php if (is_front_page()) : ?>
    <?php get_template_part('template-parts/hero'); ?>
    <?php endif; ?>

</header>