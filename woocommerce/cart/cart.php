<?php
/**
 * Cart Page
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="container">
    <h1 class="mb-4"><?php esc_html_e( 'Panier d’achat', 'woocommerce' ); ?></h1>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><?php esc_html_e( 'Thumbnail', 'woocommerce' ); ?></th>
                        <th scope="col"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                        <th scope="col"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                        <th scope="col"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                        <th scope="col"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
                        <th scope="col"><?php esc_html_e( 'Action', 'woocommerce' ); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = $cart_item['data'];
								$product_id = $cart_item['product_id'];

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 ) {
									?>
                    <tr>
                        <td>
                            <?php
											$thumbnail = $_product->get_image();
											echo wp_kses_post( $thumbnail );
											?>
                        </td>
                        <td>
                            <div class="product-name woocommerce-loop-product__title"
                                data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <a href="<?php echo esc_url( $_product->get_permalink() ); ?>">
                                    <?php echo esc_html( $_product->get_name() ); ?>
                                </a>
                            </div>
                        </td>

                        <td>
                            <div class="input-group">
                                <?php
												echo woocommerce_quantity_input(
													array(
														'input_name'   => "cart[{$cart_item_key}][qty]",
														'input_value'  => $cart_item['quantity'],
														'max_value'    => $_product->get_max_purchase_quantity(),
														'min_value'    => '0',
														'product_name' => $_product->get_name(),
													),
													$_product,
													false
												);
												?>
                            </div>
                        </td>

                        <td>
                            <div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                <?php echo wp_kses_post( WC()->cart->get_product_price( $_product ) ); ?>
                            </div>
                        </td>

                        <td><?php echo wp_kses_post( WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ) ); ?>
                        </td>

                        <td>
                            <a href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>"
                                class="product-remove" title="<?php esc_attr_e( 'Remove item', 'woocommerce' ); ?>">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                    <?php
								}
							}
							?>
                </tbody>
            </table>
        </div>

        <?php /* <div class="col-md-6 text-end">
						<button type="submit" class="btn btn-secondary" name="update_cart"><?php esc_html_e( 'Update Cart', 'woocommerce' ); ?></button>
</div> */ ?>

<div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Utiliser le code de coupon
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
            aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
                <?php if ( wc_coupons_enabled() ) { ?>
                <div class="input-group">
                    <input type="text" name="coupon_code" class="form-control"
                        placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>">
                    <button type="submit" class="btn btn-primary"
                        name="apply_coupon"><?php esc_html_e( 'Apply Coupon', 'woocommerce' ); ?></button>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>


</div>

<div class="cart-collaterals mt-5">
    <div class="cart-totals">
        <div class="text-right p-2">
            <?php esc_html_e( 'Sous-total', 'woocommerce' ); ?>
            <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?>
        </div>
        <div class="text-right bg-primary p-2">
            <?php esc_html_e( 'Total', 'woocommerce' ); ?>
            <?php echo wp_kses_post( WC()->cart->get_total() ); ?>
        </div>
    </div>
	 <!-- Actions du Panier -->
	 <div class="cart-actions pt-2">
            <a href="<?php echo wc_get_checkout_url(); ?>"
                class="btn btn-success"><?php esc_html_e('Valider la commande', 'chocoSec'); ?></a>
        </div>
</div>


</form>
</div>