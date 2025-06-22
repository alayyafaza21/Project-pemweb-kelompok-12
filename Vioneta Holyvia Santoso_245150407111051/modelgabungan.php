<!-- model yg sblmnya dipake di folder yg berbeda buat bikin halaman dmn guru buat soal -->
<?php
require_once 'database.php';

class ClassModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function modelclass($id) {
        $stmt = $this->db->prepare("SELECT * FROM kelas WHERE id = ?");
        $stmt->execute([$id]);
        $kelas = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$kelas) return null;

    
        $anggota = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $stmt = $this->db->prepare("SELECT id, judul FROM tugas WHERE kelas_id = ?");
        $stmt->execute([$id]);
        $tugas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'id' => $kelas['id'],
            'name' => $kelas['nama'],
            'members' => $anggota,
            'tugas' => $tugas
        ];
    }

    public function Coso($tugasId) {
        $stmt = $this->db->prepare("SELECT * FROM tugas WHERE id = ?");
        $stmt->execute([$tugasId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
