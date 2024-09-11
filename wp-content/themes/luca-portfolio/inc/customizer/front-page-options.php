<?php
/**
 * Front Page Options
 *
 * @package Luca_Portfolio
 */

$wp_customize->add_panel(
    'luca_portfolio_front_page_options',
    array(
        'title'    => esc_html__( 'Front Page Sections', 'luca-portfolio' ),
        'priority' => 130,
    )
);

$wp_customize->add_panel(
    'luca_portfolio_theme_options',
    array(
        'title'    => esc_html__( 'Theme Options', 'luca-portfolio' ),
        'priority' => 130,
    )
);

require get_template_directory() . '/inc/customizer/front-page-options/about.php';
require get_template_directory() . '/inc/customizer/front-page-options/resume.php';
require get_template_directory() . '/inc/customizer/front-page-options/service.php';
require get_template_directory() . '/inc/customizer/front-page-options/project.php';
require get_template_directory() . '/inc/customizer/front-page-options/client.php';
require get_template_directory() . '/inc/customizer/front-page-options/price.php';
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';
require get_template_directory() . '/inc/customizer/front-page-options/product.php';
require get_template_directory() . '/inc/customizer/front-page-options/product-tab.php';
require get_template_directory() . '/inc/customizer/front-page-options/contact.php';
require get_template_directory() . '/inc/customizer/front-page-options/footer-options.php';
require get_template_directory() . '/inc/customizer/front-page-options/sidebar-layout.php';
