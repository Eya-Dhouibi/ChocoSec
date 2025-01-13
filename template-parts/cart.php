<div class="shopping-cart">
    <!-- Lien Panier -->
    <a href="javascript:void(0);" id="cart-icon" aria-label="<?php esc_attr_e('View Cart', 'chocoSec'); ?>">
        <span class="material-symbols-outlined">shopping_cart</span>
        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>

    <!-- Overlay pour le fond sombre -->
    <div id="cart-overlay" class="cart-overlay"></div>

    <div id="cart-menu" class="cart-menu">
        <?php if (WC()->cart->get_cart_contents_count() > 0) : ?>
        <!-- Liste des Articles du Panier -->
        <div class="cart-items">
            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <ul>
                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <li class="pb-2">

                        <div class="cart-item">
                            <div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                <?php
                                    if ( ! $product_permalink ) {
                                        echo wp_kses_post( $product_name . '&nbsp;' );
                                    } else {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                    }
                                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                                    echo wc_get_formatted_cart_item_data( $cart_item );

                                    if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
                                    }
                                    ?>
                            </div>
                            <div
                                class="d-flex align-items-center justify-content-between gap-3 woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                <!-- Image du Produit -->
                                <div class="product-image-cart">
                                    <?php
                                $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                if ( ! $product_permalink ) {
                                    echo $thumbnail;
                                } else {
                                    printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                }
                                ?>
                                </div>

                                <div class="product-content d-flex flex-column flex-grow-1 flex-wrap">
                                    <!-- Quantité du produit -->
                                    <div class="product-quantity"
                                        data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                        <?php
						if ( $_product->is_sold_individually() ) {
							$min_quantity = 1;
							$max_quantity = 1;
						} else {
							$min_quantity = 0;
							$max_quantity = $_product->get_max_purchase_quantity();
						}

						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $max_quantity,
								'min_value'    => $min_quantity,
								'product_name' => $product_name,
							),
							$_product,
							false
						);

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
                                    </div>
                                </div>

                                <!-- Prix et Sous-total -->
                                <div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                    <?php
                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                    ?>
                                </div>

                                <!-- Suppression du Produit -->
                                <div class="product-remove">
                                    <?php
                                echo apply_filters(
                                    'woocommerce_cart_item_remove_link',
                                    sprintf(
                                        '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                            <span class="material-symbols-outlined">delete</span>
                                        </a>',
                                        esc_url(wc_get_cart_remove_url($cart_item_key)),
                                        esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
                                        esc_attr($product_id),
                                        esc_attr($_product->get_sku())
                                    ),
                                    $cart_item_key
                                );
                                ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </form>
        </div>

        <!-- Collatéraux du Panier -->
        <div class="cart-collaterals">
            <div class="cart-totals">
                <!-- Total TVA -->
                <div class="cart-total-tax">
                    <span class="cart-label"><?php esc_html_e( 'Total TVA', 'chocoSec' ); ?>:</span>
                    <span class="cart-amount"><?php echo WC()->cart->get_cart_tax(); ?></span>
                </div>

                <!-- Total TTC -->
                <div class="cart-total">
                    <span class="cart-label"><?php esc_html_e( 'Total TTC', 'chocoSec' ); ?>:</span>
                    <span class="cart-amount"><?php echo WC()->cart->get_total(); ?></span>
                </div>
            </div>
        </div>

        <!-- Actions du Panier -->
        <div class="cart-actions">
            <a href="<?php echo wc_get_cart_url(); ?>"
                class="btn btn-primary"><?php esc_html_e('Voir le panier', 'chocoSec'); ?></a>
            <a href="<?php echo wc_get_checkout_url(); ?>"
                class="btn btn-success"><?php esc_html_e('Valider la commande', 'chocoSec'); ?></a>
        </div>
        <?php else: ?>
        <p class="text-center"><?php esc_html_e('Votre panier est vide', 'chocoSec'); ?></p>
        <?php endif; ?>
    </div>
</div>