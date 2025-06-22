const express = require('express');
const cors = require('cors');
const db = require('./db');

const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());
app.use(express.json());

app.get('/api/getdaftarclass', (req, res) => {
    const classes = ['class 1', 'class 2', 'class 3', 'class 4'];
    res.status(200).json(classes);
});

app.get('/api/getClassDetail/:className', (req, res) => {
    const { className } = req.params;

    const data = {
        'class 1': {
            id: 1,
            name: 'class 1',
            siswa: [''],
            tugas: [
                { id: 1, judul: 'Tugas Matematika' },
                { id: 2, judul: 'Tugas IPA' }
            ]
        },
        'class 2': {
            id: 2,
            name: 'class 2',
            siswa: [''],
            tugas: [
                { id: 1, judul: 'Tugas Bahasa Indonesia' }
            ]
        }
    };

    const classDetail = data[className];

    if (classDetail) {
        res.status(200).json(classDetail);
    } else {
        res.status(404).json({ message: 'Kelas tidak ditemukan.' });
    }
});

app.get('/api/db/class-list', async (req, res) => {
    let connection;
    try {
        connection = await db.getConnection();
        const [rows] = await connection.execute("SELECT id, nama FROM kelas");
        res.status(200).json(rows);
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Terjadi kesalahan server saat mengambil daftar kelas dari database.', error: error.message });
    } finally {
        if (connection) connection.release();
    }
});

app.get('/api/db/modelclass/:id', async (req, res) => {
    const { id } = req.params;
    let connection;

    try {
        connection = await db.getConnection();
        await connection.beginTransaction();

        const [kelasRows] = await connection.execute(
            "SELECT id, nama FROM kelas WHERE id = ?",
            [id]
        );
        const kelas = kelasRows[0];

        if (!kelas) {
            await connection.rollback();
            return res.status(404).json({ message: 'Kelas tidak ditemukan.' });
        }

        const [anggotaRows] = await connection.execute(
            "SELECT nama FROM anggota WHERE kelas_id = ?",
            [id]
        );
        const anggota = anggotaRows.map(row => row.nama);

        const [tugasRows] = await connection.execute(
            "SELECT id, judul FROM tugas WHERE kelas_id = ?",
            [id]
        );
        const tugas = tugasRows;

        const result = {
            id: kelas.id,
            name: kelas.nama,
            members: anggota,
            tugas: tugas
        };

        await connection.commit();
        res.status(200).json(result);
    } catch (error) {
        if (connection) await connection.rollback();
        console.error(error);
        res.status(500).json({ message: 'salah/error', error: error.message });
    } finally {
        if (connection) connection.release();
    }
});

app.get('/api/db/Coso/:id', async (req, res) => {
    const { id } = req.params;
    let connection;

    try {
        connection = await db.getConnection();

        const [tugasRows] = await connection.execute(
            "SELECT id, judul, soal, kelas_id FROM tugas WHERE id = ?",
            [id]
        );
        const tugas = tugasRows[0];

        if (tugas) {
            res.status(200).json(tugas);
        } else {
            res.status(404).json({ message: 'Tugas tidak ditemukan.' });
        }
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'error', error: error.message });
    } finally {
        if (connection) connection.release();
    }
});

app.listen(PORT, () => {
    console.log(`Server berjalan di http://localhost:${PORT}`);
});
