// src/App.jsx

import React from 'react';
// 1. IMPORT CÁC THÀNH PHẦN CỦA ROUTER
import { Routes, Route } from 'react-router-dom'; // Bỏ Outlet vì không dùng

// Import Layout
import MainNavbar from './components/Navbar';
import Footer from './components/Footer';

// Import Các Trang (Pages)
import HomePage from './pages/HomePage';
import ServicesPage from './pages/ServicesPage';
// --- THÊM IMPORT ---
import LoginPage from './pages/LoginPage';
// import RegisterPage from './pages/RegisterPage'; // Giả sử bạn cũng có trang Đăng ký

// Import CSS
import 'bootstrap/dist/css/bootstrap.min.css';
import './App.css'; 

function App() {
  return (
    <div className="App">
      {/* 2. NAVBAR VÀ FOOTER LUÔN HIỂN THỊ */}
      {/* Bỏ prop isLoggedIn={false}, Navbar sẽ tự lấy từ AuthContext */}
      <MainNavbar /> 

      {/* 3. ĐỊNH NGHĨA CÁC TUYẾN ĐƯỜNG */}
      <Routes>
        {/* Tuyến đường cho Trang chủ */}
        <Route path="/" element={<HomePage />} />
        
        {/* Tuyến đường cho Trang Dịch vụ */}
        <Route path="/services" element={<ServicesPage />} />
        
        {/* --- THÊM ROUTE CHO ĐĂNG NHẬP/ĐĂNG KÝ --- */}
        <Route path="/login" element={<LoginPage />} />
        {/* <Route path="/register" element={<RegisterPage />} /> */}
        
        {/* Ví dụ cho các trang khác:
          <Route path="/experts" element={<ExpertPage />} />
          <Route path="/community" element={<CommunityPage />} />
          <Route path="/about" element={<AboutPage />} /> 
        */}

        {/* Route cho "Không tìm thấy" */}
        <Route path="*" element={
          <div className="container" style={{ marginTop: '100px' }}>
            <h2>404 - Không tìm thấy trang</h2>
          </div>
        } />
       
      </Routes>
      
      <Footer />
    </div>
  );
}

export default App;