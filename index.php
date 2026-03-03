<?php

require 'Router.php';
require 'routes.php';
require 'views/partials/Header.php';
require 'views/partials/nav/nav.php';


$router = new Router($routes);

// Get current URI
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Dispatch request
$router->dispatch($requestUri);