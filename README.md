<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'controllers/Autoload.php';

$router = new Router();
$router->route();
