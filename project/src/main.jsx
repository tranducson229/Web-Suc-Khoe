// src/main.jsx

import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App.jsx';
import { LanguageProvider } from './context/LanguageContext.jsx';
import { BrowserRouter } from 'react-router-dom';

// 1. BẠN ĐÃ IMPORT AuthProvider CHƯA?
import { AuthProvider } from './context/AuthContext.jsx'; 

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <LanguageProvider>
      <BrowserRouter>
        {/* 2. BẠN ĐÃ BỌC <App /> BẰNG <AuthProvider> CHƯA? */}
        <AuthProvider>
          <App />
        </AuthProvider>
      </BrowserRouter>
    </LanguageProvider>
  </React.StrictMode>
);