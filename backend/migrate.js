const mysql = require('mysql');
const mongoose = require('mongoose');
const Analysis = require('./models/Analysis');

// MySQL Connection
const mysqlConnection = mysql.createConnection({
    host: 'localhost',
    user: 'your_mysql_user', // replace with your MySQL username
    password: 'your_mysql_password', // replace with your MySQL password
    database: 'result_analysis'
});

// MongoDB Connection
mongoose.connect('mongodb://127.0.0.1:27017/result_analysis', { useNewUrlParser: true, useUnifiedTopology: true })
    .then(() => {
        console.log('MongoDB connected');
        migrateData();
    })
    .catch(err => console.error('MongoDB connection error:', err));

const migrateData = () => {
    mysqlConnection.connect(err => {
        if (err) throw err;
        console.log('MySQL connected');
        const query = 'SELECT * FROM 202021secondyearanalysis';
        mysqlConnection.query(query, async (err, results) => {
            if (err) throw err;
            for (const row of results) {
                const analysisData = new Analysis({
                    prn: row.prn,
                    seat_no: row['seat no'],
                    name: row.name,
                    subjects: [
                        {
                            code: '210241',
                            ISE: row['210241ISE'],
                            ESE: row['210241ESE'],
                            TOTAL: row['210241TOTAL'],
                            TW: row['210241TW'],
                            PR: row['210241PR'],
                            OR: row['210241OR'],
                            TotPercent: row['210241Tot%'],
                            Crd: row['210241Crd'],
                            Grd: row['210241Grd'],
                            GP: row['210241GP'],
                            CP: row['210241CP']
                        },
                        // Add other subjects similarly
                    ]
                });
                await analysisData.save();
            }
            console.log('Data migration completed');
            mysqlConnection.end();
            mongoose.connection.close();
        });
    });
};
