<?php
ini_set("display_errors", 1);
date_default_timezone_set('Asia/Calcutta');

require_once __DIR__.'/vendor/autoload.php';

use Service\FrontController;

$sample = new FrontController();
$sample->run();