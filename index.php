<?php
ini_set("display_errors", 1);
date_default_timezone_set('Asia/Calcutta');

if (version_compare(PHP_VERSION, '5.4.0') < 0) {
    die('Require PHP version greater than or equal to 5.4.0');
}

require_once __DIR__.'/vendor/autoload.php';

use Sample\FrontController;
use Antelope\AccountManager;

$sample = new FrontController();
$sample->run();