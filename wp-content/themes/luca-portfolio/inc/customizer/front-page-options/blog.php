<?php
/**
 * Blog Section
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_section(
	'luca_portfolio_blog_section',
	array(
		'panel'    => 'luca_portfolio_front_page_options',
		'title'    => esc_html__( 'Blog Section', 'luca-portfolio' ),
		'priority' => luca_portfolio_priority_section('luca_portfolio_blog_section'),
        'description' => esc_html__( 'Blog section options.', 'luca-portfolio' ),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_blog_section',
			'settings' => 'luca_portfolio_enable_blog_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_blog_section',
		array(
			'selector' => '#my-blog .section-link',
			'settings' => 'luca_portfolio_enable_blog_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_blog_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_blog_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_blog_section',
            'settings' => 'luca_portfolio_blog_section_background_grey',
            'active_callback' => 'luca_portfolio_is_blog_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_blog_section_headline',
    array(
        'default'           => __( 'My Blog', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_blog_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_blog_section',
        'settings'        => 'luca_portfolio_blog_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_blog_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_blog_section_headline_sub',
    array(
        'default'           => __( 'My shared posts', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_blog_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_blog_section',
        'settings'        => 'luca_portfolio_blog_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_blog_section_enabled',
    )
);

// List blog
$wp_customize->add_setting(
    'luca_portfolio_blog_list',
    array(
        'sanitize_callback' => 'sanitize_array',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Select_Multiple(
        $wp_customize,
        'luca_portfolio_blog_list',
        array(
            'label'           => esc_html__( 'Select List', 'luca-portfolio' ),
            'description'           => esc_html__( 'Can you choosen multiple', 'luca-portfolio' ),
            'section'         => 'luca_portfolio_blog_section',
            'settings' => 'luca_portfolio_blog_list',
            'choices' => luca_portfolio_get_post_choices(),
            'height' => general_height_from_count_post(luca_portfolio_get_post_choices()),
            'active_callback' => 'luca_portfolio_is_blog_section_enabled',
        )
    )
);

// Button text
$wp_customize->add_setting(
    'luca_portfolio_blog_section_button_text',
    array(
        'default'           => __( 'View All', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_blog_section_button_text',
    array(
        'label'           => esc_html__( 'Button Text', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_blog_section',
        'settings'        => 'luca_portfolio_blog_section_button_text',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_blog_section_enabled',
    )
);

// Button url
$wp_customize->add_setting(
    'luca_portfolio_blog_section_button_url',
    array(
        'default'           => __( '#', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_blog_section_button_url',
    array(
        'label'           => esc_html__( 'Button URL', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_blog_section',
        'settings'        => 'luca_portfolio_blog_section_button_url',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_blog_section_enabled',
    )
);
