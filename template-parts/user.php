<div class="user-account">
    <!-- L'icône utilisateur -->
    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
        aria-label="<?php esc_attr_e('My Account', 'chocoSec'); ?>"
        class="user-icon">
        <span class="material-symbols-outlined">person</span>
    </a>

    <!-- Menu dropdown -->
    <?php 
    if (is_user_logged_in()) {
        echo '<div class="user-dropdown">';
        // Si l'utilisateur est connecté, inclure la navigation WooCommerce
        $navigation_template = get_template_directory() . '/woocommerce/myaccount/navigation.php';
        if (file_exists($navigation_template)) {
            include $navigation_template;
        } else {
            echo '<p>' . esc_html__('Navigation template not found.', 'chocoSec') . '</p>';
        }
        echo '</div>';
    }
    ?>
</div>
