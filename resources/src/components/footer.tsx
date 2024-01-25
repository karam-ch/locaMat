import React from 'react';
import '../assets/css/footer.css';

function Footer() {
    return (
        <footer className="footer">
            <p>© {new Date().getFullYear()} LocaMat. All Rights Reserved.</p>
            {/* You can add more content here as needed */}
        </footer>
    );
}

export default Footer;