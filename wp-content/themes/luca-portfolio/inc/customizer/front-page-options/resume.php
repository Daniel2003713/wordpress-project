<?php
/**
 * Skill Section
 *
 * @package Luca_Portfolio
 */

$default_args = array(
    'panel'    => 'luca_portfolio_front_page_options',
    'title'    => esc_html__( 'Resume Section', 'luca-portfolio' ),
    'priority' => luca_portfolio_priority_section('luca_portfolio_resume_section'),
);
//$wp_customize->add_section(
//    'luca_portfolio_resume_section',
//    $default_args
//);
$wp_customize->add_section(
    new Luca_Portfolio_Custom_Section(
        $wp_customize,
        'luca_portfolio_resume_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'luca-portfolio' ),
                'url'              => LUCA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);

// Skill Section - Enable Section.
$wp_customize->add_setting(
	'luca_portfolio_enable_resume_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'luca_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Luca_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'luca_portfolio_enable_resume_section',
		array(
			'label'    => esc_html__( 'Enable Resume Section', 'luca-portfolio' ),
			'section'  => 'luca_portfolio_resume_section',
			'settings' => 'luca_portfolio_enable_resume_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'luca_portfolio_enable_resume_section',
		array(
			'selector' => '#my-resume .section-link',
			'settings' => 'luca_portfolio_enable_resume_section',
		)
	);
}

// Background grey
$wp_customize->add_setting(
    'luca_portfolio_resume_section_background_grey',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_resume_section_background_grey',
        array(
            'label'    => esc_html__( 'Background Grey', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_resume_section',
            'settings' => 'luca_portfolio_resume_section_background_grey',
            'active_callback' => 'luca_portfolio_is_resume_section_enabled',
        )
    )
);

// Headline
$wp_customize->add_setting(
    'luca_portfolio_resume_section_headline',
    array(
        'default'           => __( 'My Resume', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_resume_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_resume_section',
        'settings'        => 'luca_portfolio_resume_section_headline',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_resume_section_enabled',
    )
);

$wp_customize->add_setting(
    'luca_portfolio_resume_section_headline_sub',
    array(
        'default'           => __( 'Details about me', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_resume_section_headline_sub',
    array(
        'label'           => esc_html__( 'Headline sub', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_resume_section',
        'settings'        => 'luca_portfolio_resume_section_headline_sub',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_resume_section_enabled',
    )
);

// Skill & List Skill
$wp_customize->add_setting(
    'luca_portfolio_resume_section_skill_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Luca_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'luca_portfolio_resume_section_skill_list',
        array(
            'label'   => esc_html__('Resume','luca-portfolio'),
            'label_item'   => esc_html__('Resume Item','luca-portfolio'),
            'section' => 'luca_portfolio_resume_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_subtitle_control' => true,
            'custom_repeater_radio_control' => array(
                'name' => 'radio_type',
                'id' => 'radio_type',
                'label' => esc_html__( 'Type', 'luca-portfolio' ),
                'description' => esc_html__( 'This is a custom radio input.', 'luca-portfolio' ),
                'choices' => array(
                    'type_1' => esc_html__( 'Type 1 (for Precent)', 'luca-portfolio' ),
                    'type_2' => esc_html__( 'Type 2 (for Content)', 'luca-portfolio' ),
                ),
            ),
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'skill_title' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Label'),
                    'skill_precent' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Precent', 'placeholder' => '1-10'),
                    'skill_content' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Content'),
                )
            ),
            'active_callback' => 'luca_portfolio_is_resume_section_enabled',
        )
    )
);

