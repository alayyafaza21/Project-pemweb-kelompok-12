<?php

require_once 'controller/soalController.php';

$url = $_GET['url'] ?? 'soal/index';
$url = explode('/', $url);

$controllerName = ucfirst($url[0]) . 'Controller';
$method = $url[1] ?? 'index';

$controller = new $controllerName;
if (method_exists($controller, $method)) {
    $controller->$method();
} else {
    echo "Controller atau method tidak ditemukan!";
}