<?php

namespace Core;

class Controller
{
    public function render($view, $params = [])
    {
        // Extract array keys as variable names
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        
        // Start output buffering
        ob_start();
        include_once __DIR__ . "/../app/Views/$view.php";
        return ob_get_clean();
    }
} 
