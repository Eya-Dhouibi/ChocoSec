<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Afficher la section hero avec le titre et la description de la catégorie
if ( is_product_category() ) {
    $category = get_queried_object();
    ?>
<section class="hero-section-cat py-5">
    <div class="container">
        <h1 class="hero-title"><?php echo esc_html( $category->name ); ?></h1>
        <?php if ( ! empty( $category->description ) ) : ?>
        <p class="hero-description"><?php echo wp_kses_post( wpautop( $category->description ) ); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
}
// Début du contenu principal
?>
<div class="container woo-content-container py-4">
    <?php
    do_action( 'woocommerce_before_main_content' );
    ?>
</div>
<div class="container py-5">
    <div class="row">
        <!-- Barre latérale des filtres -->
        <aside class="col-lg-3 mb-4">
            <div class="bg-light p-3 rounded shadow-sm">
                <h5 class="mb-3">Filtres</h5>
                <form method="GET" action="">
                    <div class="mb-3">
                        <label for="filter-category" class="form-label">Catégorie</label>
                        <?php wp_dropdown_categories(['taxonomy' => 'product_cat', 'class' => 'form-select', 'show_option_all' => 'Toutes']); ?>
                    </div>
                    <div class="mb-3">
                        <label for="filter-price" class="form-label">Prix</label>
                        <input type="range" class="form-range" id="filter-price" name="price_range" min="0" max="1000"
                            step="10">
                    </div>
                    <div class="mb-3">
                        <label for="filter-attributes" class="form-label">Attributs</label>
                        <select class="form-select" id="filter-attributes" name="attributes">
                            <option value="all">Tous</option>
                            <option value="color">Couleur</option>
                            <option value="size">Taille</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Appliquer</button>
                </form>
            </div>
        </aside>

        <!-- Zone principale des produits -->
        <main class="col-lg-9">
    <!-- Section Woo Content Top -->
    <section class="woo-content-top mb-4">
        <?php do_action( 'woocommerce_before_shop_loop' ); ?>
    </section>

    <!-- Section Woo Content Products -->
    <section class="woo-content-product">
        <?php
        if ( woocommerce_product_loop() ) :
            echo '<div class="row g-3">';
            while ( have_posts() ) : the_post();
                echo '<div class="col-md-4">';
                wc_get_template_part( 'content', 'product' );
                echo '</div>';
            endwhile;
            echo '</div>';

            do_action( 'woocommerce_after_shop_loop' );
        else :
            do_action( 'woocommerce_no_products_found' );
        endif;

        do_action( 'woocommerce_after_main_content' );
        ?>
    </section>
</main>

    </div>
</div>

<?php get_footer( 'shop' ); ?>