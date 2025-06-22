const express = require('express');
const router = express.Router();
const fs = require('fs');

router.get('/', (req, res) => {
    const data = fs.readFileSync('./data/essay.json');
    res.json(JSON.parse(data));
});

module.exports = router;
