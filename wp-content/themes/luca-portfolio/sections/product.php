<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_product_section', false ) ) {
    return;
}

$section_content['section_product_headline'] = get_theme_mod( 'luca_portfolio_product_section_headline', __( 'My Blog', 'luca-portfolio' ) );
$section_content['section_product_headline_sub'] = get_theme_mod( 'luca_portfolio_product_section_headline_sub', __( 'My shared posts', 'luca-portfolio' ) );
$section_content['section_product_background'] = get_theme_mod( 'luca_portfolio_product_section_background_grey', '--bg-section' );
$section_content['section_product_list'] = get_theme_mod( 'luca_portfolio_product_list');
$section_content['section_product_button_text'] = get_theme_mod( 'luca_portfolio_product_section_button_text');
$section_content['section_product_button_url'] = get_theme_mod( 'luca_portfolio_product_section_button_url');
$section_content['section_product_per_row'] = get_theme_mod( 'luca_portfolio_product_section_product_per_row', 3 );

$section_content = apply_filters( 'luca_portfolio_product_section_content', $section_content );
luca_portfolio_render_product_section( $section_content );

/**
 * Render Product Section
 */
function luca_portfolio_render_product_section($section_content) {
    $bg = $section_content['section_product_background'] ? '--bg-grey':'--bg-section';
?>
    <section id="product" class="product <?php echo isset($section_content['section_product_per_row']) ? 'product-row-'.$section_content['section_product_per_row']:'' ?>" style="background-color: var(<?php echo esc_attr($bg) ?>)">
        <?php
        if ( is_customize_preview() ) :
            luca_portfolio_section_link( 'luca_portfolio_product_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_product_headline']); ?><span><?php echo esc_html($section_content['section_product_headline_sub']); ?></span></h2>
                    <div class="product__list">
                        <?php
                            $args = array(
                                'post_type' => 'product',
                                'post__in'      => $section_content['section_product_list']
                            );
                            $the_query = new WP_Query( $args );
                            if ( $the_query->have_posts() ) :
                                while ( $the_query->have_posts() ) :
                                    $the_query->the_post();
                                    get_template_part( 'woocommerce/content', 'product-item' );
                                endwhile;
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>