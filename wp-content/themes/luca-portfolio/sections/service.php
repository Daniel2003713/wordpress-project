<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_service_section', false ) ) {
    return;
}
$section_content = array();
$section_content['section_service_headline'] = get_theme_mod( 'luca_portfolio_service_section_headline', __( 'My Services', 'luca-portfolio' ) );
$section_content['section_service_background'] = get_theme_mod( 'luca_portfolio_service_section_background_grey', '--bg-section' );
$section_content['section_service_headline_sub'] = get_theme_mod( 'luca_portfolio_service_section_headline_sub', __( 'Details about me', 'luca-portfolio' ) );
$section_content['section_service_list'] = json_to_array(get_theme_mod( 'luca_portfolio_service_section_list' ));

$section_content = apply_filters( 'luca_portfolio_service_section_content', $section_content );
luca_portfolio_render_service_section( $section_content );

/**
 * Render Resume Section
 */
function luca_portfolio_render_service_section( $section_content ) {
    $service_list = $section_content['section_service_list'];
    $bg = $section_content['section_service_background'] ? '--bg-grey':'--bg-section';
?>
<section id="my-service" class="my-service" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_service_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="my-service__inner">
                    <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_service_headline']); ?><span><?php echo esc_html($section_content['section_service_headline_sub']); ?></span></h2>
                    <?php if(!empty($service_list)) : ?>
                    <div class="my-service__list">
                        <?php foreach ($service_list as $service_item): ?>
                            <div class="my-service__item" data-viewport="opacity">
                                <i class="<?php echo esc_attr('fa ' . $service_item['icon_value']) ?>"></i>
                                <h3 class="my-service__title"><?php echo esc_html($service_item['title']) ?></h3>
                                <div class="my-service__intro">
                                    <?php echo esc_html($service_item['text']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>