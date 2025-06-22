// db.js
// Mengelola koneksi database MySQL menggunakan mysql2/promise

const mysql = require('mysql2/promise'); // Mengimpor driver MySQL dengan dukungan Promise
require('dotenv').config(); // Memuat variabel lingkungan dari file .env

// Konfigurasi koneksi database diambil dari variabel lingkungan
const pool = mysql.createPool({
    host: process.env.DB_HOST,     // Host database (misal: 'localhost')
    user: process.env.DB_USER,     // Username database (misal: 'root')
    password: process.env.DB_PASSWORD, // Password database (biarkan kosong jika tidak ada)
    database: process.env.DB_NAME, // Nama database yang akan digunakan
    waitForConnections: true,      // Menunggu jika semua koneksi sedang digunakan
    connectionLimit: 10,           // Batas jumlah koneksi dalam pool
    queueLimit: 0                  // Batas antrian untuk koneksi yang menunggu (0 = tidak terbatas)
});

// Mengekspor pool koneksi agar dapat digunakan di file lain
module.exports = pool;
