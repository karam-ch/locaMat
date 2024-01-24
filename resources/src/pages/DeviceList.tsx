import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../assets/css/deviceList.css';

export default function DeviceList() {
    const [devices, setDevices] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch('/api/devices');
                const data = await response.json();
                setDevices(data);
            } catch (error) {
                console.error('Error fetching devices:', error);
            }
        };

        fetchData();
    }, []);

    return (
        <div className="device-list">
            {devices.map(device => (
                <Link to={`/device-details/`} className="device-item">
                </Link>
            ))}
            <h1>device list</h1>
        </div>
    );
}
