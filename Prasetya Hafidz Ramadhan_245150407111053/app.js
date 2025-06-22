const express = require('express');
const cors = require('cors');
const app = express();

app.use(cors());
app.use(express.json());

const soalEssay = require('./routes/soalEssay');
const soalPilgan = require('./routes/soalPilgan');
const submit = require('./routes/submit');

app.use('/api/essay', soalEssay);
app.use('/api/pilgan', soalPilgan);
app.use('/api/submit', submit);

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});