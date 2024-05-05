<?php

namespace App\Cpt\Car;

use App\Cpt\CptInterface;

class Car implements CptInterface {

	protected array $supportTax = [ 'brand', 'color', 'model', 'year' ];
	protected array $supports = ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'];
	protected array $labels = [];

	public function __construct()
	{
		$this->setLabels();
		add_action('init', [$this, 'registerCpt']);
	}

	final public function registerCpt() {

		$args = array(
			'label'                 => __('Автомобиль', 'boilerplate'),
			'description'           => __('Посты для раздела Автомобили', 'boilerplate'),
			'labels'                => $this->labels,
			'supports'              => $this->supports,
			'taxonomies'            => $this->supportTax,
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
			'menu_icon'             => 'dashicons-car'
		);

		register_post_type('car', $args);
	}

	final public function setLabels()
	{
		$this->labels = [
			'name'                  => _x('Автомобили', 'Post Type General Name', 'boilerplate'),
			'singular_name'         => _x('Автомобиль', 'Post Type Singular Name', 'boilerplate'),
			'menu_name'             => __('Автомобили', 'boilerplate'),
			'name_admin_bar'        => __('Автомобиль', 'boilerplate'),
			'archives'              => __('Архив автомобилей', 'boilerplate'),
			'attributes'            => __('Атрибуты автомобиля', 'boilerplate'),
			'parent_item_colon'     => __('Родительский автомобиль:', 'boilerplate'),
			'all_items'             => __('Все автомобили', 'boilerplate'),
			'add_new_item'          => __('Добавить новый автомобиль', 'boilerplate'),
			'add_new'               => __('Добавить новый', 'boilerplate'),
			'new_item'              => __('Новый автомобиль', 'boilerplate'),
			'edit_item'             => __('Редактировать автомобиль', 'boilerplate'),
			'update_item'           => __('Обновить автомобиль', 'boilerplate'),
			'view_item'             => __('Посмотреть автомобиль', 'boilerplate'),
			'view_items'            => __('Посмотреть автомобили', 'boilerplate'),
			'search_items'          => __('Искать автомобиль', 'boilerplate'),
			'not_found'             => __('Не найдено', 'boilerplate'),
			'not_found_in_trash'    => __('Не найдено в корзине', 'boilerplate'),
			'featured_image'        => __('Изображение автомобиля', 'boilerplate'),
			'set_featured_image'    => __('Установить изображение автомобиля', 'boilerplate'),
			'remove_featured_image' => __('Удалить изображение автомобиля', 'boilerplate'),
			'use_featured_image'    => __('Использовать как изображение автомобиля', 'boilerplate'),
			'insert_into_item'      => __('Вставить в автомобиль', 'boilerplate'),
			'uploaded_to_this_item' => __('Загружено в этот автомобиль', 'boilerplate'),
			'items_list'            => __('Список автомобилей', 'boilerplate'),
			'items_list_navigation' => __('Навигация по списку автомобилей', 'boilerplate'),
			'filter_items_list'     => __('Фильтровать список автомобилей', 'boilerplate'),
		];
	}
}