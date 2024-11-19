<?php

/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if (! function_exists('_s_setup')) {
    /**
     *
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function _s_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on _s, use a find and replace
         * to change 'sobold' to the name of your theme in all the template files.
         */
        load_theme_textdomain('sobold', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'menu-1'               => esc_html__('Primary', 'sobold'),
            'footer-main-menu'     => esc_html__('Footer Main Menu', 'sobold'),
            'footer-markets-menu'  => esc_html__('Footer Markets Menu', 'sobold'),
            'footer-services-menu' => esc_html__('Footer Services Menu', 'sobold'),
            'legal'                => esc_html__('Legal', 'sobold'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('_s_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);
    }
}
add_action('after_setup_theme', '_s_setup');

//Make sure YOAST is positioned at the bottom of each post
add_filter("wpseo_metabox_prio", function () {
    return 'low';
});

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('_s_content_width', 640);
}
add_action('after_setup_theme', '_s_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init()
{
    register_sidebar([
        'name'          => esc_html__('Sidebar', 'sobold'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'sobold'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
    register_sidebar([
        'name'          => esc_html__('Sidebar Two', 'sobold'),
        'id'            => 'sidebar-2',
        'description'   => esc_html__('Add widgets here.', 'sobold'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', '_s_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function _s_scripts()
{
    wp_enqueue_style('_s-style', get_stylesheet_uri());

    wp_enqueue_script('_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], '20151215', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    $pagebuilderBlocks = get_post_meta(get_the_ID(), 'page_builder', true);
    if (is_array($pagebuilderBlocks)) {
        //* Pagebuider specific files here
    }

    wp_enqueue_script('main', get_template_directory_uri() . '/main.js', [], '20151215', true);
}
add_action('wp_enqueue_scripts', '_s_scripts');

//* Remove jQuery Migrate
add_action('wp_default_scripts', 'removeJQueryMigrate');
function removeJQueryMigrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, ['jquery-migrate']);
        }
    }
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Get SoBold Functions.
 */
require get_template_directory() . '/inc/sobold-functions.php';

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
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ]);
}

require get_template_directory() . '/inc/tgm.php';

// Load General Functions file
require get_template_directory() . '/inc/general-functions.php';

// Load Login Page Styling Files
if ($GLOBALS['pagenow'] === 'wp-login.php') {
    require get_template_directory() . '/inc/login-page.php';
}

/**
 * Hide the Page and Post Content Editor - Gutenberg
 */
add_action('init', function () {
    remove_post_type_support('post', 'editor');
}, 99);

//* Load AJAX Init file
require get_template_directory() . '/inc/ajax/init.php';

//* App init file
require get_template_directory() . '/inc/app/init.php';
