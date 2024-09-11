<?php
/**
 * Footer Options
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_section(
    'luca_portfolio_footer_options',
    array(
        'title'    => esc_html__( 'Footer Options', 'luca-portfolio' ),
    )
);

// Left intro
$wp_customize->add_setting(
    'luca_portfolio_footer_left_introduction_text',
    array(
        'default'           => __( 'Copyright © 2022 All rights reserved.', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_left_introduction_text',
    array(
        'label'           => esc_html__( 'Text Left', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_footer_options',
        'settings'        => 'luca_portfolio_footer_left_introduction_text',
        'type'            => 'text',
    )
);

// Label CV
$wp_customize->add_setting(
    'luca_portfolio_footer_right_label',
    array(
        'default'           => __( 'Download CV', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_footer_right_label',
    array(
        'label'           => esc_html__( 'Right Label', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_footer_options',
        'settings'        => 'luca_portfolio_footer_right_label',
        'type'            => 'text',
    )
);

// File CV
$wp_customize->add_setting(
    'luca_portfolio_footer_right_url_cv',
    array(
        'sanitize_callback'  => 'ic_sanitize_pdf',
    )
);
$wp_customize->add_control(
    new WP_Customize_Upload_Control(
        $wp_customize,
        'luca_portfolio_footer_right_url_cv',
        array(
            'label'           => esc_html__( 'URL File CV', 'luca-portfolio' ),
            'section'         => 'luca_portfolio_footer_options',
            'settings'        => 'luca_portfolio_footer_right_url_cv',
        )
    )
);