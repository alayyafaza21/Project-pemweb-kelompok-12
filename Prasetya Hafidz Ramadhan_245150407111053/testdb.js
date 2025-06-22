const db = require('./config/db');

db.query('SELECT 1', (err, results) => {
    if (err) {
        console.error('Gagal koneksi ke database:', err);
    } else {
        console.log('Koneksi ke database edukidz berhasil!');
    }
});