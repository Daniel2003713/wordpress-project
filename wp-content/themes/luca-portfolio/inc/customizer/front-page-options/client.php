<?php
/**
 * Client Section
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_section(
	'luca_portfolio_client_section',
	array(
		'panel'    => 'luca_portfolio_front_page_options',
		'title'    => esc_html__( 'Client Section', 'luca-portfolio' ),
		'priority' => luca_portfolio_priority_section('luca_portfolio_client_section'),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_client_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_client_section',
		array(
			'label'    => esc_html__( 'Enable Client Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_client_section',
			'settings' => 'luca_portfolio_enable_client_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_client_section',
		array(
			'selector' => '#my-client .section-link',
			'settings' => 'luca_portfolio_enable_client_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_client_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_client_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_client_section',
            'settings' => 'luca_portfolio_client_section_background_grey',
            'active_callback' => 'luca_portfolio_is_client_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_client_section_headline',
    array(
        'default'           => __( 'My Client', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_client_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_client_section',
        'settings'        => 'luca_portfolio_client_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_client_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_client_section_headline_sub',
    array(
        'default'           => __( 'What customers say about us', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_client_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_client_section',
        'settings'        => 'luca_portfolio_client_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_client_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'luca_portfolio_resume_section_client_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_resume_section_client_list',
        array(
            'label'   => esc_html__('Client','luca-portfolio'),
            'label_item'   => esc_html__('Client Item','luca-portfolio'),
            'section' => 'luca_portfolio_client_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'client_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Avatar'),
                    'client_content' => array('class' => 'trigger_field', 'type' => 'textarea', 'label' => 'Content'),
                    'client_name' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Name'),
                    'client_job' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Job position'),
                )
            ),
            'active_callback' => 'luca_portfolio_is_client_section_enabled',
        )
    )
);