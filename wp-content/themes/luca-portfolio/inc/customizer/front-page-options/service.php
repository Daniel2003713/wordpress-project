<?php
/**
 * Service Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Service Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_service_section'),
);

$wp_customize->add_section(
    'luca_portfolio_service_section',
    $default_args
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_service_section',
			'settings' => 'luca_portfolio_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_service_section',
		array(
			'selector' => '#my-service .section-link',
			'settings' => 'luca_portfolio_enable_service_section',
		)
	);
}


// Background grey
$wp_customize->add_setting(
    'luca_portfolio_service_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_service_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_service_section',
            'settings' => 'luca_portfolio_service_section_background_grey',
            'active_callback' => 'luca_portfolio_is_service_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_service_section_headline',
    array(
        'default'           => __( 'Service', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_service_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_service_section',
        'settings'        => 'luca_portfolio_service_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_service_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_service_section_headline_sub',
    array(
        'default'           => __( 'Details about me', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_service_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_service_section',
        'settings'        => 'luca_portfolio_service_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_service_section_enabled',
    )
);
//
// List Service
$wp_customize->add_setting(
    'luca_portfolio_service_section_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_service_section_list',
        array(
            'label'   => esc_html__('Service','luca-portfolio'),
            'label_item'   => esc_html__('Service Item','luca-portfolio'),
            'section' => 'luca_portfolio_service_section',
            'custom_repeater_icon_control' => true,
            'custom_repeater_title_control' => true,
            'custom_repeater_text_control' => true,
            'active_callback' => 'luca_portfolio_is_service_section_enabled',
        )
    )
);

