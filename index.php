<?php

// to display errors if exists
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// provide database class to all
require_once 'database.php';

require 'Router.php';
require 'routes.php';
require 'views/partials/Header.php';
require 'views/partials/nav/nav.php';


$router = new Router($routes);

// Get current URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dispatch request
$router->dispatch($requestUri);

// require 'test.php';