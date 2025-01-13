<?php
/**
 * Checkout Form
 * Customized for steps with Bootstrap 5 accordion
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
    echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
    return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
    action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data"
    aria-label="<?php echo esc_attr__( 'Checkout', 'woocommerce' ); ?>">
    <div class="accordion" id="checkoutAccordion">

        <!-- Step 1: Billing Details -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingBilling">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseBilling" aria-expanded="true" aria-controls="collapseBilling">
                    <?php esc_html_e( 'Step 1: Billing Details', 'woocommerce' ); ?>
                </button>
            </h2>
            <div id="collapseBilling" class="accordion-collapse collapse show" aria-labelledby="headingBilling"
                data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                </div>
            </div>
        </div>

        <!-- Step 2: Shipping Details -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingShipping">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">
                    <?php esc_html_e( 'Step 2: Shipping Details', 'woocommerce' ); ?>
                </button>
            </h2>
            <div id="collapseShipping" class="accordion-collapse collapse" aria-labelledby="headingShipping"
                data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                </div>
            </div>
        </div>

        <!-- Step 3: Shipping Method -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingShippingMethod">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseShippingMethod" aria-expanded="false"
                    aria-controls="collapseShippingMethod">
                    <?php esc_html_e( 'Step 3: Shipping Method', 'woocommerce' ); ?>
                </button>
            </h2>
            <div id="collapseShippingMethod" class="accordion-collapse collapse" aria-labelledby="headingShippingMethod"
                data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
                    <?php wc_cart_totals_shipping_html(); ?>
                    <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
                </div>
            </div>
        </div>

        <!-- Step 4: Payment Method -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingPayment">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapsePayment">
                    <?php esc_html_e( 'Step 4: Payment Method', 'woocommerce' ); ?>
                </button>
            </h2>
            <div id="collapsePayment" class="accordion-collapse collapse" aria-labelledby="headingPayment"
                data-bs-parent="#checkoutAccordion">
                <div class="accordion-body">
                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                    <?php do_action( 'woocommerce_checkout_payment' ); ?>
                </div>
            </div>
        </div>

        <div class="woocommerce-checkout-review-order pt-3">
            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
        </div>
    </div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>