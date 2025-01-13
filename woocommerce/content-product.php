<li <?php wc_product_class( 'product-item custom-product-class', $product ); ?>>
    <?php
    // Vérifiez que la variable $product est définie et valide.
    if ( ! isset( $product ) || ! is_a( $product, 'WC_Product' ) ) {
        global $product; // Récupère l'objet global du produit s'il n'est pas déjà défini.
    }

    // Ouverture du lien produit
    do_action( 'woocommerce_before_shop_loop_item' );

    // Image du produit et badge de promotion
    echo '<div class="product-image mb-3">';
    do_action( 'woocommerce_before_shop_loop_item_title' );
    echo '</div>';

    // Titre du produit
    echo '<h3 class="fs-5 fw-normal">';
    do_action( 'woocommerce_shop_loop_item_title' );
    echo '</h3>';

    // Détails après le titre : Évaluations et Prix
    echo '<div class="product-details">';
    do_action( 'woocommerce_after_shop_loop_item_title' );
    echo '</div>';

    /**
     * Hook: woocommerce_after_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_close - 5
     * @hooked woocommerce_template_loop_add_to_cart - 10
     */
    //do_action( 'woocommerce_after_shop_loop_item' );

    // Affichage des boutons personnalisés
    add_custom_product_actions();
    
    ?>
</li>

