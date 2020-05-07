<?php
/**
 *
 *  * Banner news
 *
 * @package d-keiagi
 */

$category_id           = get_theme_mod( 'banner_category' );
$banner_section_title  = get_theme_mod( 'banner_section_title' );
$banner_display_option = get_theme_mod( 'banner_display_option', false );
?>

<?php if ( $banner_display_option ) : ?>

	<?php
	$category_args = array(
		'cat'            => absint( $category_id ),
		'posts_per_page' => 3,
	);
	$query         = new WP_Query( $category_args );
	?>

	<?php if ( $query->have_posts() ) : ?>
		<?php
			$default_image = array(
				'1' => '1.jpg',
				'2' => '2.jpg',
				'3' => '3.jpg',
				'4' => '4.jpg',
			);
			?>
	<div class="banner-news spacer">
		<div class="container">   
			<?php if ( $banner_section_title ) : ?>
				<h4><?php echo esc_html( $banner_section_title ); ?></h4>
			<?php endif; ?>
			<section>
				<?php $i = 1; ?>
				<?php
				while (
					$query->have_posts() ) :
					$query->the_post();
					?>
					<div class="banner-news-list">
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'd-kaigi-banner' ); ?>
						<?php
						if ( ! empty( $image ) ) :
							$image = $image[0];
						else :
							$image = get_template_directory_uri() . '/images/' . $default_image[ $i ];
						endif;
						?>
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $section_title ); ?>" class="img-responsive">
						<div class="banner-news-caption">
							<?php
							$categories = get_the_category();
							$separator  = ' ';
							$output     = '';
							if ( ! empty( $categories ) ) :
								foreach ( $categories as $category ) {
									$output .= '<a class="news-category pri-color" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
								}
								echo esc_attr( trim( $output, esc_attr( $separator ) ) );
							endif;
							?>
							<h1 class="news-title">
								<a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>">
									<?php the_title(); ?>
								</a>
							</h1>
							<small class="date">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
								<?php echo esc_attr( get_the_date() ); ?>
							</small>
						</div> 
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</section> 
		</div>
	</div>
<?php endif; ?>
<!-- banner-news -->
<?php endif; ?>
