<?php
//
//function register_theme_cpts()
//{
//	/**
//	 * Custom Post Type: Автомобили
//	 */
//
//	$labels = array(
//		'name'                  => _x( 'Автомобили', 'sandbox' ),
//		'singular_name'         => _x( 'Автомобиль', 'post type singular name', 'interexy' ),
//		'menu_name'             => _x( 'Автомобили', 'admin menu', 'interexy' ),
//		'name_admin_bar'        => _x( 'Автомобили', 'add new on admin bar', 'interexy' ),
//		'add_new'               => _x( 'Добавить Автомобиль', 'event', 'interexy' ),
//		'add_new_item'          => __( 'Добавить новый Автомобиль', 'interexy' ),
//		'new_item'              => __( 'Новый Автомобиль', 'interexy' ),
//		'edit_item'             => __( 'Редактировать Автомобиль', 'interexy' ),
//		'view_item'             => __( 'Показать Автомобиль', 'interexy' ),
//		'all_items'             => __( 'Все Автомобили', 'interexy' ),
//		'search_items'          => __( 'Искать Автомобили', 'interexy' ),
//		'not_found'             => __( 'Не найдено', 'interexy' ),
//		'not_found_in_trash'    => __( 'Не найдено в Корзине', 'interexy' )
//	);
//
//	$args = array(
//		'labels'             => $labels,
//		'description'        => __( 'Описание.', 'interexy' ),
//		'public'             => true,
//		'publicly_queryable' => true,
//		'show_ui'            => true,
//		'show_in_menu'       => true,
//		'query_var'          => true,
//		'capability_type'    => 'post',
//		'has_archive'        => false,
//		'hierarchical'       => false,
//		"menu_icon"          => "dashicons-calendar",
//		'show_in_rest'       => true,
//		'rest_controller_class' => 'WP_REST_Posts_Controller',
//		'menu_position'         => 20,
//		'rest_base'             => 'cars',
//		"exclude_from_search"   => false,
//		"map_meta_cap"          => true,
//		"rewrite"               => ["slug" => "cars"],
//		"supports"              => ["title", "custom-fields", "excerpt", "editor", "thumbnail"],
//		"taxonomies"            => ["post_tags", "brand", "car-color", "car-manufactured-in", "car-type"],
//	);
//
//	register_post_type( 'car', $args );
//
//}
//
//add_action('init', 'register_theme_cpts');
//
//
//
///**
// * Register Events post type
// */
//
//add_action( 'init', 'events_cpt' );
//
//function events_cpt() {
//	$labels = array(
//		'name'                  => _x( 'Автомобили', 'sandbox' ),
//		'singular_name'         => _x( 'Автомобиль', 'post type singular name', 'interexy' ),
//		'menu_name'             => _x( 'Автомобили', 'admin menu', 'interexy' ),
//		'name_admin_bar'        => _x( 'Автомобили', 'add new on admin bar', 'interexy' ),
//		'add_new'               => _x( 'Добавить Автомобиль', 'event', 'interexy' ),
//		'add_new_item'          => __( 'Добавить новый Автомобиль', 'interexy' ),
//		'new_item'              => __( 'Новый Автомобиль', 'interexy' ),
//		'edit_item'             => __( 'Редактировать Автомобиль', 'interexy' ),
//		'view_item'             => __( 'Показать Автомобиль', 'interexy' ),
//		'all_items'             => __( 'Все Автомобили', 'interexy' ),
//		'search_items'          => __( 'Искать Автомобили', 'interexy' ),
//		'not_found'             => __( 'Не найдено', 'interexy' ),
//		'not_found_in_trash'    => __( 'Не найдено в Корзине', 'interexy' )
//	);
//
//	$args = array(
//		'labels'             => $labels,
//		'description'        => __( 'Description.', 'interexy' ),
//		'public'             => true,
//		'publicly_queryable' => false,
//		'show_ui'            => true,
//		'show_in_menu'       => true,
//		'query_var'          => true,
//		'rewrite'            => array( 'slug' => 'events' ),
//		'capability_type'    => 'post',
//		'has_archive'        => false,
//		'hierarchical'       => false,
//		'menu_position'      => null,
//		"menu_icon"          => "dashicons-calendar",
//		'show_in_rest'       => true,
//		'rest_base'          => 'events',
//		'rest_controller_class' => 'WP_REST_Posts_Controller',
//		"supports"              => ["title", "custom-fields", "excerpt", "thumbnail"],
//		"taxonomies"            => ["post_tags", "brand", "car-color", "car-manufactured-in", "car-type"],
//	);
//
//	register_post_type( 'events', $args );
//}

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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
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