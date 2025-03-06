const mongoose = require('mongoose');

const analysisSchema = new mongoose.Schema({
    prn: { type: String, required: true },
    seat_no: { type: String, required: true },
    name: { type: String, required: true },
    subjects: [{
        code: { type: String, required: true },
        ISE: { type: Number, default: 0 },   // Internal Semester Exam
        ESE: { type: Number, default: 0 },   // End Semester Exam
        TOTAL: { type: Number, default: 0 }, // Total marks
        TW: { type: Number, default: 0 },    // Term Work
        PR: { type: Number, default: 0 },    // Practical Exam
        OR: { type: Number, default: 0 },    // Oral Exam
        TotPercent: { type: Number, default: 0 }, // Total Percentage
        Crd: { type: Number, required: true },   // Credit points
        Grd: { type: String, required: true },   // Grade
        GP: { type: Number, required: true },    // Grade Points
        CP: { type: Number, required: true }     // Credit Points
    }]
}, { collection: 'analysis' });

module.exports = mongoose.model('Analysis', analysisSchema);
