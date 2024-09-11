<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_price_section', false ) ) {
    return;
}
$section_content = array();
$section_content['section_price_headline'] = get_theme_mod( 'luca_portfolio_price_section_headline', __( 'Price', 'luca-portfolio' ) );
$section_content['section_price_headline_sub'] = get_theme_mod( 'luca_portfolio_price_section_headline_sub', __( 'Price', 'luca-portfolio' ) );
$section_content['section_price_background'] = get_theme_mod( 'luca_portfolio_price_section_background_grey', '--bg-section' );
$section_content['section_price_list'] = json_to_array(get_theme_mod( 'luca_portfolio_resume_section_price_list' ));
$section_content = apply_filters( 'luca_portfolio_price_section_content', $section_content );
luca_portfolio_render_price_section( $section_content );

/**
 * Render Price Section
 */
function luca_portfolio_render_price_section( $section_content ) {
    $list_price = $section_content['section_price_list'];
    $bg = $section_content['section_price_background'] ? '--bg-grey':'--bg-section';
?>
<section id="price" class="price" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_client_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_price_headline']); ?><span>My shared posts</span></h2>
                <div class="row">
                    <div class="col-12" data-viewport="opacity">
                        <?php if(!empty($list_price)) { ?>
                            <div class="price__list">
                            <?php foreach ($list_price as $data) {
                                foreach ($data['field_repeater'] as $price) { ?>
                                <div class="price__item">
                                    <div class="price__item--inner">
                                        <h4 class="price__name"><?php echo esc_html($price['price_title']); ?></h4>
                                        <div class="price__cost"><?php echo wp_kses_post($price['price_value']); ?></div>
                                        <div class="price__content">
                                            <?php echo wp_kses_post($price['price_description']); ?>
                                        </div>
                                        <div class="price_button">
                                            <a href="<?php echo esc_attr($price['price_button_url']); ?>"><?php echo esc_html($price['price_button_text']); ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
