<?php

namespace App;

class BlocksRegister {

	public array $blocks = [];
	public array $blocksUnregistered = [];
	protected string $blocksDir = '';
	protected string $blocksDirUri = '';
	protected string $savePointDir = '';

	public function __construct(
		public string $blocksDirName,
		public string $savePointDirName = ''
	) {
		$this->blocksDir    = get_stylesheet_directory() .$blocksDirName;
		$this->blocksDirUri = get_stylesheet_directory_uri() . $blocksDirName;

		if(trim($this->savePointDirName) !== '') {
			$this->savePointDir = get_stylesheet_directory() . $savePointDirName;
			add_filter('acf/settings/save_json', [$this, 'acfJson_SavePoint']);
			add_filter('acf/settings/load_json', [$this, 'acfJson_LoadPoint']);
		}

		add_action('init', [$this, 'registerAcfBlocks']);
		add_filter( 'should_load_separate_core_block_assets', '__return_true' );
	}


	final function registerAcfBlocks(): void
	{
		$blocks = glob($this->blocksDir . '/*');
		foreach ($blocks as $dir){
			if(is_dir($dir)) {
				$this->registerBlocksScripts($dir);

				$blockJson = "{$dir}/block.json";
				if(file_exists($blockJson)) {
					register_block_type($dir);
					$this->blocks[] = basename($dir);
				} else {
					$this->blocksUnregistered[] = basename($dir);
				}
			}
		}
		$this->ifBlockRegistrationError();
	}

	final function registerBlocksScripts($block) : void
	{
        $blockName = basename($block);
		$jsonPath = "dist/{$blockName}-bundle.js";
//		$blockName = basename($block);
		$jsFile = "{$block}/{$jsonPath}";

		if(file_exists($jsFile)) {
			wp_register_script(
				$blockName,
				"{$this->blocksDirUri}/{$blockName}/{$jsonPath}",
				[],
				date("s", filemtime($jsFile)),
				true
			);
		}
	}


	final function acfJson_SavePoint(): string
	{
		$dirName = $this->savePointDir;
		if(! is_dir($dirName)) {
			mkdir($dirName);
		}
		return $this->savePointDir;
	}


	final function acfJson_LoadPoint(array $paths): array
	{
		unset($paths[0]);
		$paths[] = $this->savePointDir;

		return $paths;
	}


	private function ifBlockRegistrationError() : void {

		if(! empty($this->blocksUnregistered)) {
			$blocks = implode('; ', $this->blocksUnregistered);
			error_log('This blocks haven\'t bee registered: ' . $blocks, 1, get_option('admin_email'));
		}
	}

}
