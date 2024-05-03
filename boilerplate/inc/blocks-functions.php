<?php

/**
 * Show css only for uploaded blocks
 */

add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/**
 * Register ACF-blocks
 */
add_action('init', 'register_acf_blocks');
function register_acf_blocks(): void
{
	$build_dir = get_stylesheet_directory() . '/blocks';

	foreach (scandir($build_dir) as $result) {
		$block_location = $build_dir . '/' . $result;

		if (!is_dir($block_location) || '.' === $result || '..' === $result) {
			continue;
		}

		register_block_type($block_location);
	}
}

$data_array = [];

/**
 * Save created custom fields in JSON format
 *
 * @return string return new path with ACF block . json
 */
function acf_json_save_point(): string
{
	return get_stylesheet_directory() . '/acf-json';
}

add_filter('acf/settings/save_json', 'acf_json_save_point');

/**
 * Upload created custom fields in project
 *
 * @param string[] $paths Path to folder with ACF block.json
 * @return string[] Return new path with ACF block.json
 */

function acf_json_load_point(array $paths): array
{
	unset($paths[0]);

	$paths[] = get_stylesheet_directory() . '/acf-json';

	return $paths;
}

add_filter('acf/settings/load_json', 'acf_json_load_point');