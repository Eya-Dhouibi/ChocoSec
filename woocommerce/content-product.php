<?php
/**
 * Template pour afficher le contenu des produits dans les boucles
 * 
 * Ce modèle peut être surchargé en copiant ce fichier dans yourtheme/woocommerce/content-product.php.
 *
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Vérifier la visibilité du produit
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( 'product-item custom-product-class', $product ); ?>>
	<?php
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

	// Bouton d'ajout au panier
	echo '<div class="add-to-cart mt-3">';
	do_action( 'woocommerce_after_shop_loop_item' );
	echo '</div>';
	?>
</li>
