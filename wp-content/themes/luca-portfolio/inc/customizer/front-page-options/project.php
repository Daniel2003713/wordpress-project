<?php
/**
 * Project Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Project Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_project_section'),
);
//$wp_customize->add_section(
//    'luca_portfolio_project_section',
//    $default_args
//);
$wp_customize->add_section(
    new Luca_Portfolio_Custom_Section(
        $wp_customize,
        'luca_portfolio_project_section',
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
	'luca_portfolio_enable_project_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_project_section',
		array(
			'label'    => esc_html__( 'Enable Project Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_project_section',
			'settings' => 'luca_portfolio_enable_project_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_project_section',
		array(
			'selector' => '#my-project .section-link',
			'settings' => 'luca_portfolio_enable_project_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_project_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_project_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_project_section',
            'settings' => 'luca_portfolio_project_section_background_grey',
            'active_callback' => 'luca_portfolio_is_project_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_project_section_headline',
    array(
        'default'           => __( 'My Project', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_project_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_project_section',
        'settings'        => 'luca_portfolio_project_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_project_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_project_section_headline_sub',
    array(
        'default'           => __( 'Projects that I have done', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_project_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_project_section',
        'settings'        => 'luca_portfolio_project_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_project_section_enabled',
    )
);

// List Project
$wp_customize->add_setting(
    'luca_portfolio_resume_section_project_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_resume_section_project_list',
        array(
            'label'   => esc_html__('Project','luca-portfolio'),
            'label_item'   => esc_html__('Project Item','luca-portfolio'),
            'section' => 'luca_portfolio_project_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'project_name' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Name Project'),
                    'project_category' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Category'),
                    'project_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Image'),
                    'project_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'URL', 'placeholder' => '#'),
                )
            ),
            'active_callback' => 'luca_portfolio_is_project_section_enabled',
        )
    )
);
