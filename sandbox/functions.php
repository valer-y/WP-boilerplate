<?php



// Register Custom Post Type
function create_custom_post_type() {
	$labels = array(
		'name'                  => _x( 'Cars', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Car', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cars', 'text_domain' ),
		'all_items'             => __( 'All Cars', 'text_domain' ),
		'add_new_item'          => __( 'Add New Car', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Car', 'text_domain' ),
		'edit_item'             => __( 'Edit Car', 'text_domain' ),
		'update_item'           => __( 'Update Car', 'text_domain' ),
		'view_item'             => __( 'View Car', 'text_domain' ),
		'view_items'            => __( 'View Cars', 'text_domain' ),
		'search_items'          => __( 'Search Car', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'archives'              => __( 'Car Archives', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into car', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this car', 'text_domain' ),
		'filter_items_list'     => __( 'Filter cars list', 'text_domain' ),
		'items_list_navigation' => __( 'Cars list navigation', 'text_domain' ),
		'items_list'            => __( 'Cars list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Car', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ), // Add 'custom-fields' for custom fields support
		'taxonomies'            => array( 'color', 'brand' ), // Include taxonomies here
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'car', $args );
}
add_action( 'init', 'create_custom_post_type', 0 );

// Register Custom Taxonomy for Color
function create_color_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Colors', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Color', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Color', 'text_domain' ),
		'all_items'                  => __( 'All Colors', 'text_domain' ),
		'parent_item'                => __( 'Parent Color', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Color:', 'text_domain' ),
		'new_item_name'              => __( 'New Color Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Color', 'text_domain' ),
		'edit_item'                  => __( 'Edit Color', 'text_domain' ),
		'update_item'                => __( 'Update Color', 'text_domain' ),
		'view_item'                  => __( 'View Color', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate colors with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove colors', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Colors', 'text_domain' ),
		'search_items'               => __( 'Search Colors', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No colors', 'text_domain' ),
		'items_list'                 => __( 'Colors list', 'text_domain' ),
		'items_list_navigation'      => __( 'Colors list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'              => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'color', array( 'car' ), $args );
}
add_action( 'init', 'create_color_taxonomy', 0 );

// Register Custom Taxonomy for Brand
function create_brand_taxonomy() {
	$labels = array(
		'name'                       => _x( 'Brands', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Brand', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Brand', 'text_domain' ),
		'all_items'                  => __( 'All Brands', 'text_domain' ),
		'parent_item'                => __( 'Parent Brand', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Brand:', 'text_domain' ),
		'new_item_name'              => __( 'New Brand Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Brand', 'text_domain' ),
		'edit_item'                  => __( 'Edit Brand', 'text_domain' ),
		'update_item'                => __( 'Update Brand', 'text_domain' ),
		'view_item'                  => __( 'View Brand', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate brands with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove brands', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Brands', 'text_domain' ),
		'search_items'               => __( 'Search Brands', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No brands', 'text_domain' ),
		'items_list'                 => __( 'Brands list', 'text_domain' ),
		'items_list_navigation'      => __( 'Brands list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'brand', array( 'car' ), $args );
}
add_action( 'init', 'create_brand_taxonomy', 0 );





















/**
 * sandbox functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sandbox
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sandbox_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sandbox, use a find and replace
		* to change 'sandbox' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sandbox', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sandbox' ),
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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sandbox_custom_background_args',
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
}
add_action( 'after_setup_theme', 'sandbox_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sandbox_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sandbox_content_width', 640 );
}
add_action( 'after_setup_theme', 'sandbox_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sandbox_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sandbox' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sandbox' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sandbox_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sandbox_scripts() {
	wp_enqueue_style( 'sandbox-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sandbox-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sandbox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sandbox_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

