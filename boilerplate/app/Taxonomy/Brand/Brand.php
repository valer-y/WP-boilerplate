<?php

namespace App\Taxonomy\Brand;

use App\Taxonomy\TaxonomyInterface;

class Brand implements TaxonomyInterface{

	protected string $slug = 'brand';
	protected array $supportedCpt = ['car'];
	private array $labels = [];

	public function __construct(public array $args = [])
	{
		$this->setLabels();
		add_action('init', [$this, 'registerTaxonomy']);
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

	final public function setLabels()
	{
		$this->labels = [
			'name'              => _x('Марка', 'boilerplate'),
			'singular_name'     => _x('Марка', 'boilerplate'),
			'search_items'      => __('Искать Марку', 'boilerplate'),
			'all_items'         => __('Все Марки', 'boilerplate'),
			'edit_item'         => __('Редактировать Марку', 'boilerplate'),
			'update_item'       => __('Обновить Марку', 'boilerplate'),
			'add_new_item'      => __('Добавить Марку', 'boilerplate'),
			'new_item_name'     => __('Ввести новую Марку', 'boilerplate'),
			'menu_name'         => __('Марки', 'boilerplate'),
		];
	}
}
