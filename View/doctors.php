<?php
  session_start();
?>
<link rel="stylesheet" href="../CSS/css/all.css">
    <!-- Trước khi đóng </body> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   <link rel="stylesheet" href="../CSS/WebSucKhoe.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
 *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        #wrapper{
            position: fixed;
            left:0;
            right: 0;
            z-index: 1000;
        }
        .header{
            background-color:#fff;
        }
        .container{
            max-width: 1500px;
            margin: 0 auto;
        }
        nav{
            display: flex;
            justify-content:space-around;
        }
        #main-menu{
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            font-size: 20px;
        }
        #main-menu li{
            position: relative;
            display: inline-block;
        }
        #main-menu li a{
            color:#333;
            display: block;
            text-decoration: none;
            padding: 18px 20px;
        }
        #main-menu ul.sub-menu{
            position: absolute;
            background: #ffffffab;
            padding: 15px 0px;
            list-style: none;
            width: 200px;
            border:1px solid #333;
            display: none;
        }
        #main-menu li:hover>ul.sub-menu{
            display: block;
        }
        #main-menu ul.sub-menu a{
            padding: 8px 15px;
            border-bottom: 1px solid #8d8a8a;
            left:0;
        }
        #main-menu ul.sub-menu li a{
            color:#333;
        }
        #main-menu ul.sub-menu li:hover>a{
            border-bottom: 1px solid #474746;
            box-shadow: rgba(148, 241, 120, 0.4) -5px 5px, rgba(148, 184, 66, 0.3) -10px 10px;
            border-radius: 10px;
        }
        #main-menu ul.sub-menu li:last-child a{
            border-bottom:none;
        }
        #main-menu>li>a{
            position: relative;
        }
        #main-menu>li>a::before{
            content: "";
            height: 4px;
            width: 0px;
            background: rgb(81, 233, 64);
            position: absolute;
            bottom: 0px;
            transition: 0.25s cubic-bezier(0.075, 0.82, 0.165, 1);
        }
        #main-menu>li:hover>a::before{
            width: 100%;
            left: 0px;
        }
        #main-menu>li.has-child::after{
            font-family:"Font Awesome 5 Free"; 
            font-weight:600; 
            content:"\f107";
            color: #333;
            position: absolute;
            top:0px;
            right: 0px;
            padding: 18px 0px;
        }
        #main-menu .sub-menu>li.has-child::after{
            font-family:"Font Awesome 5 Free";
            font-weight:600; 
            content:"\f105";
            color: #333;
            position: absolute;
            top:0px;
            right: 10px;
            padding: 8px 0px;
        }
        #main-menu .sub-menu>li.has-child :hover::after{
            color:rgba(255, 255, 255, 0.61);
        }
        .language-switcher {
            position: relative;
            display: inline-block;
            padding-top: 20px;
            margin-left: 15px;
        }

        .language-icon {
            font-size: 30px; /* Kích thước biểu tượng địa cầu */
            cursor: pointer;
            
        }

        .language-dropdown {
            display: none;
            position: absolute;
            top: 55px;
            left: 13.5px;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
            width: 120px; /* Chiều rộng của dropdown */
        }

        .language-dropdown button {
            color: black;
            padding: 10px; /* Điều chỉnh padding */
            text-decoration: none;
            display: flex; /* Sử dụng flexbox */
            justify-content: center; /* Căn giữa theo chiều ngang */
            align-items: center; /* Căn giữa theo chiều dọc */
            font-size: 16px; /* Điều chỉnh kích thước chữ */
            text-align: center; /* Căn giữa chữ theo chiều ngang */
            width: 100%; /* Chiều rộng của từng phần tử */
            height: 40px; /* Chiều cao cố định cho từng nút */
            box-sizing: border-box; /* Đảm bảo padding không ảnh hưởng đến chiều rộng */
            border: 1px solid black; /* Thêm viền đen (như trong hình) */
        }

        .language-dropdown a:hover {
            background-color: #f1f1f1;
        }

        .language-switcher:hover .language-dropdown {
            display: block;
        }
       
.login-button {
    display: inline-block;
    padding: 12px 25px;
    background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient màu sắc */
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng mờ */
    transition: all 0.3s ease;
    font-size: 16px;
    text-align: center;
}
.login-button:hover {
    background: linear-gradient(135deg, #2575fc, #92d67d); 
    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.3); 
    transform: scale(1.05); 
}
.services-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #f9f9f9;
        }
        .services-header h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        .services-header p {
            font-size: 1.2rem;
            color: #666;
        }
        .services-menu {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
        .service-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .service-icon {
            font-size: 3rem;
            color: #6a11cb;
            margin-bottom: 15px;
        }
        .service-content h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        .service-content p {
            font-size: 1rem;
            color: #666;
        }
        .video-container {
            margin-top: 40px;
            text-align: center;
        }
        #videoPlayer {
            width: 50%;
            max-width: 350px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .slider {
        position: relative;
        max-width: 100%;
        margin: 40px auto 0 auto;
        overflow: hidden;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(37, 117, 252, 0.08);
        min-height: 350px;
}
.slide {
        display: none;
        position: relative;
        width: 100%;
        height: 400px;
        animation: fadeIn 1s;
}
.slide.active {
        display: block;
}
.slide img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 18px;
}
.text-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        text-align: center;
        background: rgba(37, 117, 252, 0.25);
        padding: 30px 40px;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(81, 233, 64, 0.10);
}
.text-overlay h1 {
        font-size: 2.2rem;
        margin-bottom: 18px;
        font-weight: bold;
        text-shadow: 0 2px 8px rgba(0,0,0,0.18);
}
.text-overlay p {
        font-size: 1.25rem;
        font-weight: 500;
        text-shadow: 0 1px 4px rgba(0,0,0,0.12);
}
.highlight {
        color:rgba(123, 228, 114, 0.86);
        font-weight: bold;
}
.prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: 48px;
        height: 48px;
        margin-top: -24px;
        color: #fff;
        font-weight: bold;
        font-size: 2.2rem;
        border-radius: 50%;
        background: rgba(37, 117, 252, 0.45);
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
}
.prev:hover, .next:hover {
        background: rgba(51, 150, 216, 0.7);
}
.prev {
        left: 24px;
}
.next {
        right: 24px;
}
@media (max-width: 700px) {
        .slide, .slide img {
                height: 220px;
        }
        .text-overlay {
                padding: 12px 10px;
                font-size: 1rem;
        }
        .text-overlay h1 {
                font-size: 1.1rem;
        }
        .prev, .next {
                width: 36px;
                height: 36px;
                font-size: 1.3rem;
                margin-top: -18px;
                left: 8px;
                right: 8px;
        }
}
@keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
}
 #comment {
        background: #f5f7fa;
        padding: 50px 0 30px 0;
    }
    #comment h2 {
        font-size: 2.2rem;
        color: #2575fc;
        font-weight: bold;
        margin-bottom: 40px;
        letter-spacing: 1px;
        text-transform: uppercase;
    }
    #comment-body {
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        height: 380px;
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 6px 32px rgba(81, 233, 64, 0.08), 0 1.5px 6px rgba(37, 117, 252, 0.06);
        position: relative;
    }
    .prev_1, .next_1 {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf0fb;
        border-radius: 50%;
        transition: background 0.2s;
        margin: 0 10px;
        box-shadow: 0 2px 8px rgba(37, 117, 252, 0.08);
        z-index: 2;
    }
    .prev_1:hover, .next_1:hover {
        background: #2575fc;
    }
    .prev_1 img, .next_1 img {
        width: 22px;
        height: 22px;
        filter: grayscale(0.5);
        transition: filter 0.2s;
    }
    .prev_1:hover img, .next_1:hover img {
        filter: brightness(0) invert(1);
    }
    #list-comment {
        list-style: none;
        margin: 0;
        padding: 0;
        transition: transform 0.4s cubic-bezier(.4,2.08,.55,.44);
        width: 500px;
        min-width: 320px;
        max-width: 500px;
    }
    #list-comment .item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 0;
        height: 380px;
        padding: 30px 30px 20px 30px;
        box-sizing: border-box;
        text-align: center;
    }
    .avatar img {
        border-radius: 50%;
        width: 80px;
        height: 80px;
        object-fit: cover;
        border: 3px solid #2575fc;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(37, 117, 252, 0.12);
    }
    .stars {
        margin-bottom: 12px;
    }
    .stars img {
        width: 22px;
        height: 22px;
        margin: 0 1.5px;
        filter: drop-shadow(0 1px 2px rgba(81,233,64,0.15));
    }
    .name {
        font-weight: 600;
        color: #2575fc;
        font-size: 1.15rem;
        margin-bottom: 10px;
        letter-spacing: 0.5px;
    }
    .text-cmt p {
        color: #444;
        font-size: 1.08rem;
        font-style: italic;
        background: #f5f7fa;
        border-radius: 12px;
        padding: 18px 20px;
        margin: 0;
        box-shadow: 0 1px 4px rgba(37, 117, 252, 0.04);
    }
    @media (max-width: 600px) {
        #comment-body {
            flex-direction: column;
            height: 420px;
            max-width: 98vw;
        }
        #list-comment {
            width: 90vw;
            min-width: 0;
            max-width: 98vw;
        }
        .item {
            padding: 20px 5vw 10px 5vw;
        }
        .prev_1, .next_1 {
            margin: 10px 0;
        }
    }
    </style>

<?php
if (!isset($_SESSION['username'])) {
  echo "<script>alert('Bạn chưa đăng nhập'); window.location='../View/login.php'</script>";
}
?>
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
                     <li><a id="expert3"href="formdatlich.php">Đặt hẹn</a></li>
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
            <i class="fa-solid fa-earth-americas fa-xl" style="vertical-align: middle; line-height: 1;"></i>
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
                              <li><a class="dropdown-item" href="lich_su_khao_sat.php">Lịch sử test</a></li>
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
<section class="doctor-section py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); min-height:100vh;">
  <div class="container">
    <div class="heading_container text-center mb-5">
      <hr style="width:60px; border:2px solid #4CAF50; margin:auto;">
      <h2 class="fw-bold mt-3" style="color:#2d3a4b;">Danh sách bác sĩ</h2>
    </div>
    <div class="row g-4">
      <?php
      include ('../Module/control_doctor.php'); 
      $get_data = new doctors();
      $select = $get_data->select();
      foreach($select as $doctors){
      ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card doctor-card h-100 shadow-sm border-0 rounded-4">
          <div class="doctor-img-wrapper position-relative">
            <img src="../Media/<?php echo $doctors['Hinh']; ?>" alt="Doctor Image" class="card-img-top rounded-top-4" style="height:220px; object-fit:cover;">
            <span class="doctor-badge position-absolute top-0 end-0 m-2 px-3 py-1 bg-success text-white rounded-pill small" style="font-size:13px;">Bác sĩ</span>
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold mb-2" style="color:#1a2b3c;"><?php echo $doctors['Ten']; ?></h5>
            <p class="card-text text-muted mb-3" style="font-size:15px; min-height:48px;"><?php echo $doctors['description']; ?></p>
            <div class="mt-auto">
              <a href="Chitiet.php?id=<?php echo $doctors['id']; ?>" class="btn btn-outline-primary w-100 mb-2">
                <i class="fas fa-info-circle me-1"></i> Xem chi tiết
              </a>
              <button class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalDatLich" data-bs-bacsi="<?php echo $doctors['Ten']; ?>">
                <i class="fas fa-calendar-check me-1"></i> Đặt lịch ngay
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>

<!-- Modal popup đặt lịch -->
<div class="modal fade" id="modalDatLich" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="formdatlich.php">
      <div class="modal-header">
        <h5 class="modal-title">Đặt lịch khám</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label class="form-label">Bác sĩ</label>
          <input type="text" class="form-control" id="modalTenBacSi" name="bacsi" readonly>
        </div>
        <div class="mb-3">
          <label>Ngày khám</label>
          <input type="date" class="form-control" name="ngay" required>
        </div>
        <div class="mb-3">
          <label>Giờ khám</label>
          <input type="time" class="form-control" name="gio" required>
        </div>
        <div class="mb-3">
          <label>Họ tên</label>
          <input type="text" class="form-control" name="hoten" required>
        </div>
        <div class="mb-3">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label>Số điện thoại</label>
          <input type="tel" class="form-control" name="sdt" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
      </div>
    </form>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var modal = document.getElementById('modalDatLich');
  modal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var bacsi = button.getAttribute('data-bs-bacsi');
    modal.querySelector('#modalTenBacSi').value = bacsi;
  });
});
</script>

<style>
.doctor-card {
  transition: transform 0.2s, box-shadow 0.2s;
  background: #fff;
}
.doctor-card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 8px 24px rgba(44, 62, 80, 0.13);
}
.doctor-img-wrapper {
  overflow: hidden;
  border-top-left-radius: 1rem;
  border-top-right-radius: 1rem;
}
.doctor-img-wrapper img {
  transition: transform 0.3s;
}
.doctor-card:hover .doctor-img-wrapper img {
  transform: scale(1.07);
}
.doctor-badge {
  box-shadow: 0 2px 8px rgba(76,175,80,0.15);
}
.card-title {
  font-size: 1.15rem;
}
.btn-outline-primary,
.btn-success {
  border-radius: 0.5rem;
}
@media (max-width: 575.98px) {
  .doctor-card {
    margin-bottom: 1.5rem;
  }
}
</style>
