// src/components/Testimonials.jsx

import React, { useState, useEffect } from 'react';
import { useLanguage } from '../context/LanguageContext';

// --- SỬA LỖI 4: Đổi tên CSS import cho nhất quán ---
import './Comment.css'; 

// --- SỬA LỖI 1: Thêm import FontAwesomeIcon ---
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faAngleUp, faAngleDown } from '@fortawesome/free-solid-svg-icons';

// --- SỬA LỖI 3: Đổi tên data cho nhất quán ---
const CommentData = [ // (Đổi từ CommentData)
  {
    id: 1,
    avatar: '/Media/avatar_4.webp',
    name: 'Nguyễn Đình Vũ',
    commentKey: 'cmt_1',
  },
  {
    id: 2,
    avatar: '/Media/avatar_1.png',
    name: 'Đỗ Khánh Trâm',
    commentKey: 'cmt_2',
  },
  {
    id: 3,
    avatar: '/Media/avatar_4.webp',
    name: 'Trần Ngọc Sơn',
    commentKey: 'cmt_3',
  },
];

// --- SỬA LỖI 4: Đổi tên function cho nhất quán ---
function Comment() { // (Đổi từ Comment)
  const { t } = useLanguage();
  const [currentIndex, setCurrentIndex] = useState(0);

  const handleNav = (direction) => {
    let newIndex = currentIndex + direction;
    
    // --- SỬA LỖI 3: Dùng đúng tên biến data ---
    if (newIndex < 0) {
      newIndex = CommentData.length - 1;
    } else if (newIndex >= CommentData.length) { // Sửa ở đây
      newIndex = 0;
    }
    setCurrentIndex(newIndex);
  };

  useEffect(() => {
    const timer = setTimeout(() => {
      handleNav(1);
    }, 6000);
    return () => clearTimeout(timer);
  }, [currentIndex]);

  return (
    <div id="comment">
      <h2 id="feedback">{t('feedback')}</h2>
      <div id="comment-body">
        
        {/* --- SỬA LỖI 2: Dùng FontAwesomeIcon --- */}
        <div className="prev_1" title="Trước" onClick={() => handleNav(-1)}>
          <FontAwesomeIcon icon={faAngleUp} />
        </div>

        <div className="list-comment-wrapper">
          <ul
            id="list-comment"
            style={{
              transform: `translateY(-${currentIndex * 100}%)`,
            }}
          >
            {/* --- SỬA LỖI 3: Dùng đúng tên biến data --- */}
            {CommentData.map((item) => (
              <li className="item" key={item.id}>
                <div className="avatar">
                  <img src={item.avatar} alt={item.name} />
                </div>
                <div className="stars">
                  <span><img src="/Media/star.png" alt="*" /></span>
                  <span><img src="/Media/star.png" alt="*" /></span>
                  <span><img src="/Media/star.png" alt="*" /></span>
                  <span><img src="/Media/star.png" alt="*" /></span>
                  <span><img src="/Media/star.png" alt="*" /></span>
                </div>
                <div className="name">{item.name}</div>
                <div className="text-cmt">
                  <p>{t(item.commentKey)}</p>
                </div>
              </li>
            ))}
          </ul>
        </div>

        {/* --- SỬA LỖI 2: Dùng FontAwesomeIcon --- */}
        <div className="next_1" title="Sau" onClick={() => handleNav(1)}>
          <FontAwesomeIcon icon={faAngleDown} />
        </div>
      </div>
    </div>
  );
}

// --- SỬA LỖI 4: Đổi tên export cho nhất quán ---
export default Comment; // (Đổi từ Comment)