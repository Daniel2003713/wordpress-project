<?php
/**
 * Luca Portfolio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Luca_Portfolio
 */

if ( ! defined( 'LUCA_PORTFOLIO_VERSION' ) ) {
	define( 'LUCA_PORTFOLIO_VERSION', wp_get_theme()->get( 'Version' ) );
}
if ( ! defined( 'LUCA_PORTFOLIO_NAME' ) ) {
    define( 'LUCA_PORTFOLIO_NAME', wp_get_theme()->get( 'Name' ) );
}
if ( ! defined( 'LUCA_PORTFOLIO_URL_DEMO' ) ) {
    define( 'LUCA_PORTFOLIO_URL_DEMO', wp_get_theme()->get( 'ThemeURI' ) );
}
if ( ! defined( 'LUCA_PORTFOLIO_URL_DOCS' ) ) {
    define( 'LUCA_PORTFOLIO_URL_DOCS', '#' );
}
if ( ! defined( 'LUCA_PORTFOLIO_URL_GET_PREMIUM' ) ) {
    define( 'LUCA_PORTFOLIO_URL_GET_PREMIUM', '#' );
}
if ( ! defined( 'LUCA_PORTFOLIO_ID_THEMES_PREMIUM' ) ) {
    define( 'LUCA_PORTFOLIO_ID_THEMES_PREMIUM', 58 );
}

if ( ! function_exists( 'luca_portfolio_setup' ) ) :
    function luca_portfolio_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'register_block_style' );

        add_theme_support( 'register_block_pattern' );

        add_theme_support( 'post-thumbnails' );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'luca_portfolio_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );

        add_theme_support( 'align-wide' );
        add_theme_support( 'responsive-embeds' );

        add_theme_support(
            'custom-header',
            apply_filters(
                'luca_portfolio_custom_header_args',
                array(
                    'default-image'      => '',
                    'default-text-color' => '2896df',
                    'width'              => 1000,
                    'height'             => 250,
                    'flex-height'        => true,
                    'wp-head-callback'   => 'luca_portfolio_header_style',
                )
            )
        );

        add_theme_support( 'html5', array(
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
        ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__( 'Primary', 'luca-portfolio' ),
            )
        );
        register_nav_menus(
            array(
                'not_home_nav' => esc_html__( 'Not Home', 'luca-portfolio' ),
            )
        );
        register_nav_menus(
            array(
                'footer' => esc_html__( 'Footer', 'luca-portfolio' ),
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'luca_portfolio_setup' );

if ( ! function_exists( 'luca_portfolio_header_style' ) ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see luca_portfolio_header_style().
     */
    function luca_portfolio_header_style() {
        $header_text_color = get_header_textcolor();

        /*
         * If no custom options for text are set, let's bail.
         * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
         */
        if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
            return;
        }

        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
            // Has the text been hidden?
            if ( ! display_header_text() ) :
                ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
                color: red !important;
            }
            <?php
            // If the user has set a custom color for the text use that.
        else :
            ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }
            <?php endif; ?>
        </style>
        <?php
    }
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function luca_portfolio_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'luca_portfolio_content_width', 640 );
}
add_action( 'after_setup_theme', 'luca_portfolio_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function luca_portfolio_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'luca-portfolio' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'luca-portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar E-Commerce', 'luca-portfolio' ),
            'id'            => 'sidebar-e-commerce',
            'description'   => esc_html__( 'Add widgets here.', 'luca-portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    // Regsiter 4 footer widgets.
    register_sidebars(
        array(
            /* translators: %d: Footer Widget count. */
            'name'          => esc_html__( 'Footer Widget', 'luca-portfolio' ),
            'id'            => 'footer-widget',
            'description'   => esc_html__( 'Add widgets here.', 'luca-portfolio' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h6 class="widget-title">',
            'after_title'   => '</h6>',
        )
    );
}
add_action( 'widgets_init', 'luca_portfolio_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function luca_portfolio_scripts() {
    wp_enqueue_style( 'luca-portfolio-style', get_template_directory_uri() . '/style.css', array(), LUCA_PORTFOLIO_VERSION );
    // Main style.
    wp_enqueue_style( 'luca-portfolio-main-style', get_template_directory_uri() . '/assets/build/css/style-wide.min.css', array(), LUCA_PORTFOLIO_VERSION );

    // Main script.
    wp_enqueue_script( 'luca-portfolio-main-script', get_template_directory_uri() . '/assets/build/js/main.bundle.js', array( 'jquery' ), LUCA_PORTFOLIO_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'luca_portfolio_scripts' );

/**
 * Sections.
 */
add_action( 'init', 'luca_portfolio_refresh_customize_preview');

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/google-fonts.php';

/**
 * Dynamic CSS
 */
require get_template_directory() . '/inc/dynamic-css.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/inc/class-breadcrumb-trail.php';

/**
 * Recommended Plugins
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
    require get_template_directory() . '/inc/ocdi.php';
}
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Woocommerce.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

if ( ! function_exists( 'luca_is_woocommerce' ) ) {
    function luca_is_woocommerce() {
        if(class_exists( 'WooCommerce' )) {
            return true;
        }
        return false;
    }
}