const express = require('express');
const mongoose = require('mongoose');

const app = express();
const port = 5000;

// Middleware
app.use(express.json());

// MongoDB Connection
mongoose.connect('mongodb://127.0.0.1:27017/result_analysis')
    .then(() => console.log('✅ MongoDB connected'))
    .catch(err => {
        console.error('❌ MongoDB connection error:', err);
        process.exit(1); // Exit if connection fails
    });

// Import the Analysis model
const Analysis = require('./models/Analysis'); // Ensure this file exists

// Define Routes
app.get('/', (req, res) => {
    res.send('API is running');
});

// API to get all analysis records
app.get('/api/analysis', async (req, res) => {
    try {
        const analysis = await Analysis.find();
        console.log("Database Creteded " + analysis);
        res.json(analysis);
    } catch (err) {
        res.status(500).json({ error: err.message });
    }
});

// API to create a new analysis record
app.post('/api/analysis', async (req, res) => {
    try {
        const newAnalysis = new Analysis(req.body);
        const savedAnalysis = await newAnalysis.save();
        res.status(201).json(savedAnalysis);
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
});

// API to update an analysis record
app.put('/api/analysis/:id', async (req, res) => {
    try {
        const updatedAnalysis = await Analysis.findByIdAndUpdate(req.params.id, req.body, { new: true });
        if (!updatedAnalysis) return res.status(404).json({ message: 'Record not found' });
        res.json(updatedAnalysis);
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
});

// API to delete an analysis record
app.delete('/api/analysis/:id', async (req, res) => {
    try {
        const deletedAnalysis = await Analysis.findByIdAndDelete(req.params.id);
        if (!deletedAnalysis) return res.status(404).json({ message: 'Record not found' });
        res.status(204).send();
    } catch (err) {
        res.status(400).json({ error: err.message });
    }
});

// Start the server
app.listen(port, () => {
    console.log(`🚀 Server running on http://localhost:${port}`);
});
