<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_blog_section', false ) ) {
    return;
}

$section_content['section_blog_headline'] = get_theme_mod( 'luca_portfolio_blog_section_headline', __( 'My Blog', 'luca-portfolio' ) );
$section_content['section_blog_headline_sub'] = get_theme_mod( 'luca_portfolio_blog_section_headline_sub', __( 'My shared posts', 'luca-portfolio' ) );
$section_content['section_blog_background'] = get_theme_mod( 'luca_portfolio_blog_section_background_grey', '--bg-section' );
$section_content['section_blog_list'] = get_theme_mod( 'luca_portfolio_blog_list');
$section_content['section_blog_button_text'] = get_theme_mod( 'luca_portfolio_blog_section_button_text');
$section_content['section_blog_button_url'] = get_theme_mod( 'luca_portfolio_blog_section_button_url');
$section_content = apply_filters( 'luca_portfolio_blog_section_content', $section_content );
luca_portfolio_render_blog_section( $section_content );

/**
 * Render Blog Section
 */
function luca_portfolio_render_blog_section($section_content) {
    $bg = $section_content['section_blog_background'] ? '--bg-grey':'--bg-section';
?>
    <section id="my-blog" class="my-blog" style="background-color: var(<?php echo esc_attr($bg) ?>)">
        <?php
        if ( is_customize_preview() ) :
            luca_portfolio_section_link( 'luca_portfolio_blog_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="my-blog__inner">
                        <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_blog_headline']); ?><span><?php echo esc_html($section_content['section_blog_headline_sub']); ?></span></h2>
                        <?php if( !empty( $section_content['section_blog_list'] ) ) { ?>
                        <div class="my-blog__list">
                            <?php foreach ( $section_content['section_blog_list'] as $post_id ) {
                                $post = get_post( $post_id );
                                $date = date('F d, Y', strtotime($post->post_date));
                                $get_permalink = get_post_permalink( $post );
                                $get_thumbnail_url = get_the_post_thumbnail_url( $post );
                            ?>
                            <!-- start item blog -->
                            <div class="my-blog__items" data-viewport="opacity">
                                <div class="my-blog__items--inner">
                                    <a class="my-blog__detail" href="<?php echo esc_html($get_permalink); ?>">
                                        <figure class="m-0 ratio ratio-4x3 lazy bg-cover" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
                                        <div class="my-blog__items--content">
                                            <h3><a class="my-blog__detail" href="<?php echo esc_html($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h3>
                                            <div class="entry">
                                                <?php luca_portfolio_entry( $post_id ); ?>
                                            </div>
                                            <span class="entry__date"><?php echo esc_html($date); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <!-- end item blog -->
                            <?php } ?>
                        </div>
                        <?php } ?>

                        <div class="my-blog__button mt-3 d-flex justify-content-center">
                            <a class="pointer-event" href="<?php echo esc_attr($section_content['section_blog_button_url']) ?>"><?php echo esc_html($section_content['section_blog_button_text']) ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script>
    // setting paginator for blog
    SETTING = {
        POST_PER_PAGE: <?php echo 3; ?>,
        LOAD_POST: <?php echo 2; ?>
    }
</script>