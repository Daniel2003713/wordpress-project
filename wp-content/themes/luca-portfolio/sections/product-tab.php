<?php
if ( ! get_theme_mod( 'luca_portfolio_enable_product_tab_section', false ) ) {
    return;
}

$section_content['section_product_tab_headline'] = get_theme_mod( 'luca_portfolio_product_tab_section_headline', __( 'Products Tab', 'luca-portfolio' ) );
$section_content['section_product_tab_headline_sub'] = get_theme_mod( 'luca_portfolio_product_tab_section_headline_sub', __( 'List product hot', 'luca-portfolio' ) );
$section_content['section_product_tab_background'] = get_theme_mod( 'luca_portfolio_product_tab_section_background_grey', '--bg-section' );
$section_content['section_product_tab_list'] = json_to_array(get_theme_mod( 'luca_portfolio_product_tab_list'));
$section_content['section_product_per_row'] = get_theme_mod( 'luca_portfolio_product_section_product_tab_per_row', 3 );

$section_content = apply_filters( 'luca_portfolio_product_tab_section_content', $section_content );
luca_portfolio_product_tab_section_content( $section_content );

/**
 * Render Product Tab Section
 */
function luca_portfolio_product_tab_section_content($section_content) {
    $bg = $section_content['section_product_tab_background'] ? '--bg-grey':'--bg-section';
    $list_product = $section_content['section_product_tab_list'];
?>
    <section id="product-tab" class="product-tab <?php echo isset($section_content['section_product_per_row']) ? 'product-row-'.$section_content['section_product_per_row']:'' ?>" style="background-color: var(<?php echo esc_attr($bg) ?>)">
        <?php
        if ( is_customize_preview() ) :
            luca_portfolio_section_link( 'luca_portfolio_product_tab_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading-default" data-viewport="opacity"><?php echo esc_html($section_content['section_product_tab_headline']); ?><span><?php echo esc_html($section_content['section_product_tab_headline_sub']); ?></span></h2>
                    <?php
                        if(!empty($list_product)) :
                        $products = array();
                    ?>
                        <div class="col-12 pb-3 pb-lg-2">
                            <ul class="my-project__nav nav d-flex justify-content-center" id="product-tab-nav" data-viewport="opacity">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="all-tab-product" data-bs-toggle="tab" data-bs-target="#all-product" type="button" role="tab" aria-controls="all-product" aria-selected="true"><?php echo esc_html__( 'All', 'luca-portfolio' ) ?></button>
                                </li>
                                <?php foreach ($list_product as $nav) { ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="" id="<?php echo esc_attr(sanitize_title($nav['title'])); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr(sanitize_title($nav['title'])); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr(sanitize_title($nav['title'])); ?>" aria-selected="false"><?php echo esc_html($nav['title']); ?></button>
                                    </li>
                                    <?php
                                        foreach ($nav['field_repeater'] as $id) {
                                            $products[] = $id['product_id'];
                                        }
                                    ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-12 py-1">
                            <div class="tab-content" data-viewport="opacity" id="product-tab-nav-content">
                                <div class="tab-pane fade show active" id="all-product" role="tabpanel" aria-labelledby="all-tab-product">
                                    <div class="product__list">
                                        <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'post__in'      => $products
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
                                <?php foreach ($list_product as $items) : ?>
                                <div class="tab-pane fade" id="<?php echo esc_attr(sanitize_title($items['title'])); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr(sanitize_title($items['title'])); ?>-tab">
                                    <?php
                                        if(!empty($items['field_repeater'])) :
                                        $tab_products = array();
                                        foreach ($items['field_repeater'] as $id) {
                                            $tab_products[] = $id['product_id'];
                                        }
                                    ?>
                                    <div class="product__list">
                                        <?php
                                        $args = array(
                                            'post_type' => 'product',
                                            'post__in'      => $tab_products
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
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif;  ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>