<?php
/**
 * Price Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Price Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_price_section'),
);

$wp_customize->add_section(
    'luca_portfolio_price_section',
    $default_args
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_price_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_price_section',
		array(
			'label'    => esc_html__( 'Enable Price Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_price_section',
			'settings' => 'luca_portfolio_enable_price_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_price_section',
		array(
			'selector' => '#price .section-link',
			'settings' => 'luca_portfolio_enable_price_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_price_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_price_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_price_section',
            'settings' => 'luca_portfolio_price_section_background_grey',
            'active_callback' => 'luca_portfolio_is_price_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_price_section_headline',
    array(
        'default'           => __( 'Price', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_price_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_price_section',
        'settings'        => 'luca_portfolio_price_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_price_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'luca_portfolio_resume_section_price_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_resume_section_price_list',
        array(
            'label'   => esc_html__('Price Item','luca-portfolio'),
            'label_item'   => esc_html__('Price Item','luca-portfolio'),
            'section' => 'luca_portfolio_price_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'price_title' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Title'),
                    'price_value' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Price'),
                    'price_description' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Description'),
                    'price_button_text' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button Text'),
                    'price_button_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button URL'),
                )
            ),
            'active_callback' => 'luca_portfolio_is_price_section_enabled',
        )
    )
);