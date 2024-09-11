<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Luca_Portfolio
 */

?>
<!-- start footer -->
<section class="footer px-50 py-3 py-md-4">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <?php
                    $logo_text = get_theme_mod( 'logo_text', 'T' );
                ?>
                <h2 class="footer__logo"><?php echo esc_html($logo_text); ?></h2>
                <div class="footer__social">
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'footer',
                                'menu_class'     => 'footer__social--list'
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end footer -->
<?php wp_footer(); ?>

</body>
</html>
