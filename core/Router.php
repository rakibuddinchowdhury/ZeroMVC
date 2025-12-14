<?php

namespace Core;

class Router
{
    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        // Get URL path, default to '/'
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            http_response_code(404);
            return "404 - Not Found";
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback);
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }
} 
