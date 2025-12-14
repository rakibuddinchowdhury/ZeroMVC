<?php

// 1. Start Session globally (Must be the very first line)
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use Core\Application;

$app = new Application();

// --- Auth Routes (Public/Guest Access) ---
$app->router->get('/login', ['App\Controllers\AuthController', 'login']);
$app->router->post('/login-attempt', ['App\Controllers\AuthController', 'attempt']);
$app->router->get('/logout', ['App\Controllers\AuthController', 'logout']);
// Registration is now handled by AuthController so guests can access it
$app->router->get('/create', ['App\Controllers\AuthController', 'register']); 
$app->router->post('/store', ['App\Controllers\AuthController', 'store']);

// --- Protected Routes (Login Required) ---
// These use HomeController, which now blocks unauthenticated users in __construct
$app->router->get('/', ['App\Controllers\HomeController', 'index']);
$app->router->get('/about', ['App\Controllers\HomeController', 'about']);
$app->router->get('/edit', ['App\Controllers\HomeController', 'edit']);
$app->router->post('/update', ['App\Controllers\HomeController', 'update']);
$app->router->post('/delete', ['App\Controllers\HomeController', 'delete']);

$app->run();