<?php
/**
 * Blog Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Product Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_product_section'),
);
//$wp_customize->add_section(
//    'luca_portfolio_product_section',
//    $default_args
//);

$wp_customize->add_section(
    new Luca_Portfolio_Custom_Section(
        $wp_customize,
        'luca_portfolio_product_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'luca-portfolio' ),
                'url'              => LUCA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_product_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_product_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_product_section',
			'settings' => 'luca_portfolio_enable_product_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_product_section',
		array(
			'selector' => '#my-blog .section-link',
			'settings' => 'luca_portfolio_enable_product_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_product_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_product_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_product_section',
            'settings' => 'luca_portfolio_product_section_background_grey',
            'active_callback' => 'luca_portfolio_is_product_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_product_section_headline',
    array(
        'default'           => __( 'My Blog', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_product_section',
        'settings'        => 'luca_portfolio_product_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_product_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_product_section_headline_sub',
    array(
        'default'           => __( 'My shared posts', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_product_section',
        'settings'        => 'luca_portfolio_product_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_product_section_enabled',
    )
);

// List blog
$wp_customize->add_setting(
    'luca_portfolio_product_list',
    array(
        'sanitize_callback' => 'sanitize_array',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Select_Multiple(
        $wp_customize,
        'luca_portfolio_product_list',
        array(
            'label'           => esc_html__( 'Select List', 'luca-portfolio' ),
            'description'           => esc_html__( 'Can you choosen multiple', 'luca-portfolio' ),
            'section'         => 'luca_portfolio_product_section',
            'settings' => 'luca_portfolio_product_list',
            'choices' => luca_portfolio_get_post_choices('product'),
            'height' => general_height_from_count_post(luca_portfolio_get_post_choices()),
            'active_callback' => 'luca_portfolio_is_product_section_enabled',
        )
    )
);


// Button url
$wp_customize->add_setting(
    'luca_portfolio_product_section_product_per_row',
    array(
        'default'           => 3,
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_section_product_per_row',
    array(
        'label'           => esc_html( 'Products per row', 'luca-portfolio' ),
        'description'     => esc_html('How many products should be shown per row?','luca-portfolio'),
        'section'         => 'luca_portfolio_product_section',
        'settings'        => 'luca_portfolio_product_section_product_per_row',
        'type'            => 'select',
        'active_callback' => 'luca_portfolio_is_product_section_enabled',
        'choices'  => array(
            2 => '2',
            3 => '3',
            4 => '4',
        )
    )
);
