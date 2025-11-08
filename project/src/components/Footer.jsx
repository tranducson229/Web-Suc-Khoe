// src/components/Footer.jsx

import React from 'react';
import { useLanguage } from '../context/LanguageContext';
import { Container, Row, Col } from 'react-bootstrap'; // Dùng layout của Bootstrap
import './Footer.css'; // File CSS riêng cho Footer

// Import icon (cả solid và brands)
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHome, faEnvelope, faPhone, faPrint } from '@fortawesome/free-solid-svg-icons';
import { 
  faFacebookF, faTwitter, faGoogle, faInstagram, faLinkedin, faGithub 
} from '@fortawesome/free-brands-svg-icons'; // Import từ gói brands

function Footer() {
  const { t } = useLanguage();

  return (
    // Dùng class 'text-muted' của Bootstrap
    <footer className="footer-section bg-body-tertiary text-muted">
      <Container>
        {/* --- Section: Social media --- */}
        <section className="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <div className="me-5 d-none d-lg-block">
            <span id="follow">{t('follow')}</span>
          </div>
          <div className="social-icons">
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faFacebookF} /></a>
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faTwitter} /></a>
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faGoogle} /></a>
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faInstagram} /></a>
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faLinkedin} /></a>
            <a href="#!" className="me-4 text-reset"><FontAwesomeIcon icon={faGithub} /></a>
          </div>
        </section>

        {/* --- Section: Links --- */}
        <section className="footer-links">
          <Container className="text-center text-md-start mt-5">
            <Row className="mt-3">
              {/* --- Cột 1: Giới thiệu --- */}
              <Col md={4} lg={4} xl={4} className="mx-auto mb-4">
                <h6 className="text-uppercase fw-bold mb-4">
                  <img src="/Media/logo.svg" alt="Health Care Logo" width="40px" className="me-2" /> Health Care
                </h6>
                <p id="mes" dangerouslySetInnerHTML={{ __html: t('mes') }} />
                <p id="mes_1">{t('mes_1')}</p>
              </Col>

              {/* --- Cột 2: Bệnh nhân --- */}
              <Col md={2} lg={2} xl={2} className="mx-auto mb-4">
                <h6 className="text-uppercase fw-bold mb-4" id="patients">{t('patients')}</h6>
                <p><a href="#!" className="text-reset" id="thao">{t('thao')}</a></p>
                <p><a href="#!" className="text-reset" id="thuong">{t('thuong')}</a></p>
                <p><a href="#!" className="text-reset" id="phuong">{t('phuong')}</a></p>
                <p><a href="#!" className="text-reset" id="ngoc">{t('ngoc')}</a></p>
              </Col>

              {/* --- Cột 3: Hỗ trợ --- */}
              <Col md={2} lg={2} xl={2} className="mx-auto mb-4">
                <h6 className="text-uppercase fw-bold mb-4" id="sup">{t('sup')}</h6>
                <p><a href="#!" className="text-reset" id="ques">{t('ques')}</a></p>
                <p><a href="#!" className="text-reset" id="contact">{t('contact')}</a></p>
                <p><a href="#!" className="text-reset" id="privacy">{t('privacy')}</a></p>
              </Col>

              {/* --- Cột 4: Liên hệ --- */}
              <Col md={4} lg={3} xl={3} className="mx-auto mb-md-0 mb-4 contact-info">
                <h6 className="text-uppercase fw-bold mb-4" id="in4">{t('in4')}</h6>
                <p id="school"><FontAwesomeIcon icon={faHome} className="me-3" /> {t('school')}</p>
                <p id="email"><FontAwesomeIcon icon={faEnvelope} className="me-3" /> {t('email')}</p>
                <p id="tele_1"><FontAwesomeIcon icon={faPhone} className="me-3" /> {t('tele_1')}</p>
                <p id="tele_2"><FontAwesomeIcon icon={faPrint} className="me-3" /> {t('tele_2')}</p>
              </Col>
            </Row>
          </Container>
        </section>
      </Container>

      {/* --- Copyright --- */}
      <div className="text-center p-4 copyright-bar">
        © 2024 Copyright:
        <a className="text-reset fw-bold ms-1" href="#!">Group 5</a>
      </div>
    </footer>
  );
}

export default Footer;