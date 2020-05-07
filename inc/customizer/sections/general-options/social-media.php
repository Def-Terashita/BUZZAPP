<?php
/**
 * Social Media Sections
 *
 * @package Magazine Newspaper
 */

add_action( 'customize_register', 'd_kaigi_social_media_sections' );

/**
 * D kaigi social media sections function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_social_media_sections( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_social_media_sections',
		array(
			'title'       => esc_html__( 'Social Media', 'd-kaigi' ),
			'description' => esc_html__( 'Social Media', 'd-kaigi' ),
			'priority'    => 2,
			'panel'       => 'd_kaigi_general_panel',
		)
	);

	$wp_customize->add_setting(
		new d_kaigi_Repeater_Setting(
			$wp_customize,
			'd_kaigi_social_media',
			array(
				'default'           => '',
				'sanitize_callback' => array( 'd_kaigi_Repeater_Setting', 'sanitize_repeater_setting' ),
			)
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Control_Repeater(
			$wp_customize,
			'd_kaigi_social_media',
			array(
				'section'   => 'd_kaigi_social_media_sections',
				'settings'  => 'd_kaigi_social_media',
				'label'     => esc_html__( 'Social Links', 'd-kaigi' ),
				'fields'    => array(
					'social_media_title' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Social Media Title', 'd-kaigi' ),
						'description' => esc_html__( 'This will be the label.', 'd-kaigi' ),
						'default'     => '',
					),
					'social_media_class' => array(
						'type'    => 'text',
						'label'   => esc_html__( 'Social Media Class', 'd-kaigi' ),
						'default' => '',
					),
					'social_media_link' => array(
						'type'    => 'url',
						'label'   => esc_html__( 'Social Media Links', 'd-kaigi' ),
						'default' => '',
					),
				),
				'row_label' => array(
					'type'  => 'field',
					'value' => esc_html__( 'Social Media', 'd-kaigi' ),
					'field' => 'social_media_title',
				),
			)
		)
	);
}
