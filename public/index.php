<?php

use App\Model\User\User;
use AndrGladkikh\Kernel\Kernel;

require_once '../vendor/autoloader.php';

$user = new User();
$user->test();
$kernel = new Kernel();
$kernel->handleRequest();