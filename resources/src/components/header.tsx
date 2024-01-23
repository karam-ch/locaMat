import React, { useState } from 'react';
import '../assets/css/header.css';

function Header() {
    const [showPopup, setShowPopup] = useState(false);

    const togglePopup = () => {
        setShowPopup(!showPopup);
    };

    return (
        <div>
            <div className="header">
                {/* <button id="signInBtn" onClick={togglePopup}>Sign In</button> */}
            </div>

            {showPopup && (
                <div className="popup">
                    <div className="popup-content">
                        <span className="closeBtn" onClick={togglePopup}>&times;</span>
                        <form>
                            <label htmlFor="username">Username:</label><br />
                            <input type="text" id="username" name="username" /><br />
                            <label htmlFor="password">Password:</label><br />
                            <input type="password" id="password" name="password" /><br />
                            <input type="submit" value="Login" />
                        </form>
                    </div>
                </div>
            )}
        </div>
    );
}

export default Header;
