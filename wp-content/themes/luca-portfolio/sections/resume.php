<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_resume_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_resume_headline'] = get_theme_mod( 'luca_portfolio_resume_section_headline', __( 'My Resume', 'luca-portfolio' ) );
$section_content['section_resume_headline_sub'] = get_theme_mod( 'luca_portfolio_resume_section_headline_sub', __( 'Details about me', 'luca-portfolio' ) );
$section_content['section_resume_background'] = get_theme_mod( 'luca_portfolio_resume_section_background_grey', '--bg-section' );
$section_content['section_resume_list_skill'] = json_to_array(get_theme_mod( 'luca_portfolio_resume_section_skill_list' ));

$section_content = apply_filters( 'luca_portfolio_resume_section_content', $section_content );
luca_portfolio_render_resume_section( $section_content );

/**
 * Render Resume Section
 */
function luca_portfolio_render_resume_section( $section_content ) {
    $list_skill = $section_content['section_resume_list_skill'];
    $bg = $section_content['section_resume_background'] ? '--bg-grey':'--bg-section';
?>
<section id="my-resume" class="my-resume" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_resume_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default opacity " data-viewport="opacity" data-delay="300"><?php echo esc_html($section_content['section_resume_headline']); ?><span><?php echo esc_html($section_content['section_resume_headline_sub']); ?></span></h2>
                <div class="my-resume__list">
                <?php foreach ($list_skill as $skill) { ?>
                    <?php if($skill['field_type'] == 'type_1'): ?>
                        <div class="my-resume__item">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3 mb-md-0">
                                    <h3 class="mt-2 heading-default__small opacity " data-viewport="opacity"><?php echo esc_html($skill['title']); ?></h3>
                                    <div data-viewport="opacity" class="opacity"><?php echo esc_html($skill['subtitle']); ?></div>
                                </div>
                                <div class="col-12 col-md-8 ">
                                    <div class="my-resume__skill">
                                        <?php if(!empty($skill['field_repeater'])) { foreach ( $skill['field_repeater'] as $item_skill ) { ?>
                                            <div class="my-resume__skill--item custom " data-viewport="custom">
                                                <label><?php echo esc_html($item_skill['skill_title']); ?></label>
                                                <div class="my-resume__skill--precent" data-precent="<?php echo esc_attr($item_skill['skill_precent'] . '0'); ?>"><div class="width-<?php echo esc_attr($item_skill['skill_precent'] . '0'); ?>"></div><span class="count"><?php echo esc_html($item_skill['skill_precent'] . '0%'); ?></span></div>
                                            </div>
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php elseif($skill['field_type'] == 'type_2'): ?>
                        <div class="my-resume__item">
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3 mb-md-0">
                                    <h3 class="mt-2 heading-default__small opacity " data-viewport="opacity"><?php echo esc_html($skill['title']); ?></h3>
                                    <div data-viewport="opacity" class="opacity "><?php echo esc_html($skill['subtitle']); ?></div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="">
                                        <div class="education__list">
                                            <?php if(!empty($skill['field_repeater'])) { foreach ( $skill['field_repeater'] as $item_skill ) { ?>
                                                <div class="education__item d-flex justify-content-between opacity " data-viewport="opacity">
                                                    <div class="education__item--left">
                                                        <div class="education__date"><?php echo esc_html($item_skill['skill_title']); ?></div>
                                                    </div>
                                                    <div class="education__item--right">
                                                        <?php echo wp_kses_post($item_skill['skill_content']); ?>
                                                    </div>
                                                </div>
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }