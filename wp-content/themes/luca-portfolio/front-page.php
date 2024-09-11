<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Luca_Portfolio
 */

get_header();
?>
    <?php
    if ( is_front_page() && ! is_home() ) {
        do_action('luca_portfolio_theme_sections');
    }
    if ( is_front_page() && is_home() ) {
        require get_template_directory() . '/home.php';
    } elseif ( true === get_theme_mod( 'luca_portfolio_enable_frontpage_content', false ) ){ ?>
        <section class="px-50 offset-6">
            <div class="site-content">
                <?php
                    while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
            </div>
        </section>
    <?php } ?>

<?php
get_footer();
