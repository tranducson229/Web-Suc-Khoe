// src/components/Navbar.jsx

import React from 'react';
import { Navbar, Nav, NavDropdown, Container } from 'react-bootstrap';
import { useLanguage } from '../context/LanguageContext';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faGlobe, faSignOutAlt } from '@fortawesome/free-solid-svg-icons';
import { useAuth } from '../context/AuthContext.jsx';
import { Link, useNavigate } from 'react-router-dom';
// --- LỖI 1 ĐƯỢC SỬA: IMPORT LINK ---

// --- LỖI 2 ĐƯỢC SỬA: CẬP NHẬT LẠI MENU DATA ---
const menuData = [
  { id: 'home', labelKey: 'title', href: '/' }, // Trang chủ
  {
    id: 'services',
    labelKey: 'services',
    href: '/services', // Link cho mục cha
    children: [
      { id: 'service1', labelKey: 'service1', href: '/services/private-doctor' }, 
      { id: 'service2', labelKey: 'service2', href: '/services/psychology' }, 
      { id: 'service3', labelKey: 'service3', href: '/services/telemedicine' },
      {
        id: 'service4',
        labelKey: 'service4',
        href: '/services/health-check', // Link cho cấp 2
        children: [
           { id: 'test1', labelKey: 'test1', href: '/services/health-check/test1' },
           { id: 'test2', labelKey: 'test2', href: '/services/health-check/test2' },
        ]
      },
    ],
  },
  {
    id: 'expert',
    labelKey: 'expert',
    href: '/experts', // Link chính
    children: [
      { id: 'expert1', labelKey: 'expert1', href: '/experts/list' },
      { id: 'expert2', labelKey: 'expert2', href: '/experts/consult' },
      { id: 'expert3', labelKey: 'expert3', href: '/experts/book' },
    ],
  },
  {
    id: 'community',
    labelKey: 'community',
    href: '/community',
    children: [
      { id: 'forum', labelKey: 'forum', href: '/community/forum' },
      { id: 'support', labelKey: 'support', href: '/community/support' },
    ],
  },
  {
    id: 'about',
    labelKey: 'about_us',
    href: '/about',
    children: [
      { id: 'mission', labelKey: 'mission', href: '/about/mission' },
      { id: 'vision', labelKey: 'vision', href: '/about/vision' },
    ],
  },
];

// (Lưu ý: Bạn có thể xóa hàm "RenderMenuItem" bị dư)

// --- LỖI 3 ĐƯỢC SỬA: CẬP NHẬT HÀM ĐỆ QUY ---
function RenderMenuItemRecursive({ item }) {
    const { t } = useLanguage();
    const label = t(item.labelKey);
    const hasChildren = item.children && item.children.length > 0;

    if (hasChildren) {
        return (
            <NavDropdown title={label} id={`dropdown-${item.id}`}>
                {item.children.map((child) => (
                    // Gọi đệ quy
                    <RenderMenuItemRecursive key={child.id} item={child} />
                ))}
            </NavDropdown>
        );
    }

    // SỬA Ở ĐÂY: Dùng as={Link} và to={...}
    return (
        <NavDropdown.Item as={Link} to={item.href}>{label}</NavDropdown.Item>
    );
}

// (LanguageSwitcher giữ nguyên, không đổi)
function LanguageSwitcher() {
  const { language, setLanguage } = useLanguage();
  const currentLanguageText = {
    'vi': 'Tiếng Việt',
    'en': 'English',
    'jp': '日本語'
  }[language];

  return (
    <NavDropdown 
      title={(
        <span>
          <FontAwesomeIcon icon={faGlobe} /> {currentLanguageText}
        </span>
      )} 
      id="language-dropdown"
    >
      <NavDropdown.Item onClick={() => setLanguage('vi')}>Tiếng Việt</NavDropdown.Item>
      <NavDropdown.Item onClick={() => setLanguage('en')}>English</NavDropdown.Item>
      <NavDropdown.Item onClick={() => setLanguage('jp')}>日本語</NavDropdown.Item>
    </NavDropdown>
  );
}

// (MainNavbar giữ nguyên, nó đã đúng)
function MainNavbar() {
  const { t } = useLanguage();
  const { currentUser, isLoggedIn, logout } = useAuth();
  const navigate = useNavigate();

  const handleLogout = async () => {
    try {
      await logout();
      navigate('/login');
    } catch (error) {
      console.error('Failed to log out', error);
    }
  };

  return (
    <Navbar expand="lg" className="bg-body-tertiary" fixed="top">
      <Container>
        <Navbar.Brand as={Link} to="/">
            <img src="/Media/logo.svg" alt="Health Care Logo" width="50px" />
             Health Care
        </Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="mx-auto align-items-center"> {/* Đảm bảo có align-items-center */}
            {menuData.map((item) => {
                const hasChildren = item.children && item.children.length > 0;
                const label = t(item.labelKey);

                if (hasChildren) {
                    // --- SỬA LỖI <a> TRONG <a> ---
                    // Chỉ render 'label' (text) làm 'title'
                    return (
                        <NavDropdown title={label} id={`dropdown-${item.id}`} key={item.id}>
                            {/* Bạn có thể thêm link cho mục cha ở đây nếu muốn */}
                            <NavDropdown.Item as={Link} to={item.href}>{label} (Tất cả)</NavDropdown.Item>
                            <NavDropdown.Divider />
                            {item.children.map((child) => (
                                <RenderMenuItemRecursive key={child.id} item={child} />
                            ))}
                        </NavDropdown>
                    );
                } else {
                    return (
                        <Nav.Link as={Link} to={item.href} key={item.id}>{label}</Nav.Link>
                    );
                }
            })}
          </Nav>
          
          <Nav className="align-items-center"> {/* Thêm align-items-center */}
            <LanguageSwitcher />
            {isLoggedIn ? (
              <NavDropdown title={`Xin chào, ${currentUser.email.split('@')[0]}`} id="profile-dropdown">
                <NavDropdown.Item as={Link} to="/profile">Hồ sơ</NavDropdown.Item>
                <NavDropdown.Divider />
                <NavDropdown.Item onClick={handleLogout}>
                  <FontAwesomeIcon icon={faSignOutAlt} /> Đăng xuất
                </NavDropdown.Item>
              </NavDropdown>
            ) : (
              <Nav.Link as={Link} to="/login" className="login-button">Đăng nhập</Nav.Link>
            )}
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default MainNavbar;