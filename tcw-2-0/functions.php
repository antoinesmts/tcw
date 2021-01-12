<?php
/**
 * TCW 2.0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TCW_2.0
 */

if ( ! function_exists( 'tcw_2_0_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tcw_2_0_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TCW 2.0, use a find and replace
		 * to change 'tcw-2-0' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tcw-2-0', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(
		'primary' => __( 'Primary', 'tcw-2-0' ),
) );

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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tcw_2_0_custom_background_args', array(
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
add_action( 'after_setup_theme', 'tcw_2_0_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tcw_2_0_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tcw_2_0_content_width', 640 );
}
add_action( 'after_setup_theme', 'tcw_2_0_content_width', 0 );

/** Admin bar */
add_filter('show_admin_bar', '__return_false');

/** Short code in resume */
if(!function_exists('remove_vc_from_excerpt'))  {
  function remove_vc_from_excerpt( $excerpt ) {
    $patterns = "/\[[\/]?vc_[^\]]*\]/";
    $replacements = "";
    return preg_replace($patterns, $replacements, $excerpt);
  }
}
 
/** * Original elision function mod by Paolo Rudelli */
 
if(!function_exists('kc_excerpt')) {
 
/** Function that cuts post excerpt to the number of word based on previosly set global * variable $word_count, which is defined below */
 
  function kc_excerpt($excerpt_length = 20) {
 
    global $word_count, $post;
 
    $word_count = isset($word_count) && $word_count != "" ? $word_count : $excerpt_length;
 
    $post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content); $clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;
 
    /** add by PR */
 
    $clean_excerpt = strip_shortcodes(remove_vc_from_excerpt($clean_excerpt));
 
    /** end PR mod */
 
    $excerpt_word_array = explode (' ',$clean_excerpt);
 
    $excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);
 
    $excerpt = implode (' ', $excerpt_word_array).'...'; echo ''.$excerpt.'';
 
  }
 
}

// Numbered Pagination
function wplift_pagination() {
	global $wp_query;
		$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tcw_2_0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tcw-2-0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'tcw-2-0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tcw_2_0_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tcw_2_0_scripts() {
	wp_enqueue_style( 'tcw-2-0-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tcw-2-0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tcw-2-0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tcw_2_0_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

