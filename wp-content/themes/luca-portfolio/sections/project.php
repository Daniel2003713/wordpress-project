<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_project_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_project_headline'] = get_theme_mod( 'luca_portfolio_project_section_headline', __( 'My Project', 'luca-portfolio' ) );
$section_content['section_project_headline_sub'] = get_theme_mod( 'luca_portfolio_project_section_headline_sub', __( 'Projects that I have done', 'luca-portfolio' ) );
$section_content['section_project_background'] = get_theme_mod( 'luca_portfolio_project_section_background_grey', '--bg-section' );
$section_content['section_project_list'] = json_to_array(get_theme_mod( 'luca_portfolio_resume_section_project_list' ));
$section_content = apply_filters( 'luca_portfolio_project_section_content', $section_content );
luca_portfolio_render_project_section( $section_content );

/**
 * Render Project Section
 */
function luca_portfolio_render_project_section( $section_content ) {
    $list_project = $section_content['section_project_list'];
    $bg = $section_content['section_project_background'] ? '--bg-grey':'--bg-section';
?>
<section id="my-project" class="my-project" style="background-color: var(<?php echo esc_attr($bg) ?>)">
    <?php
    if ( is_customize_preview() ) :
        luca_portfolio_section_link( 'luca_portfolio_project_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="my-project__inner">
                    <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_project_headline']); ?><span><?php echo esc_html($section_content['section_project_headline_sub']); ?></span></h2>
                    <?php if(!empty($list_project)) { ?>
                    <div class="row">
                        <div class="col-12 pb-3 pb-lg-2">
                            <ul class="my-project__nav nav d-flex justify-content-center" id="project-nav" data-viewport="opacity">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo esc_html__( 'All', 'luca-portfolio' ) ?></button>
                                </li>
                                <?php foreach ($list_project as $nav) { ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="" id="<?php echo esc_attr(sanitize_title($nav['title'])); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr(sanitize_title($nav['title'])); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr(sanitize_title($nav['title'])); ?>" aria-selected="false"><?php echo esc_html($nav['title']); ?></button>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-12 py-1">
                            <div class="tab-content" data-viewport="opacity" id="project-nav-content">
                                <!-- start all project -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="project__list">
                                        <?php foreach ($list_project as $items) {
                                            if(!empty($items['field_repeater'])) {
                                            foreach ($items['field_repeater'] as $item) { ?>
                                                <div class="product__item">
                                                    <figure class="ratio ratio-4x3 lazy" data-src="<?php echo esc_attr($item['project_image']); ?>">
                                                        <div class="product__content">
                                                            <h4 class="product__name mt-0 mb-2"><?php echo esc_html($item['project_name']); ?></h4>
                                                            <p class="product__score mb-2"><?php echo esc_html($item['project_category']); ?></p>
                                                            <div class="product__view">
                                                                <a class="<?php echo esc_attr(empty($item['project_url']) ? 'button-image':'') ?>" href="<?php echo esc_attr(!empty($item['project_url']) ? $item['project_url']:$item['project_image']); ?>">View Detail</a>
                                                            </div>
                                                        </div>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                        <?php } } ?>
                                    </div>
                                </div>
                                <!-- end all project -->

                                <!-- start project item -->
                                <?php foreach ($list_project as $items) { ?>
                                <div class="tab-pane fade" id="<?php echo esc_attr(sanitize_title($items['title'])); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr(sanitize_title($items['title'])); ?>-tab">
                                    <div class="project__list">
                                        <?php foreach ($items['field_repeater'] as $item) { ?>
                                            <div class="product__item">
                                                <figure class="ratio ratio-4x3 lazy" data-src="<?php echo esc_attr($item['project_image']); ?>">
                                                    <div class="product__content">
                                                        <h4 class="product__name mt-0 mb-2"><?php echo esc_html($item['project_name']); ?></h4>
                                                        <p class="product__score mb-2"><?php echo esc_html($item['project_category']); ?></p>
                                                        <div class="product__view">
                                                            <a class="<?php echo esc_attr(empty($item['project_url']) ? 'button-image':'') ?>" href="<?php echo esc_attr(!empty($item['project_url']) ? $item['project_url']:$item['project_image']); ?>">View Detail</a>
                                                        </div>
                                                    </div>
                                                </figure>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- end project item -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }

