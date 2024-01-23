import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/header.tsx';
import Footer from './components/footer.tsx';
import Connection from './pages/Connection.tsx';
import Home from './pages/Home.tsx';
import './App.css';
import AddDevice from './pages/AddDevice.tsx';

function App() {
  return (
    <Router>
      <div className="App">
        <Header />
        <Routes>
          <Route path="/connection" element={<Connection />} />
          <Route path="/" element={<Home />} />
          <Route path="/add-device" element={<AddDevice />} />
        </Routes>
        <Footer />
      </div>
    </Router>
  );
}

export default App;

