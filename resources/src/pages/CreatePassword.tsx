import React, { useState } from 'react';
import '../assets/css/home.css';

function CreatePassword() {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log('Username:', username, 'Password:', password);
    };

    return (
        <div className="login-form-container">
            <form onSubmit={handleSubmit} className="login-form">
                <div className="form-field">
                    <label htmlFor="username">Fill in your password</label>
                    <input
                        type="text"
                        id="username"
                        value={username}
                        onChange={(e) => setUsername(e.target.value)}
                    />
                </div>
                <div className="form-field">
                    <label htmlFor="password">Confirm your password</label>
                    <input
                        type="password"
                        id="password"
                        value={password}
                        onChange={(e) => setPassword(e.target.value)}
                    />
                </div>
                <button type="submit" className="submit-button">Confirm Password</button>
            </form>
        </div>
    );
}

export default CreatePassword;
