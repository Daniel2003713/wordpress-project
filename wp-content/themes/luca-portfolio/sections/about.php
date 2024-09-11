<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_about_section', false ) ) {
	return;
}
$section_content = array();
$section_content['section_about_avatar'] = get_theme_mod( 'luca_portfolio_about_avatar');
$section_content['section_about_description'] = get_theme_mod( 'luca_portfolio_about_section_description', '<p>Senior UX designer with 7+years experience and specialization in complex web application design.</p><p>Achieved 15% increase in user satisfaction and 20% increase in conversions through the creation of interactively tested, data-driven, and user-centered design.</p>');
$section_content['section_about_name'] = get_theme_mod( 'luca_portfolio_about_section_name', __( 'I AM LUCA.', 'luca-portfolio' ) );
$section_content['section_about_short_job'] = get_theme_mod( 'luca_portfolio_about_section_short_job', 'UI/UX Designer & Developer');

$section_content = apply_filters( 'luca_portfolio_about_section_content', $section_content );

luca_portfolio_render_about_section( $section_content );

/**
 * Render About Section
 */
function luca_portfolio_render_about_section( $section_content ) {
?>
<section id="about-me" class="about-me mb-0 p-50  bg-grey">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_about_section' );
    endif;
    ?>
    <div class="about-me__inner">
        <div class="row">
            <div class="col-12">
                <figure class="about-me__avatar rounded-circle mx-auto mb-3 ratio ratio-1x1 bg-cover custom" data-viewport="custom" data-delay="1000" style="background-image: url(<?php echo esc_url( $section_content['section_about_avatar'] ); ?>)"></figure>
                <div class="about-me__intro opacity" data-viewport="opacity" data-delay="500">
                    <?php echo wp_kses_post($section_content['section_about_description']); ?>
                </div>
                <h3 class="about-me__name fs-4 mb-2 text-center opacity" data-viewport="opacity" data-delay="600"><?php echo esc_html($section_content['section_about_name']); ?></h3>
                <p class="about-me__position text-center m-0 opacity" data-viewport="opacity" data-delay="600"><?php echo esc_html($section_content['section_about_short_job']); ?></p>
            </div>
        </div>
    </div>
</section>
<?php
}
