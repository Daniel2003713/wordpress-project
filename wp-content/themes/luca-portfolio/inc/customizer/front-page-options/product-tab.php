<?php
/**
 * Product Tab Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Product Tab Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_product_tab_section'),
);
//$wp_customize->add_section(
//    'luca_portfolio_product_tab_section',
//    $default_args
//);
$wp_customize->add_section(
    new Luca_Portfolio_Custom_Section(
        $wp_customize,
        'luca_portfolio_product_tab_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'luca-portfolio' ),
                'url'              => LUCA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);

// Product Tab Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_product_tab_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_product_tab_section',
		array(
			'label'    => esc_html__( 'Enable Product Tab Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_product_tab_section',
			'settings' => 'luca_portfolio_enable_product_tab_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_product_tab_section',
		array(
			'selector' => '#my-product .section-link',
			'settings' => 'luca_portfolio_enable_product_tab_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_product_tab_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_product_tab_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_product_tab_section',
            'settings' => 'luca_portfolio_product_tab_section_background_grey',
            'active_callback' => 'luca_portfolio_is_product_tab_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_product_tab_section_headline',
    array(
        'default'           => __( 'My Product Tab', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_tab_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_product_tab_section',
        'settings'        => 'luca_portfolio_product_tab_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_product_tab_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_product_tab_section_headline_sub',
    array(
        'default'           => __( 'Product Tabs that I have done', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_tab_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_product_tab_section',
        'settings'        => 'luca_portfolio_product_tab_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_product_tab_section_enabled',
    )
);

// List Product Tab
$wp_customize->add_setting(
    'luca_portfolio_product_tab_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_product_tab_list',
        array(
            'label'   => esc_html__('Product Tab','luca-portfolio'),
            'label_item'   => esc_html__('Product Tab Item','luca-portfolio'),
            'section' => 'luca_portfolio_product_tab_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'product_id' => array('class' => 'trigger_field', 'type' => 'choices', 'label' => 'Product', 'data' => luca_portfolio_get_post_choices('product')),
                )
            ),
            'active_callback' => 'luca_portfolio_is_product_tab_section_enabled',
        )
    )
);

$wp_customize->add_setting(
    'luca_portfolio_product_section_product_tab_per_row',
    array(
        'default'           => 3,
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_product_section_product_tab_per_row',
    array(
        'label'           => esc_html( 'Products per row', 'luca-portfolio' ),
        'description'     => esc_html('How many products should be shown per row?','luca-portfolio'),
        'section'         => 'luca_portfolio_product_tab_section',
        'settings'        => 'luca_portfolio_product_section_product_tab_per_row',
        'type'            => 'select',
        'active_callback' => 'luca_portfolio_is_product_section_enabled',
        'choices'  => array(
            2 => '2',
            3 => '3',
            4 => '4',
        )
    )
);
