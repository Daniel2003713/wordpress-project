<?php
/**
 * Sidebar Option
 *
 * @package luca_portfolio
 */

$wp_customize->add_section(
	'luca_portfolio_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'luca-portfolio' ),
		'panel' => 'luca_portfolio_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'luca_portfolio_sidebar_position',
	array(
		'sanitize_callback' => 'luca_portfolio_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'luca_portfolio_sidebar_position',
	array(
		'label'   => esc_html__( 'Sidebar Position', 'luca-portfolio' ),
		'section' => 'luca_portfolio_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'luca-portfolio' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'luca-portfolio' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'luca-portfolio' ),
		),
	)
);

// Sidebar Option - Sidebar Woocommerce.
$wp_customize->add_setting(
    'luca_portfolio_sidebar_position_woocommerce',
    array(
        'sanitize_callback' => 'luca_portfolio_sanitize_select',
        'default'           => 'right-sidebar',
    )
);

$wp_customize->add_control(
    'luca_portfolio_sidebar_position_woocommerce',
    array(
        'label'   => esc_html__( 'Sidebar Woocommerce Archive', 'luca-portfolio' ),
        'section' => 'luca_portfolio_sidebar_option',
        'type'    => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'luca-portfolio' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar', 'luca-portfolio' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'luca-portfolio' ),
        ),
    )
);

// Sidebar Option - Sidebar Woocommerce Single.
$wp_customize->add_setting(
    'luca_portfolio_sidebar_position_woocommerce_single',
    array(
        'sanitize_callback' => 'luca_portfolio_sanitize_select',
        'default'           => 'right-sidebar',
    )
);

$wp_customize->add_control(
    'luca_portfolio_sidebar_position_woocommerce_single',
    array(
        'label'   => esc_html__( 'Sidebar Woocommerce Single', 'luca-portfolio' ),
        'section' => 'luca_portfolio_sidebar_option',
        'type'    => 'select',
        'choices' => array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'luca-portfolio' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar', 'luca-portfolio' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'luca-portfolio' ),
        ),
    )
);

// Social header
$wp_customize->add_section(
    'luca_portfolio_header_options',
    array(
        'title'    => esc_html__( 'Header', 'luca-portfolio' ),
        'panel' => 'luca_portfolio_theme_options',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_header_social',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_header_social',
        array(
            'label'   => esc_html__('Social','luca-portfolio'),
            'intro'   => esc_html__('List social show in navigation','luca-portfolio'),
            'label_item'   => esc_html__('Social Item','luca-portfolio'),
            'section' => 'luca_portfolio_header_options',
            'custom_repeater_link_control' => true,
            'custom_repeater_icon_control' => true,
            'custom_repeater_color_control' => true,
        )
    )
);
