<?php

namespace App\Cpt;

class CptRegister {

	public function __construct()
	{
		$this->cpt();
	}

	public function cpt()
	{
		$allCpt = glob(__DIR__ . '/*');

		foreach ($allCpt as $cpt) {

			if(is_dir($cpt)) {
				$className = str_replace('.php', '', basename($cpt));
				$class = __NAMESPACE__ . "\\{$className}\\{$className}";

				if(class_exists($class)) {
					new $class();
				}
			}

		}

	}
}