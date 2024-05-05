<?php

namespace App\Taxonomy\Year;

use App\Taxonomy\TaxonomyInterface;

class Year implements TaxonomyInterface {

	protected string $slug = 'year';
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
			'name'          => _x('Год выпуска', 'boilerplate'),
			'singular_name' => _x('Год выпуска', 'boilerplate'),
			'search_items'  => __('Искать Год выпуска', 'boilerplate'),
			'all_items'     => __('Все Годы выпуска', 'boilerplate'),
			'edit_item'     => __('Редактировать Год выпуска', 'boilerplate'),
			'update_item'   => __('Обновить Год выпуска', 'boilerplate'),
			'add_new_item'  => __('Добавить Год выпуска', 'boilerplate'),
			'new_item_name' => __('Ввести новый Год выпуска', 'boilerplate'),
			'menu_name'     => __('Годы выпуска', 'boilerplate'),
		];
	}

}