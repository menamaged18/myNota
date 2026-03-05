<?php

class Router
{
    private $routes = [];

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch($uri, $method)
    {
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route => $action) {
            // Convert route pattern to regex, capturing dynamic parameters
            $pattern = preg_replace('#\{[a-zA-Z]+\}#', '([a-zA-Z0-9]+)', $route);
            
            // Remove trailing slash from pattern, 
            // but if it becomes empty (i.e., the route was '/'), set it back to '/' --> which means home page
            $pattern = rtrim($pattern, '/');
            if ($pattern === '') {
                $pattern = '/';
            }
            
            $pattern = "#^" . $pattern . "$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // remove full match, keep only captured values

                // Split controller and method (default to 'index')
                if (strpos($action, '@') !== false) {
                    list($controller, $methodName) = explode('@', $action);
                } else {
                    $controller = $action;
                    $methodName = 'index';
                }

                // Load and call the controller method with parameters
                return $this->loadController($controller, $methodName, $matches);
            }
        }

        $this->notFound();
    }

    private function loadController($controller, $methodName, $params = [])
    {
        $file = "controllers/$controller.php";
        if (!file_exists($file)) {
            $this->notFound();
            return;
        }

        require $file;
        $instance = new $controller();

        if (!method_exists($instance, $methodName)) {
            $this->notFound();
            return;
        }

        call_user_func_array([$instance, $methodName], $params);
    }

    private function notFound()
    {
        http_response_code(404);
        require 'views/404.php';
        exit;
    }
}