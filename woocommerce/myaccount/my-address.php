<?php
/**
 * My Addresses
 * Optimized for Bootstrap 5
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

defined('ABSPATH') || exit;

$customer_id = get_current_user_id();

if (!wc_ship_to_billing_address_only() && wc_shipping_enabled()) {
    $get_addresses = apply_filters(
        'woocommerce_my_account_get_addresses',
        array(
            'billing'  => __('Billing address', 'woocommerce'),
            'shipping' => __('Shipping address', 'woocommerce'),
        ),
        $customer_id
    );
} else {
    $get_addresses = apply_filters(
        'woocommerce_my_account_get_addresses',
        array(
            'billing' => __('Billing address', 'woocommerce'),
        ),
        $customer_id
    );
}
?>

<div class="container my-4">
    <div class="row g-4">
        <?php foreach ($get_addresses as $name => $address_title) : ?>
            <?php $address = wc_get_account_formatted_address($name); ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><?php echo esc_html($address_title); ?></h5>
                    </div>
                    <div class="card-body">
                        <address class="mb-3">
                            <?php
                            echo $address ? wp_kses_post($address) : esc_html__('You have not set up this type of address yet.', 'woocommerce');
                            ?>
                        </address>
                        <a href="<?php echo esc_url(wc_get_endpoint_url('edit-address', $name)); ?>" class="btn btn-outline-primary">
                            <?php
                            printf(
                                $address ? esc_html__('Edit %s', 'woocommerce') : esc_html__('Add %s', 'woocommerce'),
                                esc_html($address_title)
                            );
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
