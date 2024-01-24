import React from 'react';
import '../assets/css/home.css';
import { useNavigate } from 'react-router-dom';


const Home = () => {

    const navigate = useNavigate();


    return (
        <div className="container">
            <div className="box" onClick={() => navigate('/add-device')}>Add A Device</div>
            <div className="box" onClick={() => navigate('/')}>Add a user</div>
            <div className="box" onClick={() => navigate('/')}>Device list</div>
            <div className="box" onClick={() => navigate('/')}>User list</div>
        </div>
    );
};

export default Home;
