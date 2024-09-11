<?php
/**
 * About Section
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_section(
    'luca_portfolio_about_section',
    array(
        'panel'    => 'luca_portfolio_front_page_options',
        'title'    => esc_html__( 'About Section', 'luca-portfolio' ),
        'priority' => luca_portfolio_priority_section('luca_portfolio_about_section'),
    )
);

// About Section - Enable Section.
$wp_customize->add_setting(
    'luca_portfolio_enable_about_section',
    array(
        'default'           => false,
        'sanitize_callback' => 'luca_portfolio_sanitize_switch',
    )
);

$wp_customize->add_control(
    new Luca_Portfolio_Toggle_Switch_Custom_Control(
        $wp_customize,
        'luca_portfolio_enable_about_section',
        array(
            'label'    => esc_html__( 'Enable About Section', 'luca-portfolio' ),
            'section'  => 'luca_portfolio_about_section',
            'settings' => 'luca_portfolio_enable_about_section',
        )
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial(
        'luca_portfolio_enable_about_section',
        array(
            'selector' => '#about-me .section-link',
            'settings' => 'luca_portfolio_enable_about_section',
        )
    );
}

// Avatar
$wp_customize->add_setting(
    'luca_portfolio_about_avatar',
    array(
        'sanitize_callback' => 'luca_portfolio_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'luca_portfolio_about_avatar',
        array(
            'label'           => esc_html__( 'Avatar Image', 'luca-portfolio' ),
            'section'         => 'luca_portfolio_about_section',
            'settings'        => 'luca_portfolio_about_avatar',
            'active_callback' => 'luca_portfolio_is_about_section_enabled',
        )
    )
);

// About Section - Short Description.
$wp_customize->add_setting(
    'luca_portfolio_about_section_description',
    array(
        'default'           => '<p>Senior UX designer with 7+years experience and specialization in complex web application design.</p>
                                <p>Achieved 15% increase in user satisfaction and 20% increase in conversions through the creation of interactively tested, data-driven, and user-centered design.</p>',
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'luca_portfolio_about_section_description',
    array(
        'label'           => esc_html__( 'Description', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_about_section',
        'settings'        => 'luca_portfolio_about_section_description',
        'type'            => 'textarea',
        'active_callback' => 'luca_portfolio_is_about_section_enabled',
    )
);

// Name
$wp_customize->add_setting(
    'luca_portfolio_about_section_name',
    array(
        'default'           => __( 'I AM LUCA.', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_about_section_name',
    array(
        'label'           => esc_html__( 'Full Name', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_about_section',
        'settings'        => 'luca_portfolio_about_section_name',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_about_section_enabled',
    )
);

// Short Job
$wp_customize->add_setting(
    'luca_portfolio_about_section_short_job',
    array(
        'default'           => __( 'UI/UX Designer & Developer', 'luca-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'luca_portfolio_about_section_short_job',
    array(
        'label'           => esc_html__( 'Short Job', 'luca-portfolio' ),
        'section'         => 'luca_portfolio_about_section',
        'settings'        => 'luca_portfolio_about_section_short_job',
        'type'            => 'text',
        'active_callback' => 'luca_portfolio_is_about_section_enabled',
    )
);

