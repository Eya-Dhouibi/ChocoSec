
    <!-- Lien Panier -->
    <a href="javascript:void(0);" id="cart-icon" aria-label="<?php esc_attr_e('View Cart', 'chocoSec'); ?>">
        <span class="material-symbols-outlined">shopping_cart</span>
        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
    </a>


<!-- Overlay pour le fond sombre -->
<div id="cart-overlay" class="cart-overlay"></div>

<!-- Menu du Panier -->
<div id="cart-menu" class="cart-menu">
    <div class="cart-items">
        <?php if ( WC()->cart->get_cart_contents_count() > 0 ) : ?>
            <ul>
            <?php 
                $total_sales = 0; // Initialisation du total des ventes
                foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $product = $cart_item['data'];
                    $product_name = $product->get_name();
                    $product_quantity = $cart_item['quantity'];
                    $product_price = WC()->cart->get_product_price($product);
                    $product_price_raw = floatval( $product->get_price() ); // Obtenir le prix brut
                    $total_sales += $product_price_raw * $product_quantity; // Calculer le total des ventes
                    $product_image = $product->get_image(); // Obtenir l'image du produit
                    $product_url = $product->get_permalink(); // URL du produit
                    ?>
                    <li class="pb-2">
                        <div class="cart-item d-sm-block d-md-flex align-items-center justify-content-between">
                            <!-- Affichage de l'image du produit -->
                            <div  class="product-image">
                                <a href="<?php echo esc_url( $product_url ); ?>">
                                    <?php echo $product_image; ?>
                                </a>
                            </div>

                            <!-- Nom et quantité du produit -->
                            <div class="product-content d-flex flex-column flex-grow-1 flex-wrap">
                                <span class="product-name">
                                    <a href="<?php echo esc_url( $product_url ); ?>"><?php echo $product_name; ?></a>
                                </span>
                                <span class="product-quantity">
                                    <input type="number" name="cart[<?php echo esc_attr( $cart_item_key ); ?>][quantity]" value="<?php echo esc_attr( $product_quantity ); ?>" min="1" />
                                </span>

                                <!-- Prix du produit -->
                                <span class="price"><?php echo $product_price; ?></span>
                            </div>
                        </div>
                    </li>
            <?php endforeach; ?>
            </ul>

            <!-- Affichage du total des ventes -->
            <div class="total-sales">
                <strong><?php esc_html_e( 'Total Sales:', 'chocoSec' ); ?></strong>
                <span class="total-sales-value"><?php echo wc_price( $total_sales ); ?></span>
            </div>
        <?php else : ?>
            <?php echo home_url('/shop'); ?>
        <?php endif; ?>
    </div>
    <div class="cart-actions">
        <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-primary"><?php esc_html_e( 'View Cart', 'chocoSec' ); ?></a>
        <a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-success"><?php esc_html_e( 'Checkout', 'chocoSec' ); ?></a>
    </div>
</div>
