<?php

class Router
{
    private $routes = [];

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch($uri)
    {
        // Remove slashes
        $uri = rtrim($uri, '/') ?: '/';

        // Check static routes first
        if (array_key_exists($uri, $this->routes)) {
            return $this->loadController($this->routes[$uri]);
        }

        // Check dynamic routes
        foreach ($this->routes as $route => $controller) {

            $pattern = preg_replace('#\{[a-zA-Z]+\}#', '([a-zA-Z0-9]+)', $route);
            $pattern = "#^" . rtrim($pattern, '/') . "$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches); // remove full match so now matches contains only the id or whatever
                return $this->loadController($controller, $matches);
            }
        }

        // If no route found
        $this->notFound();
    }

    private function loadController($controller, $params = [])
    {
        require "controllers/$controller.php";

        $instance = new $controller();

        if (method_exists($instance, 'index')) {
            call_user_func_array([$instance, 'index'], $params);
        }
    }

    private function notFound()
    {
        http_response_code(404);
        require 'views/404.php';
    }
}