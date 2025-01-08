<?php
get_header();  // Inclut header.php
?>

<main id="main-content">
    
   <!-- Best category Section -->
   <?php get_template_part('template-parts/encarts/category'); ?>

    <!-- Best selling Section -->
    <?php get_template_part('template-parts/encarts/best-sells'); ?>

</main>

<?php
get_footer();  // Inclut footer.php