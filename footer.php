<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package chocoSec
 */

?>

<?php get_template_part('template-parts/encarts/reacerance'); ?>

 <footer id="footer" class="footer position-relative light-background">

<div class="container footer-top">
  <div class="row gy-4">
	<div class="col-lg-4 col-md-6 footer-about">
	<?php 
        if (has_custom_logo()) {
            the_custom_logo();
        } else { ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
            <?php bloginfo('name'); ?>
        </a>
    <?php } ?>


	  <div class="footer-contact pt-3">
		<p>A108 Adam Street</p>
		<p>New York, NY 535022</p>
		<p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
		<p><strong>Email:</strong> <span>info@example.com</span></p>
	  </div>
	  <div class="social-links d-flex mt-4">
	    <?php get_template_part('template-parts/composants/reseaux-sociaux'); ?>
	  </div>
	</div>

	<div class="col-lg-2 col-md-3 footer-links">
	  <h4>Useful Links</h4>
	  <ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">About us</a></li>
		<li><a href="#">Services</a></li>
		<li><a href="#">Terms of service</a></li>
		<li><a href="#">Privacy policy</a></li>
	  </ul>
	</div>

	<div class="col-lg-2 col-md-3 footer-links">
	  <h4>Our Services</h4>
	  <ul>
		<li><a href="#">Web Design</a></li>
		<li><a href="#">Web Development</a></li>
		<li><a href="#">Product Management</a></li>
		<li><a href="#">Marketing</a></li>
		<li><a href="#">Graphic Design</a></li>
	  </ul>
	</div>

	<div class="col-lg-4 col-md-12 footer-newsletter">
	  <h4>Our Newsletter</h4>
	  <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
	  <form action="forms/newsletter.php" method="post" class="php-email-form">
		<div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
		<div class="loading">Loading</div>
		<div class="error-message"></div>
		<div class="sent-message">Your subscription request has been sent. Thank you!</div>
	  </form>
	</div>

  </div>
</div>

<div class="container copyright text-center mt-4">
  <p>© <span>Copyright</span> <strong class="px-1 sitename">ChocoSec</strong><span>All Rights Reserved</span></p>
</div>

</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
