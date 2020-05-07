<?php
/**
 * Customizer Control: radio-image.
 *
 * @package d-kaigi
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'd_kaigi_Radio_Image_Control' ) ) {

	/**
	 * Radio Image control (modified radio).
	 */
	class D_Kaigi_Radio_Image_Control extends Wp_Customize_Control {

		/**
		 * Control type variable
		 *
		 * @var string
		 */
		public $type = 'radio-image';

		/**
		 * Tooltip variable
		 *
		 * @var string
		 */
		public $tooltip = '';

		/**
		 * To Json function
		 *
		 * @return void
		 */
		public function to_json() {
			parent::to_json();

			if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			} else {
				$this->json['default'] = $this->setting->default;
			}

			$this->json['value']      = $this->value();
			$this->json['choices']    = $this->choices;
			$this->json['link']       = $this->get_link();
			$this->json['id']         = $this->id;
			$this->json['tooltip']    = $this->tooltip;
			$this->json['inputAttrs'] = '';
			foreach ( $this->input_attrs as $attr => $value ) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		}

		/**
		 * Undocumented function
		 *
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_style(
				'd-kaigi-radio-image',
				get_template_directory_uri() . '/inc/custom-controls/radioimg/radio-image.css',
				null
			);
			wp_enqueue_script(
				'd-kaigi-radio-image',
				get_template_directory_uri() . '/inc/custom-controls/radioimg/radio-image.js',
				array( 'jquery' ),
				false,
				true
			); // for radio-image.
		}

		/**
		 * Content Template function
		 *
		 * @return void
		 */
		protected function content_template() {
			?>
			<# if ( data.tooltip ) { #>
				<a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
			<# } #>
			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>
			<div id="input_{{ data.id }}" class="image">
				<# for ( key in data.choices ) { #>
					<input {{{ data.inputAttrs }}} class="image-select" type="radio" value="{{ key }}" name="_customize-radio-{{ data.id }}" id="{{ data.id }}{{ key }}" {{{ data.link }}}<# if ( data.value === key ) { #> checked="checked"<# } #>>
						<label for="{{ data.id }}{{ key }}">
							<img src="{{ data.choices[ key ] }}">
							<span class="image-clickable"></span>
						</label>
					</input>
				<# } #>
			</div>
			<?php
		}
	}
}
?>
