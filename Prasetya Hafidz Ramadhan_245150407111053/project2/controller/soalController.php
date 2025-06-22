<?php

class SoalController {
    private $conn;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'edukidz');
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function index() {
        if (!isset($_SESSION)) session_start();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $index = $page - 1;

        // Buat urutan soal acak jika belum ada
        if (empty($_SESSION['urutan_soal'])) {
            $urutan = [];
            $pilgan = $this->conn->query("SELECT id, 'pilgan' as tipe FROM soal_pilgan");
            while ($row = $pilgan->fetch_assoc()) $urutan[] = $row;
            $essay = $this->conn->query("SELECT id, 'essay' as tipe FROM soal_essay");
            while ($row = $essay->fetch_assoc()) $urutan[] = $row;
            shuffle($urutan);
            $_SESSION['urutan_soal'] = $urutan;
            $_SESSION['jawaban'] = [];
        }

        $urutan = $_SESSION['urutan_soal'];
        $total = count($urutan);

        // Jika soal sudah habis, tampilkan halaman submit semua jawaban
        if ($index >= $total) {
            include 'public/submitAll.php';
            return;
        }

        $soal = $urutan[$index];
        $soal_id = (int)$soal['id'];
        $tipe = $soal['tipe'];

        // Simpan jawaban ke session
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['jawaban'])) {
            $_SESSION['jawaban'][$index] = [
                'id' => $soal_id,
                'tipe' => $tipe,
                'jawaban' => $_POST['jawaban']
            ];
            header("Location: index.php?url=soal/index&page=" . ($page + 1));
            exit;
        }

        // Tampilkan soal sesuai tipe
        if ($tipe === 'pilgan') {
            $result = $this->conn->query("SELECT * FROM soal_pilgan WHERE id = $soal_id");
            if ($row = $result->fetch_assoc()) {
                $pertanyaan = $row['pertanyaan'];
                $opsi = [
                    'A' => $row['opsi_a'],
                    'B' => $row['opsi_b'],
                    'C' => $row['opsi_c'],
                    'D' => $row['opsi_d']
                ];
                include 'public/soalPilgan.php';
            } else {
                echo "Soal tidak ditemukan.";
            }
        } else {
            $result = $this->conn->query("SELECT * FROM soal_essay WHERE id = $soal_id");
            if ($row = $result->fetch_assoc()) {
                $pertanyaan = $row['pertanyaan'];
                include 'public/soalEssay.php';
            } else {
                echo "Soal essay tidak ditemukan.";
            }
        }
    }

    public function submitAll() {
        if (!isset($_SESSION)) session_start();
        if (empty($_SESSION['jawaban'])) {
            include 'public/terimakasih.php';
            return;
        }
        foreach ($_SESSION['jawaban'] as $jawab) {
            $id = (int)$jawab['id'];
            $tipe = $jawab['tipe'];
            $jawaban = $this->conn->real_escape_string($jawab['jawaban']);
            if ($tipe === 'pilgan') {
                $this->conn->query("INSERT INTO jawaban_pilgan (soal_id, jawaban) VALUES ($id, '$jawaban')");
            } else {
                $this->conn->query("INSERT INTO jawaban_essay (soal_id, jawaban) VALUES ($id, '$jawaban')");
            }
        }
        unset($_SESSION['urutan_soal']);
        unset($_SESSION['jawaban']);
        include 'public/terimakasih.php';
    }
}