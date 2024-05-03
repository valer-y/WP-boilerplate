<?php
//
///**
// * Register 'brand' taxonomy
// * 'Марка'
// */
//
//function register_taxonomy_brand() {
//	$labels = array(
//		'name'              => _x( 'Марка', 'sandbox' ),
//		'singular_name'     => _x( 'Марка', 'sandbox' ),
//		'search_items'      => __( 'Искать Марку', 'sandbox' ),
//		'all_items'         => __( 'Все Марки', 'sandbox' ),
//		'edit_item'         => __( 'Редактировать Марку', 'sandbox' ),
//		'update_item'       => __( 'Обновить Марку', 'sandbox' ),
//		'add_new_item'      => __( 'Добавить новую Марку', 'sandbox' ),
//		'new_item_name'     => __( 'Ввести новую Марку', 'sandbox' ),
//		'menu_name'         => __( 'Марка', 'sandbox' ),
//	);
//	$args   = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => [ 'slug' => 'brands' ],
//	);
//	register_taxonomy( 'brand', [ 'car' ], $args );
//}
//add_action( 'init', 'register_taxonomy_brand' );
//
///**
// * Register 'car-type' taxonomy
// * 'Тип авто'
// */
//
//function register_taxonomy_car_type() {
//	$labels = array(
//		'name'              => _x( 'Тип авто', 'sandbox' ),
//		'singular_name'     => _x( 'Тип авто', 'sandbox' ),
//		'search_items'      => __( 'Искать Тип авто', 'sandbox' ),
//		'all_items'         => __( 'Все Типы авто', 'sandbox' ),
//		'edit_item'         => __( 'Редактировать Тип авто', 'sandbox' ),
//		'update_item'       => __( 'Обновить Тип авто', 'sandbox' ),
//		'add_new_item'      => __( 'Добавить Тип авто', 'sandbox' ),
//		'new_item_name'     => __( 'Ввести новой Типа авто', 'sandbox' ),
//		'menu_name'         => __( 'Тип авто', 'sandbox' ),
//	);
//	$args   = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => [ 'slug' => 'car-type' ],
//	);
//	register_taxonomy( 'car-type', [ 'car' ], $args );
//}
//add_action( 'init', 'register_taxonomy_car_type' );
//
///**
// * Register 'car-color' taxonomy
// * 'Цвет'
// */
//
//function register_taxonomy_car_color() {
//	$labels = array(
//		'name'              => _x( 'Цвет', 'sandbox' ),
//		'singular_name'     => _x( 'Цвет авто', 'sandbox' ),
//		'search_items'      => __( 'Искать Цвет', 'sandbox' ),
//		'all_items'         => __( 'Все Цвета', 'sandbox' ),
//		'edit_item'         => __( 'Редактировать Цвет', 'sandbox' ),
//		'update_item'       => __( 'Обновить Цвет', 'sandbox' ),
//		'add_new_item'      => __( 'Добавить Цвет', 'sandbox' ),
//		'new_item_name'     => __( 'Ввести новый Цвет', 'sandbox' ),
//		'menu_name'         => __( 'Цвет', 'sandbox' ),
//	);
//	$args   = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => [ 'slug' => 'car-color' ],
//	);
//	register_taxonomy( 'car-color', [ 'cars' ], $args );
//}
//add_action( 'init', 'register_taxonomy_car_color' );
//
///**
// * Register 'car-manufactured-in' taxonomy
// * 'Год выпуска'
// */
//
//function register_taxonomy_car_manufactured_in() {
//	$labels = array(
//		'name'              => _x( 'Год выпуска', 'sandbox' ),
//		'singular_name'     => _x( 'Год выпуска', 'sandbox' ),
//		'search_items'      => __( 'Искать Год выпуска', 'sandbox' ),
//		'all_items'         => __( 'Все Годы выпуска', 'sandbox' ),
//		'edit_item'         => __( 'Редактировать Год выпуска', 'sandbox' ),
//		'update_item'       => __( 'Обновить Год выпуска', 'sandbox' ),
//		'add_new_item'      => __( 'Добавить Год выпуска', 'sandbox' ),
//		'new_item_name'     => __( 'Ввести Год выпуска', 'sandbox' ),
//		'menu_name'         => __( 'Год выпуска', 'sandbox' ),
//	);
//	$args   = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => [ 'slug' => 'car-manufactured-in' ],
//	);
//	register_taxonomy( 'car-manufactured-in', [ 'car' ], $args );
//}
//add_action( 'init', 'register_taxonomy_car_manufactured_in' );
//
//
///**
// * Register Conference taxonomy
// */
//
//function register_taxonomy_events_type() {
//	$labels = array(
//		'name'              => _x( 'Events type', 'taxonomy general name' ),
//		'singular_name'     => _x( 'Event type', 'taxonomy singular name' ),
//		'search_items'      => __( 'Search Events' ),
//		'all_items'         => __( 'All Events' ),
//		'parent_item'       => __( 'Parent Event' ),
//		'parent_item_colon' => __( 'Parent Event:' ),
//		'edit_item'         => __( 'Edit Event' ),
//		'update_item'       => __( 'Update Event' ),
//		'add_new_item'      => __( 'Add New Event' ),
//		'new_item_name'     => __( 'New Event Name' ),
//		'menu_name'         => __( 'Events type' ),
//	);
//	$args   = array(
//		'hierarchical'      => false,
//		'labels'            => $labels,
//		'show_ui'           => true,
//		'show_admin_column' => true,
//		'query_var'         => true,
//		'rewrite'           => [ 'slug' => 'conferences' ],
//	);
//	register_taxonomy( 'events_type', [ 'events' ], $args );
//}
//add_action( 'init', 'register_taxonomy_events_type' );