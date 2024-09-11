<?php
/**
 * About Section
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_section(
	'luca_portfolio_contact_section',
	array(
		'panel'    => 'luca_portfolio_front_page_options',
		'title'    => esc_html__( 'Contact Section', 'luca-portfolio' ),
		'priority' => luca_portfolio_priority_section('luca_portfolio_contact_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_contact_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_contact_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_contact_section',
			'settings' => 'luca_portfolio_enable_contact_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_contact_section',
		array(
			'selector' => '#contact .section-link',
			'settings' => 'luca_portfolio_enable_contact_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_contact_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_contact_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_contact_section',
            'settings' => 'luca_portfolio_contact_section_background_grey',
            'active_callback' => 'luca_portfolio_is_contact_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_contact_section_headline',
    array(
        'default'           => __( 'Contact me', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_contact_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_contact_section',
        'settings'        => 'luca_portfolio_contact_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_contact_section_enabled',
    )
);

// Fields
$wp_customize->add_setting(
    'luca_portfolio_contact_section_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_contact_section_list',
        array(
            'label'   => esc_html__('Contact Item','luca-portfolio'),
            'label_item'   => esc_html__('Contact Item','luca-portfolio'),
            'section' => 'luca_portfolio_contact_section',
            'custom_repeater_icon_control' => true,
            'custom_repeater_text_control' => true,
            'active_callback' => 'luca_portfolio_is_contact_section_enabled',
        )
    )
);

$wp_customize->add_setting(
    'luca_portfolio_contact_section_form',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_contact_section_form',
    array(
        'label'           => esc_html__( 'Form', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_contact_section',
        'settings'        => 'luca_portfolio_contact_section_form',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_contact_section_enabled',
    )
);