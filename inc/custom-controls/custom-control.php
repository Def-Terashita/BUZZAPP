<?php
/**
 * Undocumented function.
 *
 * @package d-kaigi
 */

if ( ! function_exists( 'd_kaigi_register_custom_controls' ) ) :

	/**
	 * Undocumented function
	 *
	 * @param string $wp_customize wp_customize.
	 * @return void
	 */
	function d_kaigi_register_custom_controls( $wp_customize ) {

		// Load our custom control.
		require_once get_template_directory() . '/inc/custom-controls/radiobtn/class-d-kaigi-radio-buttonset-control.php';
		require_once get_template_directory() . '/inc/custom-controls/radioimg/class-d-kaigi-radio-image-control.php';
		require_once get_template_directory() . '/inc/custom-controls/select/class-d-kaigi-select-control.php';
		require_once get_template_directory() . '/inc/custom-controls/slider/class-d-kaigi-slider-control.php';
		require_once get_template_directory() . '/inc/custom-controls/toggle/class-d-kaigi-toggle-control.php';
		require_once get_template_directory() . '/inc/custom-controls/repeater/class-d-kaigi-repeater-setting.php';
		require_once get_template_directory() . '/inc/custom-controls/repeater/class-d-kaigi-control-repeater.php';
		require_once get_template_directory() . '/inc/custom-controls/sortable/class-d-kaigi-control-sortable.php';
		require_once get_template_directory() . '/inc/custom-controls/dropdown-taxonomies/class-d-kaigi-customize-dropdown-taxonomies-control.php';
		require_once get_template_directory() . '/inc/custom-controls/multicheck/class-d-kaigi-multi-check-control.php';
		require_once get_template_directory() . '/inc/custom-controls/notes.php';

		// Register the control type.
		$wp_customize->register_control_type( 'd_kaigi_Radio_Buttonset_Control' );
		$wp_customize->register_control_type( 'd_kaigi_Radio_Image_Control' );
		$wp_customize->register_control_type( 'd_kaigi_Select_Control' );
		$wp_customize->register_control_type( 'd_kaigi_Slider_Control' );
		$wp_customize->register_control_type( 'd_kaigi_Toggle_Control' );
		$wp_customize->register_control_type( 'd_kaigi_Control_Sortable' );
		$wp_customize->register_control_type( 'd_kaigi_Multi_Check_Control' );
	}
endif;
add_action( 'customize_register', 'd_kaigi_register_custom_controls' );
