const express = require('express');
const router = express.Router();
const db = require('../config/db');

router.post('/', (req, res) => {
    const { user_id, jawabanEssay, jawabanPilgan } = req.body;

    if (jawabanEssay && jawabanEssay.length > 0) {
        jawabanEssay.forEach(item => {
            db.query('INSERT INTO jawaban_user SET ?', {
                user_id,
                tipe_soal: 'essay',
                soal_id: item.id,
                jawaban: item.jawaban
            });
        });
    }

    if (jawabanPilgan && jawabanPilgan.length > 0) {
        jawabanPilgan.forEach(item => {
            db.query('INSERT INTO jawaban_user SET ?', {
                user_id,
                tipe_soal: 'pilgan',
                soal_id: item.id,
                jawaban: item.jawaban
            });
        });
    }

    res.json({ message: "Jawaban berhasil disimpan ke database." });
});

module.exports = router;