<?php
get_header();  // Inclut header.php
?>

<main id="main-content">

   <!-- Best category Section -->
   <?php get_template_part('template-parts/encarts/category'); ?>

    <!-- Best selling Section -->
    <?php get_template_part('template-parts/encarts/best-sells'); ?>

    <!-- Featured Services Section -->
    <?php //get_template_part('template-parts/featured-services'); ?>

    <!-- Features Section -->
    <?php //get_template_part('template-parts/features'); ?>

    <!-- Services Section -->
    <?php //get_template_part('template-parts/services'); ?>

    <!-- Testimonials Section -->
    <?php //get_template_part('template-parts/avis-section'); ?>

    <!-- Contact Section -->
    <?php //get_template_part('template-parts/contact'); ?>

    <!-- Clients Section -->
    <?php //get_template_part('template-parts/client'); ?>

</main>

<?php
get_footer();  // Inclut footer.php