<?php
/**
 * consulte functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package consulte
 */

if ( ! function_exists( 'consulte_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function consulte_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on consulte, use a find and replace
         * to change 'consulte' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'consulte', get_template_directory() . '/languages' );
        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style('assets/css/editor-style.css');
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-header' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'main-menu'     => esc_html__( 'Main Menu', 'consulte' ),
            'copyright-menu'=> esc_html__( 'Copyright Right', 'consulte' ),
        ) );

    /**
    * Add Image Size
    */
    add_image_size( 'consulte_size_870X400', 870, 400, true );
    add_image_size( 'consulte_size_370X210', 370, 210, true );
    add_image_size( 'consulte_size_250X156', 250, 156, true );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         */
        add_theme_support( 'post-formats', array(
            'audio',
            'video',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'consulte_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );

    }
endif;
add_action( 'after_setup_theme', 'consulte_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function consulte_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'consulte_content_width', 640 );
}
add_action( 'after_setup_theme', 'consulte_content_width', 0 );

/**
 * Register custom fonts.
 */
 if ( !function_exists( 'consulte_fonts_url' ) ) :
function consulte_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'Inter font: on or off', 'consulte' ) ) {
        $fonts[] = 'Inter:300,400,500,600,700,800,900';
    }
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function consulte_scripts() {
wp_enqueue_style('consulte-font',consulte_fonts_url());
    wp_enqueue_style( 'icofont', get_template_directory_uri() . '/assets/css/lib/icofont.css');
    wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/assets/css/lib/bootstrap.min.css');
    wp_enqueue_style('blog-post', get_template_directory_uri() . '/assets/css/lib/blog-post.css');
    wp_enqueue_style('consulte-main', get_template_directory_uri() . '/assets/css/main-style.css');
    wp_enqueue_style( 'consulte-style', get_stylesheet_uri() );
    wp_enqueue_style('consulte-blocks',get_template_directory_uri() . '/assets/css/blocks.css');
    wp_enqueue_script( 'consulte-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'consulte_scripts' );

function consulte_admin_scripts(){
    wp_enqueue_style('consulte-admin', get_template_directory_uri() . '/assets/css/admin.css');
}
add_action('admin_enqueue_scripts', 'consulte_admin_scripts');

/**
 * Global Function
 */
require get_template_directory() . '/inc/global-functions.php';


require get_template_directory() . '/inc/template-tags.php';

/**
 * Menu
 */
require get_template_directory() . '/inc/menu/menu.php';
require get_template_directory() . '/inc/menu/menu-walker.php';

/**
 * Customizer Field
 */
require get_template_directory() . '/inc/class.sanitization_callbacks.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-css.php';

/**
 * Widget Register
 */
require get_template_directory() . '/inc/widget/widget_register.php';
/**
 * Load TGM plugins
 */
require get_template_directory() . '/inc/tgm-plugin/init.php';

/**
 * Load demo importer
 */
require get_template_directory() . '/inc/demo-importer.php';






/**
* Blog Pagination 
*/
if(!function_exists('consulte_blog_pagination')){
    function consulte_blog_pagination(){
        ?>
        <div class="post-pagination"> <?php
            the_posts_pagination(array(
                'prev_text'          => '<i class="icofont-rounded-left"></i>',
                'next_text'          => '<i class="icofont-rounded-right"></i>',
                'type'               => 'list'
            )); ?>
        </div>
        <?php
    }
}