<?php
define( 'SECTIONS_ORDER_VERSION', '1.0.0' );

require get_template_directory() . '/inc/customizer/sanitize-callback.php';

require get_template_directory() . '/inc/customizer/active-callback.php';

require get_template_directory() . '/inc/customizer/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function luca_portfolio_customize_register($wp_customize) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // Custom logo text
    $wp_customize->add_setting(
        'logo_text', array(
            'default' => 'T',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'logo_text', array(
            'label'    => esc_html__( 'Logo text', 'luca-portfolio' ),
            'type'     => 'text',
            'section'    => 'title_tagline',
            'priority' => 10,
        )
    );

    // Save order section
    $wp_customize->add_setting(
        'sections_order', array(
            'sanitize_callback' => 'sanitize_sections_order',
        )
    );
    $wp_customize->add_control(
        'sections_order', array(
            'section'  => 'static_front_page',
            'type'     => 'hidden',
            'priority' => 80,
        )
    );

    // Homepage Settings - Enable Homepage Content.
    $wp_customize->add_setting(
        'luca_portfolio_enable_frontpage_content',
        array(
            'default'           => false,
            'sanitize_callback' => 'luca_portfolio_sanitize_checkbox',
        )
    );

    $wp_customize->add_control(
        'luca_portfolio_enable_frontpage_content',
        array(
            'label'           => esc_html__( 'Enable Homepage Content', 'luca-portfolio' ),
            'description'     => esc_html__( 'Check to enable content on static homepage.', 'luca-portfolio' ),
            'section'         => 'static_front_page',
            'type'            => 'checkbox',
            'active_callback' => 'luca_portfolio_is_static_homepage_enabled',
        )
    );

    // Front Page Options.
    require get_template_directory() . '/inc/customizer/front-page-options.php';
    $wp_customize->register_control_type( 'Luca_Portfolio_Customize_Select_Multiple' );
}
add_action( 'customize_register', 'luca_portfolio_customize_register' );

function luca_portfolio_sections_order_section_priority( $value, $key = '' ) {
    $orders = get_theme_mod( 'sections_order' );
    if ( ! empty( $orders ) ) {
        $json = json_decode( $orders );
        if ( isset( $json->$key ) ) {
            return $json->$key;
        }
    }

    return $value;
}
add_filter( 'section_priority', 'luca_portfolio_sections_order_section_priority', 10, 2 );

/**
 * Function to refresh customize preview when changing sections order
 */
function luca_portfolio_refresh_customize_preview() {
    $section_order         = get_theme_mod( 'sections_order' ); // Edit this
    $section_order_decoded = json_decode( $section_order, true );
    if ( ! empty( $section_order_decoded ) ) {
        remove_all_actions( 'luca_portfolio_theme_sections' );
        foreach ( $section_order_decoded as $k => $priority ) {
            if ( function_exists( $k ) ) {
                add_action( 'luca_portfolio_theme_sections', $k, $priority );
            }
        }
    }
}
add_action( 'customize_preview_init', 'luca_portfolio_refresh_customize_preview', 1 );

if ( ! function_exists( 'luca_portfolio_about_section' ) ) {
    function luca_portfolio_about_section() {
        require get_template_directory() . '/sections/about.php';
    }
}
if ( ! function_exists( 'luca_portfolio_resume_section' ) ) {
    function luca_portfolio_resume_section() {
        require get_template_directory() . '/sections/resume.php';
    }
}
if ( ! function_exists( 'luca_portfolio_service_section' ) ) {
    function luca_portfolio_service_section() {
        require get_template_directory() . '/sections/service.php';
    }
}
if ( ! function_exists( 'luca_portfolio_project_section' ) ) {
    function luca_portfolio_project_section() {
        require get_template_directory() . '/sections/project.php';
    }
}
if ( ! function_exists( 'luca_portfolio_client_section' ) ) {
    function luca_portfolio_client_section() {
        require get_template_directory() . '/sections/client.php';
    }
}
if ( ! function_exists( 'luca_portfolio_price_section' ) ) {
    function luca_portfolio_price_section() {
        require get_template_directory() . '/sections/price.php';
    }
}
if ( ! function_exists( 'luca_portfolio_blog_section' ) ) {
    function luca_portfolio_blog_section() {
        require get_template_directory() . '/sections/blog.php';
    }
}
if ( ! function_exists( 'luca_portfolio_product_section' ) ) {
    function luca_portfolio_product_section() {
        require get_template_directory() . '/sections/product.php';
    }
}
if ( ! function_exists( 'luca_portfolio_product_tab_section' ) ) {
    function luca_portfolio_product_tab_section() {
        require get_template_directory() . '/sections/product-tab.php';
    }
}
if ( ! function_exists( 'luca_portfolio_contact_section' ) ) {
    function luca_portfolio_contact_section() {
        require get_template_directory() . '/sections/contact.php';
    }
}
/**
 * Enqueue script for custom customize control.
 */
function luca_portfolio_custom_control_scripts() {
    // Append .min if SCRIPT_DEBUG is false.
    $min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    wp_enqueue_style( 'luca-portfolio-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
    wp_enqueue_script( 'luca-portfolio-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), LUCA_PORTFOLIO_VERSION, true );

    wp_enqueue_script( 'luca-portfolio-order-script', get_template_directory_uri() . '/assets/js/customizer-sections-order.js', array( 'jquery', 'jquery-ui-sortable' ), LUCA_PORTFOLIO_VERSION, true );
    $control_settings = array(
        'sections_container' => '#sub-accordion-panel-luca_portfolio_front_page_options',
        'saved_data_input'   => '#customize-control-sections_order input',
    );
    wp_localize_script( 'luca-portfolio-order-script', 'control_settings', $control_settings );
    wp_enqueue_style( 'luca-portfolio-order-style', get_template_directory_uri() . '/assets/css/customizer-sections-order-style.css', array( 'dashicons' ), LUCA_PORTFOLIO_VERSION );

}
add_action( 'customize_controls_enqueue_scripts', 'luca_portfolio_custom_control_scripts' );