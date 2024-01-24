import React, { useState } from 'react';
import '../assets/css/addDeviceForm.css';

function AddDeviceForm() {

    const [name, setName] = useState('');
    const [type, setType] = useState('');
    const [ref, setRef] = useState('');
    const [version, setVersion] = useState('');
    const [phoneNumber, setPhoneNumber] = useState('');
    const [picture, setPicture] = useState(null);
    const [statusMessage, setStatusMessage] = useState('')

    const handleSubmit = (event) => {
        event.preventDefault();
        console.log('Form data:', { name, type, ref, version, phoneNumber, picture });
    };

    const handlePictureChange = (event) => {
        setPicture(event.target.files[0]);
    };

    return (
        <div className="form-container">
            <h1>Add a Device</h1>
            <form onSubmit={handleSubmit} className="form">
                <div className="form-field">
                    <label htmlFor="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        value={name}
                        onChange={(e) => setName(e.target.value)}
                    />
                </div>
                <div className="form-field">
                    <label htmlFor="type">Type</label>
                    <select id="type" value={type} onChange={(e) => setType(e.target.value)}>
                        <option value="">Select Type</option>
                        <option value="type1">Type 1</option>
                        <option value="type2">Type 2</option>
                        {/* Add other types as needed */}
                    </select>
                </div>
                <div className="form-field">
                    <label htmlFor="ref">Ref</label>
                    <select id="ref" value={ref} onChange={(e) => setRef(e.target.value)}>
                        <option value="">Select Ref</option>
                        <option value="ref1">Ref 1</option>
                        <option value="ref2">Ref 2</option>
                        {/* Add other refs as needed */}
                    </select>
                </div>
                <div className="form-field">
                    <label htmlFor="version">Version</label>
                    <input
                        type="text"
                        id="version"
                        value={version}
                        onChange={(e) => setVersion(e.target.value)}
                    />
                </div>
                <div className="form-field">
                    <label htmlFor="phone-number">Phone Number</label>
                    <input
                        type="tel"
                        id="phone-number"
                        value={phoneNumber}
                        onChange={(e) => setPhoneNumber(e.target.value)}
                    />
                </div>
                <div className="form-field">
                    <label htmlFor="picture">Upload Pictures <br /><span> up to 5</span></label>
                    <input
                        type="file"
                        id="picture"
                        onChange={handlePictureChange}
                    />
                </div>
                <button type="submit" className="submit-button">Add the device</button>
                <h1>{statusMessage}</h1>
            </form>
        </div>
    );
}

export default AddDeviceForm;
