<?php
/**
 * D-kaigi functions and definitions
 *
 * @package d-kaigi
 */

if ( ! function_exists( 'd_kaigi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function d_kaigi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on d_kaigi, use a find and replace
		 * to change 'd_kaigi' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'd-kaigi', get_template_directory() . '/languages' );

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
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'top'     => esc_html__( 'Top Menu', 'd-kaigi' ),
				'primary' => esc_html__( 'Primary Menu', 'd-kaigi' ),
				'footer'  => esc_html__( 'Footer Menu', 'd-kaigi' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'     => 90,
				'width'      => 400,
				'flex-width' => true,
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'd_kaigi_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support(
			'custom-header',
			array(
				'default-color' => 'ffffff',
			)
		);
		add_editor_style();

		// Define Image Sizes.
		add_image_size(
			'd-kaigi-banner',
			717,
			401,
			true
		);
	} //End d_kaigi_setup.
endif;
add_action( 'after_setup_theme', 'd_kaigi_setup' );

/**
 * Enqueue scripts and styles.
 */
function d_kaigi_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() . '/css/owl.carousel.css' );
	wp_enqueue_style(
		'd-kaigi-googlefonts',
		'//fonts.googleapis.com/css?family=Raleway:300,400,500,700,900',
	);
	wp_enqueue_style( 'd-kaigi-style', get_stylesheet_uri() );

	if ( is_rtl() ) {
		wp_enqueue_style( 'd-kaigi-style', get_stylesheet_uri() );
		wp_style_add_data( 'd-kaigi-style', 'rtl', 'replace' );
		wp_enqueue_style( 'd-kaigi-css-rtl', get_template_directory_uri() . '/css/bootstrap-rtl.css' );
		wp_enqueue_script( 'd-kaigi-js-rtl', get_template_directory_uri() . '/js/bootstrap.rtl.js', array( 'jquery' ), '1.0.0', true );
	}

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'ticker', get_template_directory_uri() . '/js/jquery.vticker.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'd-kaigi-scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'd_kaigi_scripts' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 900;
}

/**
 * D-kaigi content width function
 *
 * @return void
 */
function d_kaigi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'd_kaigi_content_width', 640 );

}
add_action( 'after_setup_theme', 'd_kaigi_content_width', 0 );

/**
 * D-kaigi filter front page template function
 *
 * @param string $template template .
 * @return string  empty or template.
 */
function d_kaigi_filter_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'd_kaigi_filter_front_page_template' );


/**
* Call Widget page
*/
require get_template_directory() . '/inc/widgets/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker.
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

if ( is_admin() ) {
	// Load about.
	require_once trailingslashit( get_template_directory() ) . '/inc/theme-info/class-d-kaigi-about.php';
	// Load demo.
	require_once trailingslashit( get_template_directory() ) . '/inc/demo/class-d-kaigi-demo.php';
}

/**
 * Add theme compatibility function for woocommerce if active
*/
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce-functions.php';
}


// Remove default "Category or Tags" from title.
add_filter( 'get_the_archive_title', 'd_kaigi_remove_default_tax_title' );

/**
 * D_kaigi_remove_default_tax_title function
 *
 * @param string $title title.
 * @return string title.
 */
function d_kaigi_remove_default_tax_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	}
	return $title;
}

/**
 * D-kaigi after import menu setup function
 *
 * @return void
 */
function d_kaigi_after_import_menu_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'main menu', 'nav_menu' );
	$top_nav   = get_term_by( 'name', 'topnav', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $main_menu->term_id,
			'top'     => $top_nav->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'd_kaigi_after_import_menu_setup' );
