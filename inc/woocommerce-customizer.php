<?php

// WooCommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function custom_add_to_cart_button() {
    global $product;

    // Vérifie si le produit est en stock
    if ( $product->is_in_stock() ) {
        // Lien personnalisé pour ajouter au panier
        $add_to_cart_url = esc_url( $product->add_to_cart_url() );
        //$add_to_cart_text = esc_html( $product->add_to_cart_text() );

        echo '<a href="' . $add_to_cart_url . '" 
                data-quantity="1" 
                class="button custom-add-to-cart-btn" 
                data-product_id="' . esc_attr( $product->get_id() ) . '" 
                aria-label="' . esc_attr( $product->get_name() ) . '">
                <span class="material-symbols-outlined">add_shopping_cart</span></a>';
    } else {
        // Bouton désactivé pour les produits en rupture de stock
        echo '<button class="button custom-out-of-stock-btn btn-danger" disabled>En rupture de stock</button>';
    }
  }
add_filter( 'woocommerce_after_shop_loop_item', 'custom_add_to_cart_button', 10 );

?>