<?php
/**
 * Sanitization Functions
 *
 * @package d-kaigi
 */

/**
 *   * D kaigi sanitize category function
 *
 * @param object $input .
 */
function d_kaigi_sanitize_category( $input ) {
	$output = intval( $input );
	return $output;
}

/**
 * D kaigi sanitize dropdown pages function
 *
 * @param object $page_id .
 * @param object $setting .
 */
function d_kaigi_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );

	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
}

/**
 * D kaigi sanitize checkbox function
 *
 * @param object $input .
 */
function d_kaigi_sanitize_checkbox( $input ) {
	// returns true if checkbox is checked.
	return ( ( isset( $input ) && true === $input ) ? true : false );
}

/**
 * D kaigi sanitize file function
 *
 * @param object $file .
 * @param object $setting .
 */
function d_kaigi_sanitize_file( $file, $setting ) {
	// allowed file types.
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
	);

	// check file type from file name.
	$file_ext = wp_check_filetype( $file, $mimes );

	// if file has a valid mime type return it, otherwise return default.
	return ( $file_ext['ext'] ? $file : $setting->default );
}

/**
 * D kaigi sanitize select function
 *
 * @param object $input .
 * @param object $setting .
 */
function d_kaigi_sanitize_select( $input, $setting ) {

	// Ensure input is a slug.
	$input = sanitize_key( $input );

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * D kaigi sanitize choices function
 *
 * @param object $input .
 * @param object $setting .
 */
function d_kaigi_sanitize_choices( $input, $setting ) {
	global $wp_customize;

	$control = $wp_customize->get_control( $setting->id );

	if ( array_key_exists( $input, $control->choices ) ) {
		return $input;
	} else {
		return $setting->default;
	}
}

/**
 * D kaigi sanitize google fonts function
 *
 * @param object $input .
 * @param object $setting .
 */
function d_kaigi_sanitize_google_fonts( $input, $setting ) {

	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * D kaigi sanitize array function
 *
 * @param object $value .
 */
function d_kaigi_sanitize_array( $value ) {
	if ( is_array( $value ) ) {
		foreach ( $value as $key => $subvalue ) {
			$value[ $key ] = esc_attr( $subvalue );
		}
		return $value;
	}
	return esc_attr( $value );
}
