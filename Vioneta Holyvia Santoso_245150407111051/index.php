<?php
require_once __DIR__ . '/Controller.php';
$controller = new ClassController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'showDetail': 
        $className = $_GET['class'] ?? null; 

        if ($className === null) {
            echo "Error";
        } else {
            $controller->showDetail($className);
        }
        break;
    default:
        echo "Halaman tidak ditemukan";
        break;
}
?>