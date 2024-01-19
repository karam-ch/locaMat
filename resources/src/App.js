import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/header.tsx';
import Footer from './components/footer.tsx';
import Home from './pages/Home.tsx';
import './App.css';

function App() {
  return (
    <Router>
      <div className="App">
        <Header />
        <Routes>
          <Route path="/" element={<Home />} />
        </Routes>
        <Footer />
      </div>
    </Router>
  );
}

export default App;

