<?php 
/**
 * The Template for displaying all single products
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="section">
<div class="container">
	
<?php
    /**
     * woocommerce_before_main_content hook.
     *
     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
     * @hooked woocommerce_breadcrumb - 20
     */
    do_action( 'woocommerce_before_main_content' );
?>

    <div class="row">
        <div class="col-md-6">
            <!-- Product Image Gallery -->
            <div class="product-gallery">
                <?php 
                    // Display main product image
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( 'large', ['class' => 'img-fluid rounded'] );
                    } 
                ?>
            </div>
        </div>

        <div class="col-md-6">
            <!-- Product Information -->
            <div class="product-info">
                <h1 class="product-title"><?php the_title(); ?></h1>

                <?php
                    // Ensure the product object is retrieved
                    $product = wc_get_product( get_the_ID() );
                    if ( $product ) :
                ?>
                
                <p class="price"><?php echo wc_price( $product->get_price() ); ?></p>

                <div class="product-description">
                    <?php the_content(); ?>
                </div>

                <div class="product-meta mt-4">
                    <p><strong>Availability:</strong> <?php echo ( $product->is_in_stock() ) ? 'In Stock' : 'Out of Stock'; ?></p>
                    <p><strong>SKU:</strong> <?php echo $product->get_sku(); ?></p>
                </div>

                <div class="product-actions mt-4">
                    <!-- Add to Cart Button -->
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>

                <?php else : ?>
                    <p>Product not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
