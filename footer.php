<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package d-kaigi
 */

?>

<section class="sec-bg-color main-nav">
	<div class="container" ailgn="right">

		<nav class="nav-menu-footer navi-topics">
			<aside>
				<ul><?php dynamic_sidebar( 'footer-logo' ); ?></ul>
				<ul><?php dynamic_sidebar( 'footer-1' ); ?></ul>
				<ul><?php dynamic_sidebar( 'footer-2' ); ?></ul>
				<ul><?php dynamic_sidebar( 'footer-3' ); ?></ul>
			</aside>
		</nav>
	</div>
	<?php wp_footer(); ?>
</section><!-- #secondary -->





