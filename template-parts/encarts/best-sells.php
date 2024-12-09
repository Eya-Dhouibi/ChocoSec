<section class="section">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between my-4">
                    <h2 class="section-title">Produits les plus vendus</h2>
                    <div class="d-flex align-items-center">
                        <a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="btn-1">Voir tout</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
            <?php
                    $args = array(
                        'post_type' => 'product',
                        'meta_key' => 'total_sales',
                        'orderby' => 'meta_value_num',
                        'posts_per_page' => 8 // Nombre de produits à afficher
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            global $product;
                            ?>
            <div class="col">
                <div class="product-item">
                    <figure>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php echo woocommerce_get_product_thumbnail(); ?>
                        </a>
                    </figure>
                    <div class="d-flex flex-column align-items-center text-center">
                        <h3 class="fs-5 fw-normal"><?php the_title(); ?></h3>
                        <div>
                            <?php woocommerce_template_loop_rating(); ?>
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <?php if ($product->get_regular_price() != $product->get_sale_price()): ?>
                            <del><?php echo wc_price($product->get_regular_price()); ?></del>
                            <?php endif; ?>
                            <span class="text-dark fw-semibold"><?php echo $product->get_price_html(); ?></span>
                        </div>
                        <div class="button-area">
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
        </div>
    </div>
</section>