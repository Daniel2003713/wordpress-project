<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_contact_section', false ) ) {
    return;
}
$form = get_theme_mod( 'luca_portfolio_contact_section_form', false );

$section_content = array();
$section_content['section_contact_headline'] = get_theme_mod( 'luca_portfolio_contact_section_headline', __( 'Contact Me', 'luca-portfolio' ) );
$section_content['section_contact_background'] = get_theme_mod( 'luca_portfolio_contact_section_background_grey', '--bg-section' );
$section_content['section_contact_map'] = get_theme_mod( 'luca_portfolio_contact_section_map' );
$section_content['section_contacts'] = json_to_array(get_theme_mod( 'luca_portfolio_contact_section_list' ));
$section_content['section_contact_form'] = get_theme_mod( 'luca_portfolio_contact_section_form' );
$section_content = apply_filters( 'luca_portfolio_contact_section_content', $section_content );
luca_portfolio_render_contact_section( $section_content );

/**
 * Render Contact Section
 */
function luca_portfolio_render_contact_section($section_content) {
    $form = $section_content['section_contact_form'];
    $contacts = $section_content['section_contacts'];
    $bg = $section_content['section_contact_background'] ? '--bg-grey':'--bg-section';
?>
<section id="contact" class="contact" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_contact_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="contact__inner">
                    <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_contact_headline']); ?></h2>
                    <div class="contact__maps" data-viewport="opacity" style="overflow:hidden;">
                        <?php echo trim($section_content['section_contact_map']); ?>
                    </div>
                    <div class="contact__list d-flex justify-content-between" data-viewport="opacity">
                        <?php if(!empty($contacts)): ?>
                            <?php foreach ($contacts as $item): ?>
                            <div class="contact__item mb-4">
                                <div class="text-center">
                                    <i class="fa <?php echo esc_attr($item['icon_value']); ?>"></i>
                                    <span><?php echo esc_html($item['text']); ?></span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12" data-viewport="opacity">
                            <div class="contact__inner">
                                <?php echo do_shortcode($form);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
