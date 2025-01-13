<?php

// WooCommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Fonction pour afficher les actions personnalisées sur chaque produit
function add_custom_product_actions() {
    global $product;

    // Vérifiez que $product est valide
    if ( ! isset( $product ) || ! is_a( $product, 'WC_Product' ) ) {
        return;
    }

    echo '<div class="product-actions">';

    // Bouton "Ajouter au panier" avec AJAX
    //if ( $product->is_purchasable() && $product->is_in_stock() ) {
        echo '<a href="' . esc_url( '?add-to-cart=' . $product->get_id() ) . '" 
            data-quantity="1" 
            class="custom-add-to-cart-btn button add_to_cart_button" 
            data-product_id="' . esc_attr( $product->get_id() ) . '" 
            data-product_sku="' . esc_attr( $product->get_sku() ) . '" 
            aria-label="Ajouter ' . esc_attr( $product->get_name() ) . ' au panier">';
        echo '<span class="material-symbols-outlined">add_shopping_cart</span> Ajouter au panier';
        echo '</a>';
    //}

    // Bouton "Voir le produit"
    echo '<button type="button" class="view-product-button" data-bs-toggle="modal" data-bs-target="#productModal-' . esc_attr( $product->get_id() ) . '">';
    echo '<span class="material-symbols-outlined">visibility</span>';
    echo '</button>';

    echo '</div>';
}


function render_product_modals() {
    $product_ids = apply_filters( 'rendered_product_ids', array() );

    if ( empty( $product_ids ) ) {
        return;
    }

    foreach ( $product_ids as $product_id ) {
        $product = wc_get_product( $product_id );

        if ( ! $product ) {
            continue;
        }

         // Inclure le fichier du modal
         include locate_template( 'woocommerce/view-product.php' );
        ?>
        <?php
    }
}
add_action( 'wp_footer', 'render_product_modals' );


?>



