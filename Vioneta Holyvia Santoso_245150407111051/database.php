<?php
class Database {
    private $host = 'localhost';
    private $db = 'tampilanclass';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function connect() {
        if (!$this->conn) {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->conn;
    }
}
?>

<!-- 
CREATE TABLE kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    kelas_id INT,
    FOREIGN KEY (kelas_id) REFERENCES kelas(id)
);

CREATE TABLE tugas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(100) NOT NULL,
    soal TEXT NOT NULL,
    kelas_id INT,
    FOREIGN KEY (kelas_id) REFERENCES kelas(id)
);

INSERT INTO kelas (nama) VALUES ('Math Class');

INSERT INTO anggota (nama, kelas_id) VALUES
('Keyaw', 1), ('Ney', 1), ('Citra', 1);

INSERT INTO tugas (judul, soal, kelas_id) VALUES
('Tugas Penjumlahan', 'hasil 1 + 1 = ..?', 1),
('Tugas Pengurangan', 'hasil 1 - 1 = ...?', 1),
('Tugas Perkalian', 'hasil 1 x 1 = ...?', 1);  -->
