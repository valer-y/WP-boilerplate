<?php

require "vendor/autoload.php";
require "inc/_inc.php";

use App\BlocksRegister;
use App\Cpt\CptRegister;
use App\Taxonomy\TaxonomyRegister;

new TaxonomyRegister();
new CptRegister();

$blocks = new BlocksRegister(
	blocksDirName: '/blocks',
	savePointDirName: '/acf-json'
);

/**
 * Essential theme supports
 * */
function theme_setup(){

	if ( wp_is_block_theme() || wp_theme_has_theme_json() ) {
		add_theme_support( 'block-templates' );
	}

	add_theme_support('post-thumbnails');

}
add_action('after_setup_theme','theme_setup');



