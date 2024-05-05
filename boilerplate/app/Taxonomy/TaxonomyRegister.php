<?php

namespace App\Taxonomy;

class TaxonomyRegister {

	public function __construct()
	{
		$this->tax();
	}

	public function tax()
	{
		$allTax = glob(__DIR__ . '/*');

		foreach ($allTax as $tax) {

			if(is_dir($tax)) {
				$className = str_replace('.php', '', basename($tax));
				$class = __NAMESPACE__ . "\\{$className}\\{$className}";

				if(class_exists($class)) {
					new $class();
				}
			}

		}

	}

}