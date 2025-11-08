import React, { useState, useEffect } from 'react';
import { useLanguage } from '../context/LanguageContext';
import './Slider.css'; // Import file CSS cho slider

// 1. Định nghĩa dữ liệu cho các slide
// (Hãy chắc chắn bạn đã đặt các ảnh này vào thư mục /public/Media/)
const slidesData = [
  {
    img: '/Media/tramcam_1.jpg',
    sloganKey: 'sologan_3',
    textKey: 'txt_3',
  },
  {
    img: '/Media/anh_2.webp',
    sloganKey: 'sologan_2',
    textKey: 'txt_2',
  },
  {
    img: '/Media/practice.webp',
    sloganKey: 'sologan_1',
    textKey: 'txt_1',
  },
];

function Slider() {
  const [currentSlide, setCurrentSlide] = useState(0);
  const { t } = useLanguage(); // Lấy hàm dịch

  // 2. Logic chuyển slide
  const plusSlides = (n) => {
    let newIndex = currentSlide + n;
    if (newIndex >= slidesData.length) {
      newIndex = 0; // Quay về slide đầu
    }
    if (newIndex < 0) {
      newIndex = slidesData.length - 1; // Về slide cuối
    }
    setCurrentSlide(newIndex);
  };

  // 3. Logic tự động chuyển slide
  useEffect(() => {
    const timer = setTimeout(() => {
      plusSlides(1); // Tự động next slide sau 5 giây
    }, 5000);

    // Dọn dẹp hẹn giờ
    return () => clearTimeout(timer);
  }, [currentSlide]); // Chạy lại mỗi khi currentSlide thay đổi

  return (
    <div className="slider">
      {slidesData.map((slide, index) => (
        <div
          key={index}
          className={`slide ${index === currentSlide ? 'active' : ''}`}
        >
          <img src={slide.img} alt={`Slide ${index + 1}`} />
          <div className="text-overlay">
            <h1>{t(slide.sloganKey)}</h1>
            {/* Dùng dangerouslySetInnerHTML để render <span> bên trong text */}
            <p
              dangerouslySetInnerHTML={{
                __html: t(slide.textKey),
              }}
            />
          </div>
        </div>
      ))}

      {/* Navigation Arrows */}
      <a className="prev" onClick={() => plusSlides(-1)}>
        &#10094;
      </a>
      <a className="next" onClick={() => plusSlides(1)}>
        &#10095;
      </a>
    </div>
  );
}

export default Slider;