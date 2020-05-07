<?php
/**
 *
 * Dropdown Taxonomies Control
 *
 * @package d-kiagi
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * Customize Control for Taxonomy Select
 */
class D_Kaigi_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

	/**
	 * Control type variable
	 *
	 * @var string
	 */
	public $type = 'dropdown-taxonomies';

	/**
	 * Taxonomy variable
	 *
	 * @var string
	 */
	public $taxonomy = '';

	/**
	 * Constract function
	 *
	 * @param string $manager manager.
	 * @param string $id id.
	 * @param array  $args array.
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$d_kaigi_taxonomy = 'category';
		if ( isset( $args['taxonomy'] ) ) {
			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
			if ( true === $taxonomy_exist ) {
				$our_taxonomy = esc_attr( $args['taxonomy'] );
			}
		}

		$this->taxonomy = esc_attr( $d_kaigi_taxonomy );
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render content function
	 *
	 * @return void
	 */
	public function render_content() {

					$tax_args       = array(
						'hierarchical' => 0,
						'taxonomy'     => $this->taxonomy,
					);
					$all_taxonomies = get_categories( $tax_args );
					?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<select <?php echo esc_html( $this->link() ); ?>>
				<?php
					printf(
						'<option value="%s" %s>%s</option>',
						'',
						selected( $this->value(), '', false ),
						esc_html( __( 'Select', 'd-kaigi' ) )
					);
				?>
				<?php
				if ( ! empty( $all_taxonomies ) ) :
					?>
					<?php
					foreach ( $all_taxonomies as $key => $tax ) :
						?>
						<?php
						printf(
							'<option value="%s" %s>%s</option>',
							esc_html( $tax->term_id ),
							selected( $this->value(), $tax->term_id, false ),
							esc_html( $tax->name )
						);
						?>
						<?php
					endforeach
					?>
					<?php
				endif
				?>
			</select>
		</label>
		<?php
	}
}
?>
