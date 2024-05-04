<?php
require "vendor/autoload.php";
require "inc/_inc.php";

use App\BlocksRegister;

$blocks = new BlocksRegister(
	blocksDirName: '/blocks',
	savePointDirName: '/acf-json'
);
