<?php
/**
 * Template partial for displaying the modal for a WooCommerce product.
 *
 * @param WC_Product $product The product object.
 */
if ( ! isset( $product ) || ! is_a( $product, 'WC_Product' ) ) {
    return;
}
?>

<div class="modal fade" id="productModal-<?php echo esc_attr( $product->get_id() ); ?>" tabindex="-1" aria-labelledby="productModalLabel-<?php echo esc_attr( $product->get_id() ); ?>" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel-<?php echo esc_attr( $product->get_id() ); ?>">
                    <?php echo esc_html( $product->get_name() ); ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Image du produit -->
                <div class="product-image mb-3">
                    <?php echo $product->get_image( 'full', array( 'class' => 'img-fluid' ) ); ?>
                </div>

                <!-- Informations sur le produit -->
                <p><strong>Prix :</strong> <?php echo $product->get_price_html(); ?></p>
                <p><strong>Description :</strong> <?php echo wp_kses_post( $product->get_short_description() ); ?></p>
                <p><strong>Catégorie :</strong> <?php echo wc_get_product_category_list( $product->get_id() ); ?></p>
            </div>
            <div class="modal-footer">

           <?php 
           
           // Bouton "Ajouter au panier"
    if ( $product->is_purchasable() && $product->is_in_stock() ) {
        echo '<a href="' . esc_url( '?add-to-cart=' . $product->get_id() ) . '" 
            data-quantity="1" 
            class="custom-add-to-cart-btn button add_to_cart_button ajax_add_to_cart" 
            data-product_id="' . esc_attr( $product->get_id() ) . '" 
            data-product_sku="' . esc_attr( $product->get_sku() ) . '" 
            aria-label="Ajouter ' . esc_attr( $product->get_name() ) . ' au panier">';
        echo '<span class="material-symbols-outlined">add_shopping_cart</span> Ajouter au panier';
        echo '</a>';
    } ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
