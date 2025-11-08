// src/pages/LoginPage.jsx

import React, { useState } from 'react';
import { useAuth } from '../context/AuthContext'; // Hook Auth của chúng ta
import { useNavigate, Link } from 'react-router-dom'; // Hook của React Router
import './login.css'; // File CSS bạn cung cấp (xem Bước 2)

function LoginPage() {
  // --- State cho form ---
  const [email, setEmail] = useState(''); // Đổi 'name' thành 'email' để khớp với Firebase
  const [password, setPassword] = useState('');
  const [isPasswordVisible, setIsPasswordVisible] = useState(false);
  
  // --- State cho logic ---
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  // --- Lấy hàm từ Context và Router ---
  const { login } = useAuth();
  const navigate = useNavigate();

  // --- Xử lý Submit Form ---
  const handleSubmit = async (e) => {
    e.preventDefault(); // Ngăn trình duyệt tải lại trang
    setError('');
    setLoading(true);

    try {
      await login(email, password); // Gọi hàm login từ Firebase
      navigate('/'); // Thành công -> Về trang chủ
    } catch (err) {
      setError('Đăng nhập thất bại. Vui lòng kiểm tra lại email/mật khẩu.');
      console.error(err); // In lỗi ra console để debug
    }
    
    setLoading(false); // Xong việc, tắt loading
  };

  // --- Xử lý bật/tắt xem mật khẩu ---
  const togglePasswordVisibility = () => {
    setIsPasswordVisible(!isPasswordVisible); // Đảo ngược trạng thái
  };

  return (
    // Thêm style để đẩy form xuống dưới Navbar (fixed="top")
    <div className="container" style={{ marginTop: '56px', paddingTop: '2rem' }}> 
      <div className="containerContent">
        <h3>Welcome back!</h3>
        <h1>Log In</h1>
        
        {/* Hiển thị lỗi nếu có */}
        {error && <p className="error-alert">{error}</p>}

        {/* --- FORM ĐÃ CHUYỂN SANG REACT --- */}
        <form onSubmit={handleSubmit}>
          {/* Thay "Name" bằng "Email" */}
          <label htmlFor="email">Email</label> 
          <div className="inputRow">
            <input 
              type="email" 
              id="email"
              placeholder="Enter your email" 
              value={email} // Gắn state vào input
              onChange={(e) => setEmail(e.target.value)} // Cập nhật state
              required 
            />
          </div>
          <label htmlFor="password">Password</label>
          <div className="inputRow">
            <input 
              // Dùng state để đổi type
              type={isPasswordVisible ? "text" : "password"} 
              id="password" 
              placeholder="Enter your Password" 
              value={password} // Gắn state
              onChange={(e) => setPassword(e.target.value)} // Cập nhật state
              required 
            />
            {/* --- LOGIC ICON MẮT --- */}
            <span id="password-eye" onClick={togglePasswordVisibility} style={{cursor: 'pointer'}}>
              {isPasswordVisible 
                ? <i className="ri-eye-line"></i> 
                : <i className="ri-eye-off-line"></i>
              }
            </span>
          </div>
          <div className="inputFP">
            <a href="#">Forgot Password?</a>
          </div>
          <button type="submit" className="btn btn-primary" disabled={loading} name="submit_login">
            {loading ? 'Đang đăng nhập...' : 'Login Now'}
          </button>
        </form>
        <h6>Or continue with</h6>
        <div className="logins">
          {/* TODO: Thêm hàm onClick cho social login */}
          <a href="#"><img src="/Media/search.png" alt="google" /></a>
          <a href="#"><img src="/Media/github.png" alt="github" /></a>
          <a href="#"><img src="/Media/facebook.png" alt="facebook" /></a>
        </div>
        <p>Don't have an account yet? <Link to="/register">Sign up</Link></p>
      </div>
      <div id="quaylai">
        {/* Dùng <Link> của Router */}
        <Link to="/">Get back</Link>
      </div>
      <div className="containerImg">
        <img src="/Media/1.1.png" alt="header" />
      </div>
    </div>
  );
}

export default LoginPage;