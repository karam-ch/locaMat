import React, { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import '../assets/css/userList.css';

export default function UserList() {
    const [users, setUsers] = useState([]);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await fetch('/api/users');
                const data = await response.json();
                setUsers(data);
            } catch (error) {
                console.error('Error fetching users:', error);
            }
        };

        fetchData();
    }, []);

    return (
        <div className="user-list">
            {users.map(user => (
                <Link to={`/user-details/`} className="user-item">
                </Link>
            ))}
        </div>
    );
}
