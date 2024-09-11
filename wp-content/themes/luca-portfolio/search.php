<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Luca_Portfolio
 */

get_header();
?>
<main id="content" class="site-main">
    <section class="block-default px-50  bg-grey">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="archive__inner">
                        <header class="page-header">
                            <h1 class="page-title">
                                <?php
                                /* translators: %s: search query. */
                                printf( esc_html__( 'Search Results for: %s', 'luca-portfolio' ), '<span>' . get_search_query() . '</span>' );
                                ?>
                            </h1>
                        </header><!-- .page-header -->
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
                                    get_template_part( 'template-parts/content', 'search' );
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
            </div>
        </div>
    </section>
</main><!-- #main -->
<?php
get_footer();
