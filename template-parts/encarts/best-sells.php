<section class="section">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between my-4">
                    <h2 class="section-title">Produits les plus vendus</h2>
                    <div class="d-flex align-items-center">
                        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn-1">Voir tout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php
        // Vérifiez si WooCommerce est actif
        if ( class_exists( 'WooCommerce' ) ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => 6, // Nombre de produits à afficher
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'order'          => 'DESC',
            );

            $best_selling_products = new WP_Query( $args );

            if ( $best_selling_products->have_posts() ) {
                echo '<div class="woocommerce-products-slider">'; 

                while ( $best_selling_products->have_posts() ) {
                    $best_selling_products->the_post(); 
                    echo '<div>';
                    wc_get_template_part( 'content', 'product' );
                    echo '</div>';
                }

                echo '</div>'; // .best-selling-products
            } else {
                echo '<p class="text-center">Aucun produit trouvé.</p>';
            }

            wp_reset_postdata();
        }
        ?>
    </div>
</section>
