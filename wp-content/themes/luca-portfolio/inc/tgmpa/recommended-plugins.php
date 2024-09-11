<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Luca Portfolio for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'luca_portfolio_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function luca_portfolio_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => __( 'One Click Demo Import', 'luca-portfolio' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => __( 'Contact Form 7', 'luca-portfolio' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
        array(
            'name'     => __( 'WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woocommerce',
            'required' => false,
        ),
        array(
            'name'     => __( 'WPC Smart Quick View for WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woo-smart-quick-view',
            'required' => false,
        ),
        array(
            'name'     => __( 'WPC Smart Wishlist for WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woo-smart-wishlist',
            'required' => false,
        ),
        array(
            'name'     => __( 'WPC Smart Compare for WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woo-smart-compare',
            'required' => false,
        ),
        array(
            'name'     => __( 'Variation Swatches for WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woo-variation-swatches',
            'required' => false,
        ),
        array(
            'name'     => __( 'WPC Fly Cart for WooCommerce', 'luca-portfolio' ),
            'slug'     => 'woo-fly-cart',
            'required' => false,
        )
	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'luca-portfolio',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

function luca_portfolio_add_notice() {
    $luca_page_url = 'http://demo1.crthemes.com/luca';
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><strong><?php esc_html_e(LUCA_PORTFOLIO_NAME) ?>: </strong><?php esc_html_e( 'You can buy the premium version, to be able to use blocks, one click demo import ... here: ', 'luca-portfolio' ); ?> <a href="<?php echo esc_url( LUCA_PORTFOLIO_URL_DEMO ) ?>" target="_blank" ><?php echo esc_url( LUCA_PORTFOLIO_URL_DEMO ) ?></a></p>
        <p><?php esc_html_e( 'Demo: ', 'luca-portfolio' ); ?> <a href="<?php echo esc_url( $luca_page_url ) ?>" target="_blank" ><?php echo esc_url( $luca_page_url ) ?></a></p>
    </div>
    <?php
}

add_action( 'admin_notices', 'luca_portfolio_add_notice' );