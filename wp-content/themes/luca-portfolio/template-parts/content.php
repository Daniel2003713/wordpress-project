<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Luca_Portfolio
 */

?>
<div class="archive__item <?php echo empty(has_post_thumbnail(get_the_ID())) ? ' none-thumb':'' ?>">
    <div class="archive__item--inner">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php luca_portfolio_post_thumbnail(); ?>
            <div class="archive__item--content">
                <header class="entry-header">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title heading-default-single"><a class="magic-hover magic-hover__square" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;
                    ?>
                </header><!-- .entry-header -->
                <div class="entry">
                    <?php luca_portfolio_entry_footer(); ?>
                </div><!-- .entry-footer -->
                <?php if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php
                        luca_portfolio_posted_on();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </div>
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
</div>