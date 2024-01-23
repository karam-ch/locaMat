import React from 'react';
import '../assets/css/home.css';
import { useNavigate } from 'react-router-dom';


const Home = () => {

    const navigate = useNavigate();


    return (
        <div className="container">
            <div className="box" onClick={() => navigate('/add-device')}>Add A Device</div>
            <div className="box" onClick={() => navigate('/')}>Box 2</div>
            <div className="box" onClick={() => navigate('/')}>Box 3</div>
            <div className="box" onClick={() => navigate('/')}>Box 4</div>
        </div>
    );
};

export default Home;
