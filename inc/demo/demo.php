<?php
/**
 * Demo configuration
 *
 * @package d-kaigi
 */

$config = array(
	'ocdi' => array(
		array(
			'import_file_name'             => esc_html__( 'Import Magazine Newspaper Demo', 'd-kaigi' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
			'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
			'import_notice'                => esc_html__( 'It will overwrite your settings', 'd-kaigi' ),
			'preview_url'                  => esc_url( 'https://thebootstrapthemes.com/demo/d-kaigi/' ),
			'import_preview_image_url'     => esc_url( 'http://thebootstrapthemes.com/demo/1.jpg' ),
		),
	),
);

d_kaigi_Demo::init( apply_filters( 'd_kaigi_demo_filter', $config ) );
