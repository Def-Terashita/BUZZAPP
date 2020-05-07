<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package d-kaigi
 */

get_header(); ?>
<div class="spacer">
	<section class="page-header">
		<div class="container">
			<div class="detail-content">
				<div class="not-found">
					<p class="text-center">
						<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'd-kaigi' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer();
?>
