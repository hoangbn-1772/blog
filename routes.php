<?php

include_once './controllers/' . ucwords($controller) . 'Controller.php';

$controllers = [
    'home' => ['index', 'error'],
    'user' => ['list', 'add', 'edit', 'delete', 'error'],
];

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'home';
    $action = 'error';
}
$controllerClass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$instance = new $controllerClass();
$instance->$action();
