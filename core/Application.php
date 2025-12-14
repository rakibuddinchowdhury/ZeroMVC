<?php

namespace Core;

class Application
{
    public Router $router;
    public Database $db;       // <--- 1. Add this property
    public static Application $app; // <--- 2. Static reference to access App globally

    public function __construct()
    {
        self::$app = $this;    // <--- 3. Save instance
        
        $config = require_once __DIR__ . '/../config.php'; // Load config
        $this->db = new Database($config['db']);           // <--- 4. Init DB
        
        $this->router = new Router();
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}