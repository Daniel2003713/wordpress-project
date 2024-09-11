<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Luca_Portfolio
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'luca-portfolio' ); ?></a>

    <section class="header d-flex align-content-center flex-row lazy">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="header_inner d-flex align-items-center justify-content-between">
                        <div class="">
                            <?php if ( has_custom_logo() ) : ?>
                                <div class="site-logo">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <?php the_custom_logo(); ?>
                                    </a>
                                </div>
                            <?php else : ?>
                                <?php
                                $logo_text = get_theme_mod( 'logo_text', 'T' );
                                ?>
                                <div class="site-identity">
                                    <?php if ( is_front_page() || is_home() ) : ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <h1 class="site-title header__logo m-0"><?php bloginfo( 'name' ); ?><span><?php bloginfo( 'description' ); ?></span></h1>
                                        </a>
                                    <?php else : ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <h3 class="site-title header__logo m-0"><?php bloginfo( 'name' ); ?><span><?php bloginfo( 'description' ); ?></span></h3>
                                        </a>
                                    <?php endif;  ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="header__menu ms-2 me-2 mx-lg-auto d-flex flex-row justify-content-center align-items-center">
                            <a class="header__button-menu d-inline-flex d-lg-none" href="#"></a>
                            <div class="header__nav d-flex align-items-center justify-content-center flex-md-row flex-column mx-0 mx-lg-3 py-5 py-md-0">
                                <?php
                                    if( is_front_page() || is_home() ) {
                                        if ( has_nav_menu( 'primary' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                    'menu_class'     => 'header__navigation nav d-flex flex-column flex-lg-row justify-content-center align-items-center'
                                                )
                                            );
                                        }
                                    } else {
                                        if ( has_nav_menu( 'not_home_nav' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'not_home_nav',
                                                    'menu_class'     => 'header__navigation nav d-flex flex-column flex-lg-row justify-content-center align-items-center'
                                                )
                                            );
                                        } elseif ( has_nav_menu( 'primary' ) ) {
                                            wp_nav_menu(
                                                array(
                                                    'theme_location' => 'primary',
                                                    'menu_class'     => 'header__navigation nav d-flex flex-column flex-lg-row justify-content-center align-items-center'
                                                )
                                            );
                                        }
                                    }
                                ?>
                                <div class="header__social mt-auto d-flex d-md-none">
                                    <?php $social = json_to_array(get_theme_mod( 'luca_portfolio_header_social' )); ?>
                                    <?php if( !empty( $social ) ): ?>
                                        <ul class="social d-flex justify-content-center">
                                            <?php foreach ( $social as $item ): ?>
                                                <li class="li-<?php echo esc_attr($item['icon_value']) ?>"> <a style="--hover-color: <?php echo esc_attr($item['color']) ?>" class="" href="#" target="_blank" rel="alternate" title="<?php echo esc_attr($item['icon_value']) ?>"> <i class="fa <?php echo esc_attr($item['icon_value']) ?>"></i></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <a class="button-dark-mode" href="#"><i class="icofont-moon"></i></a>
                            <?php if(luca_is_woocommerce()) : ?>
                                <div class="header__cart">
                                    <?php do_action('luca_portfolio_mini_cart'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="header__social ms-auto d-flex d-none d-md-block">
                            <?php $social = json_to_array(get_theme_mod( 'luca_portfolio_header_social' )); ?>
                            <?php if( !empty( $social ) ): ?>
                                <ul class="social d-flex justify-content-center pb-2 ms-3">
                                    <?php foreach ( $social as $item ): ?>
                                        <li class="li-<?php echo esc_attr($item['icon_value']) ?>"> <a style="--hover-color: <?php echo esc_attr($item['color']) ?>" class="" href="<?php echo esc_attr($item['link']) ?>" target="_blank" rel="alternate" title="<?php echo esc_attr($item['icon_value']) ?>"> <i class="fa <?php echo esc_attr($item['icon_value']) ?>"></i></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="header--fixed"></div>

