<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
get_header( 'shop' ); ?>
<main id="content" class="site-main">
	<section class="block-content py-5">
		<div class="container-xl">
			<div class="row">
                <?php
                    $sidebar = luca_portfolio_is_sidebar_enabled('luca_portfolio_sidebar_position_woocommerce_single');
                    $col_one = '';
                    $col_two = '';
                    if($sidebar == 'right-sidebar') {
                        $col_one = 'col-12 col-md-9 pe-md-4';
                        $col_two = 'col-12 col-md-3';
                    } elseif($sidebar == 'left-sidebar') {
                        $col_one = 'col-12 col-md-9 ps-md-4';
                        $col_two = 'col-12 col-md-3 order-first';
                    }  elseif($sidebar == 'no-sidebar') {
                        $col_one = 'col-12';
                        $col_two = 'd-none';
                    }
                ?>
				<div class="<?php echo esc_attr($col_one); ?>">
                    <?php
                    /**
                     * woocommerce_before_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */
                    do_action( 'woocommerce_before_main_content' );
                    ?>

                    <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>

                            <?php wc_get_template_part( 'content', 'single-product' ); ?>

                        <?php endwhile; // end of the loop. ?>

                    <?php
                        /**
                         * woocommerce_after_main_content hook.
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );
                    ?>
                </div>
                <div class="<?php echo esc_attr($col_two); ?>">
                    <?php
                        /**
                         * woocommerce_sidebar hook.
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
				</div>
			</div>
		</div>
	</section>
</main><!-- #main -->
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
