<?php
require_once __DIR__ . '/Model.php';

class ClassController {
    public function index() {
        $model = new Model();
        $classes = $model->getdaftarclass();
        include __DIR__ . '/view.php';
    }

    public function showDetail($className) {
        $model = new Model();
        $classData = $model->getClassDetail($className);

        if ($classData === null) {
            echo "<h1>Kelas tidak ditemukan.</h1>";
            return;
        }

        include __DIR__ . '/class.php';
    }
}
?>