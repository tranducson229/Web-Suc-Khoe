<div id="wrapper" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1000;">
    <div class="header">
       <nav class="container">
        <a href="Web_Suc_Khoe copy.php" id="logo" style="text-decoration: none;color:#474746;">
            <img src="../Media/logo.svg" alt="" srcset="" style="width: 15%;"> HEALTH CARE
        </a>
        <ul id="main-menu">
            <li id="title"><a href="Web_Suc_Khoe copy.php">Trang chủ</a></li>
            <li id="services" class="has-child">
                <a href="#">Dịch vụ</a>
                <ul class="sub-menu">
                    <li><a id="service4" href="face_form.php">Kiểm tra tâm lý</a></li>
                    <li><a id="service2" href="Tuvantrilieutamly.php">Tư vấn trị liệu tâm lý</a></li>
                    <li><a id="service3" href="khamtuxa.php">Khám từ xa</a></li>
                    <li><a id="service1" href="Bacsirieng.php">Bác sĩ riêng</a></li>
                </ul>
            </li>
        
            <li id="expert">
             <a href="">Chuyên gia</a>
                <ul class="sub-menu">
                    <li><a id="expert1"href="doctors.php">Danh sách</a></li>
                    <li><a id="expert2"href="">Chuyên gia tư vấn trực tiếp</a></li>
                     <li><a id="expert3"href="">Đặt hẹn</a></li>
                </ul>
          </li>
          <li id="community">
            <a  href="">Cộng đồng</a>
                <ul class="sub-menu">
                    <li><a id ="forum" href="">Diễn đàn</a></li>
                    <li><a id ="support" href="">Hỗ trợ</a></li>
                </ul>
            </li>
          <li id="about_us">
            <a href="">Về chúng tôi</a>
                <ul class="sub-menu">
                    <li><a id="mission" href="">Sứ mệnh</a></li>
                    <li><a id="vision"href="">Tầm nhìn phát triển</a></li>
                </ul>
        </li>
        <div class="login">
            <!-- Biểu tượng địa cầu -->
            <!-- Danh sách ngôn ngữ -->
            <div class="language-dropdown">
               <a href=""></a>
            </div>
        </div>
        <div class="language-switcher">
            <!-- Biểu tượng địa cầu -->
            <i class="fa-solid fa-earth-americas fa-xl" ></i>
            <!-- Danh sách ngôn ngữ -->
            <div class="language-dropdown">
                <button onclick="changeLanguage('en')">English</button>
                <button onclick="changeLanguage('vi')">Tiếng Việt</button>
                <button onclick="changeLanguage('jp')">日本語</button>
            </div>
        </div>
          <?php 
                  if(isset($_SESSION['username'])){
                      echo 
                      '<li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Xin chào, ' . htmlspecialchars($_SESSION['username']) . '</a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="viewlichkham.php">Thông tin lịch khám</a></li>
                              <li><a class="dropdown-item" href="change_inf.php">Cập nhật thông tin</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="changepass.php">Đổi mật khẩu</a></li>
                              <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                          </ul>
                      </li>';
                  } 
                  else {
                      echo 
                      '<li class="nav-item">
                          <a class="nav-link" href="login.php">Login</a>
                      </li>';
                  }

                  ?>
        
         
    </nav>
</div>
</div>