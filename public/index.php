<?php

use AndrGladkikh\Kernel\Kernel;

require_once '../vendor/autoloader.php';

$kernel = new Kernel();
$response = $kernel->handleRequest();
$response->send();