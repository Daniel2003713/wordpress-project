<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Luca_Portfolio
 */

get_header();
?>
<main id="content" class="site-main home">
    <?php if ( is_home() && ! is_front_page() ) : ?>
    <section class="heading-default-two">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                        <header>
                            <h1 class="page-title"><?php single_post_title(); ?></h1>
                        </header>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="block-content py-5">
        <div class="container-xl">
            <div class="row">
                <?php
                $sidebar = luca_portfolio_is_sidebar_enabled();
                $col_one = '';
                $col_two = '';
                if($sidebar == 'right-sidebar') {
                    $col_one = 'col-12 col-md-9 pe-md-4';
                    $col_two = 'col-12 col-md-3';
                } elseif($sidebar == 'left-sidebar') {
                    $col_one = 'col-12 col-md-9 ps-md-4';
                    $col_two = 'col-12 col-md-3 order-first';
                }  elseif($sidebar == 'no-sidebar') {
                    $col_one = 'col-12';
                    $col_two = 'd-none';
                }
                ?>
                <div class="<?php echo $col_one; ?>">
                    <div class="archive__inner">
                        <div class="archive__list">
                            <?php
                            if ( have_posts() ) :
                                ?>
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();
                                    /*
                                    * Include the Post-Type-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                    */
                                    get_template_part( 'template-parts/content', get_post_type() );
                                endwhile;
                            else :
                                get_template_part( 'template-parts/content', 'none' );
                            endif;
                            ?>
                        </div>
                        <?php
                            do_action( 'luca_portfolio_posts_pagination' );
                        ?>
                    </div>
                </div>
                <div class="<?php echo $col_two; ?>">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
