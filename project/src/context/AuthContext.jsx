// src/context/AuthContext.jsx

import React, { createContext, useContext, useState, useEffect } from 'react';
import { auth } from '../firebaseConfig.js'; // Import từ file config
import {
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
  onAuthStateChanged
} from 'firebase/auth';

// 1. Tạo Context
const AuthContext = createContext();

// 2. Tạo Hook (để dễ sử dụng)
export const useAuth = () => {
  return useContext(AuthContext);
};

// 3. Tạo Provider
export function AuthProvider({ children }) {
  const [currentUser, setCurrentUser] = useState(null);
  const [loading, setLoading] = useState(true); // Trạng thái "đang tải"

  // Hàm đăng ký
  function register(email, password) {
    return createUserWithEmailAndPassword(auth, email, password);
  }

  // Hàm đăng nhập
  function login(email, password) {
    return signInWithEmailAndPassword(auth, email, password);
  }

  // Hàm đăng xuất
  function logout() {
    return signOut(auth);
  }

  // 4. Theo dõi trạng thái đăng nhập
  useEffect(() => {
    // onAuthStateChanged là trình nghe của Firebase
    // Nó sẽ tự động chạy khi user đăng nhập hoặc đăng xuất
    const unsubscribe = onAuthStateChanged(auth, (user) => {
      setCurrentUser(user); // user sẽ là null nếu đã đăng xuất
      setLoading(false); // Xong loading
    });

    return unsubscribe; // Dọn dẹp trình nghe khi component unmount
  }, []);

  // 5. Giá trị cung cấp cho toàn app
  const value = {
    currentUser,
    isLoggedIn: !!currentUser, // Biến boolean tiện lợi
    register,
    login,
    logout
  };

  return (
    <AuthContext.Provider value={value}>
      {/* Chỉ render app khi đã hết loading */}
      {!loading && children}
    </AuthContext.Provider>
  );
}