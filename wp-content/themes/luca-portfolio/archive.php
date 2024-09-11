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
<main id="content" class="site-main">
    <section class="heading-default-two">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <header class="page-header">
                        <?php
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </header><!-- .page-header -->
                </div>
            </div>
        </div>
    </section>

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
                    <div class="archive__inner ">
                        <div class="archive__list">
                            <?php if ( have_posts() ) : ?>
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
