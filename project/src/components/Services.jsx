// src/components/Services.jsx

import React, { useState } from 'react';
import { useLanguage } from '../context/LanguageContext';
import './Services.css'; // File CSS cho component này

// Import các icon chúng ta cần
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faUserMd, faVideo, faBook, faRobot } from '@fortawesome/free-solid-svg-icons';

// 1. Định nghĩa dữ liệu cho 4 service cards
const servicesData = [
  {
    key: 'doctor',
    icon: faUserMd,
    titleKey: 'doctor',
    textKey: 'cnt',
    videoSrc: '/Media/original.mp4', // Đảm bảo video ở /public/Media/
  },
  {
    key: 'remote',
    icon: faVideo,
    titleKey: 'remote_2',
    textKey: 'cnt_2',
    videoSrc: '/Media/original-2.mp4',
  },
  {
    key: 'edu',
    icon: faBook,
    titleKey: 'news',
    textKey: 'cnt_3',
    videoSrc: '/Media/original-3.mp4',
  },
  {
    key: 'gpt',
    icon: faRobot,
    titleKey: 'know',
    textKey: 'cnt_4',
    videoSrc: '/Media/original-4.mp4',
  },
];

function Services() {
  const { t } = useLanguage();
  
  // 2. Dùng State để lưu video đang active
  const [activeVideo, setActiveVideo] = useState(servicesData[0].videoSrc);
  const [activeCard, setActiveCard] = useState(servicesData[0].key);

  const handleCardClick = (service) => {
    setActiveVideo(service.videoSrc);
    setActiveCard(service.key);
  };

  return (
    <div className="services-section">
      <div className="services-header">
        <h2 id="remote">{t('remote')}</h2>
        <p id="ND1">{t('ND1')}</p>
      </div>

      {/* 3. Render 4 service cards */}
      <div className="services-menu">
        {servicesData.map((service) => (
          <div
            key={service.key}
            // Thêm class 'selected' nếu card đang active
            className={`service-card ${activeCard === service.key ? 'selected' : ''}`}
            onClick={() => handleCardClick(service)}
          >
            <div className="service-icon">
              <FontAwesomeIcon icon={service.icon} />
            </div>
            <div className="service-content">
              <h3 id={service.titleKey}>{t(service.titleKey)}</h3>
              <p id={service.textKey}>{t(service.textKey)}</p>
            </div>
          </div>
        ))}
      </div>

      {/* 4. Render video player */}
      <div className="video-container">
        {/* Dùng "key={activeVideo}" rất quan trọng. 
            Nó buộc React phải render lại thẻ <video> khi src thay đổi,
            thay vì chỉ update.
        */}
        <video id="videoPlayer" key={activeVideo} controls autoPlay muted>
          <source id="videoSource" src={activeVideo} type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  );
}

export default Services;