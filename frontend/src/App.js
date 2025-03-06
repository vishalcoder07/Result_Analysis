import React, { useState, useEffect } from 'react';
import axios from 'axios';

function App() {
    const [data, setData] = useState([]);
    const [formData, setFormData] = useState({ prn: '', seat_no: '', name: '', subjects: [] });

    useEffect(() => {
        fetchData();
    }, []);

    const fetchData = async () => {
        try {
            const response = await axios.get('http://localhost:5000/api/analysis');
            setData(response.data);
        } catch (error) {
            console.error(error);
        }
    };

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await axios.post('http://localhost:5000/api/analysis', formData);
            fetchData();
            setFormData({ prn: '', seat_no: '', name: '', subjects: [] }); // Reset form
        } catch (error) {
            console.error(error);
        }
    };

    const handleDelete = async (id) => {
        try {
            await axios.delete(`http://localhost:5000/api/analysis/${id}`);
            fetchData();
        } catch (error) {
            console.error(error);
        }
    };

    return (
        <div>
            <h1>Result Analysis</h1>
            <form onSubmit={handleSubmit}>
                <input type="text" name="prn" value={formData.prn} onChange={handleChange} placeholder="PRN" required />
                <input type="text" name="seat_no" value={formData.seat_no} onChange={handleChange} placeholder="Seat No" required />
                <input type="text" name="name" value={formData.name} onChange={handleChange} placeholder="Name" required />
                <button type="submit">Add Record</button>
            </form>
            <ul>
                {data.map(item => (
                    <li key={item._id}>
                        {item.name} - {item.prn} <button onClick={() => handleDelete(item._id)}>Delete</button>
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default App;
