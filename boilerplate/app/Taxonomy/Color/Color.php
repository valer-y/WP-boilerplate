<?php

namespace App\Taxonomy\Color;

use App\Taxonomy\TaxonomyInterface;

class Color implements TaxonomyInterface {

	protected string $slug = 'color';
	protected array $supportedCpt = ['car'];
	private array $labels = [];

	public function __construct( public array $args = [] ) {
		$this->setLabels();
		add_action( 'init', [ $this, 'registerTaxonomy' ] );
	}

	final public function registerTaxonomy() {
		$args   = [
			'hierarchical'      => false,
			'labels'            => $this->labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'query_var'         => true,
			'rewrite'           => ['slug' => $this->slug],
		];

		register_taxonomy($this->slug, $this->supportedCpt, $args );
	}

	final public function setLabels() {
		$this->labels = [
			'name'          => _x('Цвет', 'boilerplate'),
			'singular_name' => _x('Цвет', 'boilerplate'),
			'search_items'  => __('Искать Цвет', 'boilerplate'),
			'all_items'     => __('Все Цвета', 'boilerplate'),
			'edit_item'     => __('Редактировать Цвет', 'boilerplate'),
			'update_item'   => __('Обновить Цвет', 'boilerplate'),
			'add_new_item'  => __('Добавить Цвет', 'boilerplate'),
			'new_item_name' => __('Ввести новый Цвет', 'boilerplate'),
			'menu_name'     => __('Цвета', 'boilerplate'),
		];
	}

}