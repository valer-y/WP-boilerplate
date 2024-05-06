<?php

namespace App\Taxonomy\Model;

use App\Taxonomy\TaxonomyInterface;

class Model implements TaxonomyInterface {

	protected string $slug = 'model';
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
			'name'          => _x('Тип авто', 'boilerplate'),
			'singular_name' => _x('Тип авто', 'boilerplate'),
			'search_items'  => __('Искать Тип авто', 'boilerplate'),
			'all_items'     => __('Все Типы авто', 'boilerplate'),
			'edit_item'     => __('Редактировать Тип авто', 'boilerplate'),
			'update_item'   => __('Обновить Тип авто', 'boilerplate'),
			'add_new_item'  => __('Добавить Тип авто', 'boilerplate'),
			'new_item_name' => __('Ввести новый Тип авто', 'boilerplate'),
			'menu_name'     => __('Типы авто', 'boilerplate'),
		];
	}

}
