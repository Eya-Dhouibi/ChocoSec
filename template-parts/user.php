<div class="user-account">
    <!-- L'icône utilisateur -->
    <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"
        aria-label="<?php esc_attr_e('My Account', 'chocoSec'); ?>"
        class="user-icon">
        <span class="material-symbols-outlined">person</span>
    </a>

    <!-- Menu dropdown -->
    <div class="user-dropdown">
        <?php 
        if (!is_user_logged_in()) {
            // Si l'utilisateur est connecté, inclure la navigation WooCommerce
            $navigation_template = get_template_directory() . '/woocommerce/myaccount/navigation.php';
            if (file_exists($navigation_template)) {
                include $navigation_template;
            } else {
                echo '<p>' . esc_html__('Navigation template not found.', 'chocoSec') . '</p>';
            }
        } else {
            echo '<ul class="guest-menu">';
            echo '<li><a href="' . esc_url(wc_get_account_endpoint_url('login')) . '">' . esc_html__('Login', 'chocoSec') . '</a></li>';
            echo '</ul>';
        }
        ?>
    </div>
</div>