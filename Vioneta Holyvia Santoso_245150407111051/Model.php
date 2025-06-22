<?php
class Model {
    public function getdaftarclass() {
        return ['class 1', 'class 2', 'class 3', 'class 4'];
    }

    public function getClassDetail($className) {
        $data = [
            'class 1' => [
                'id' => 1,
                'name' => 'class 1',
                'siswa' => [''],
                'tugas' => [
                    ['id' => 1, 'judul' => 'Tugas Matematika'],
                    ['id' => 2, 'judul' => 'Tugas IPA']
                ]
            ],
            'class 2' => [
                'id' => 2,
                'name' => 'class 2',
                'siswa' => [''],
                'tugas' => [
                    ['id' => 1, 'judul' => 'Tugas Bahasa Indonesia']
                ]
            ]
        ];

        return $data[$className] ?? null;
    }
}
