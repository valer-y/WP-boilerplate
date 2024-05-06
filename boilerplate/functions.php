<?php

require "vendor/autoload.php";
require "inc/_inc.php";

use App\Ajax\CarAjax\CarAjax;
use App\BlocksRegister;
use App\Cpt\CptRegister;
use App\Taxonomy\TaxonomyRegister;
//use App\Ajax\CarAjax;

new TaxonomyRegister();
new CptRegister();
new CarAjax();

$blocks = new BlocksRegister(
	blocksDirName: '/blocks',
	savePointDirName: '/acf-json'
);

/**
 * Essential theme supports
 * */
function theme_setup(){

	if ( wp_is_block_theme() || wp_theme_has_theme_json() ) {
		add_theme_support( 'block-template-parts' );
	}

	add_theme_support('post-thumbnails');

}
add_action('after_setup_theme','theme_setup');



