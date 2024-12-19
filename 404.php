<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package chocoSec
 */

get_header();
?>

<main id="primary" class="site-main">

  <section class="error-404 not-found container py-5">
    <div class="row justify-content-center text-center">
      <!-- Section Title -->
      <div class="col-12 col-md-8">
        <h1 class="page-title display-4 text-danger mb-4">
          <?php esc_html_e( 'Oops! Page not found.', 'chocoSec' ); ?>
        </h1>
        <p class="lead mb-4">
          <?php esc_html_e( 'We couldn’t find the page you’re looking for. Try searching or explore some of the recent posts or categories.', 'chocoSec' ); ?>
        </p>

        <!-- Image or Icon for visual appeal -->
        <img src="https://via.placeholder.com/300" alt="404 Error" class="img-fluid mb-4" />
        
        <!-- Search form -->
        <div class="mb-4">
          <h3><?php esc_html_e( 'Search for content:', 'chocoSec' ); ?></h3>
          <?php get_search_form(); ?>
        </div>
      </div>

    <!-- Call to Action to Go Home -->
    <div class="text-center mt-5">
      <a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-primary btn-lg">
        <?php esc_html_e( 'Go to Homepage', 'chocoSec' ); ?>
      </a>
    </div>
  </section>

</main><!-- #main -->

<?php
get_footer();
