<?php

require "inc/_inc.php";



add_action('wp_enqueue_scripts', function () {

	define('BLOCKS_DIR', get_stylesheet_directory_uri() . '/blocks');
	define("BLOCKS_FOLDER", get_stylesheet_directory() . '/blocks');

	wp_register_script(
		'cars-filter',
		BLOCKS_DIR . '/cars-filter/dist/bundle.js',
		[],
		date("s", filemtime(BLOCKS_FOLDER . '/cars-filter/dist/bundle.js')),
		true
	);

});