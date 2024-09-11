<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_client_section', false ) ) {
    return;
}
$section_content = array();
$section_content['section_client_headline'] = get_theme_mod( 'luca_portfolio_client_section_headline', __( 'My Client', 'luca-portfolio' ) );
$section_content['section_client_headline_sub'] = get_theme_mod( 'luca_portfolio_client_section_headline_sub', __( 'What customers say about us', 'luca-portfolio' ) );
$section_content['section_client_background'] = get_theme_mod( 'luca_portfolio_client_section_background_grey', '--bg-section' );
$section_content['section_client_list'] = json_to_array(get_theme_mod( 'luca_portfolio_resume_section_client_list' ));
$section_content = apply_filters( 'luca_portfolio_client_section_content', $section_content );
luca_portfolio_render_client_section( $section_content );

/**
 * Render Client Section
 */
function luca_portfolio_render_client_section( $section_content ) {
    $list_client = $section_content['section_client_list'];
    $bg = $section_content['section_client_background'] ? '--bg-grey':'--bg-section';
?>
<section id="my-client" class="my-client" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_client_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_client_headline']); ?><span><?php echo esc_html($section_content['section_client_headline_sub']); ?></span></h2>
                <div class="row">
                    <div class="col-12 col-md-8 offset-0 offset-md-2" data-viewport="opacity">
                        <?php if(!empty($list_client)) { ?>
                        <div class="my-client__list my-client__js owl-carousel owl-theme">
                            <!-- start client item -->
                            <?php foreach ($list_client as $items) {
                                foreach ($items['field_repeater'] as $item) { ?>
                                    <div class="my-client__item">
                                        <figure class="mx-auto mb-4 ratio ratio-1x1 rounded-circle bg-cover owl-lazy" data-src="<?php echo esc_html($item['client_image']); ?>"></figure>
                                        <div class="my-client__intro mb-4"><?php echo esc_html($item['client_content']); ?></div>
                                        <h2 class="my-client__name mb-1"><?php echo esc_html($item['client_name']); ?></h2>
                                        <p class="my-client__position"><?php echo esc_html($item['client_job']); ?></p>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <!-- end client item -->
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }
