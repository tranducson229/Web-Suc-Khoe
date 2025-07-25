<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Test Đánh Giá Lo Âu - Trầm Cảm - Stress</title>
    <link rel="stylesheet" href="../CSS/WebSucKhoe.css">
    <link rel="stylesheet" href="CSS/fontawesome-free-6.5.2-web/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

</head>
<style>
    
 *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        #wrapper{
            position: relative;
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
    
    body {
        font-family: Arial, sans-serif;
    
    background-color: #f9f9f9;
}
.container_1 {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.header_1 {
    
 
    background-color: #f0f8ff;
}

.header h1 {
    color: #ff7f00;
}
.info {
    display: flex;
    justify-content: space-around;
    padding: 10px 0;
}

.Form a{
  margin: auto;
}
</style>
<body>
    <?php
        include("nav copy.php");
        ?>
    <?php
        
        if(!isset($_SESSION['username'])){
            echo "<script>alert('Bạn chưa đăng nhập')
            window.location='../View/login.php'</script>";
        }
    ?>

    <div class="container_1" >
        <header class="header_1">
            <img src="../Media/web-banner.png" alt="" srcset=""width="760px"height="200px">
        </header>
        <div class="info">
            <div class="questions">13 Câu hỏi trắc nghiệm</div>
            <div class="time">Thời gian ~ 5 phút</div>
        </div>
        <section class="content">
            <p>Bài test (trắc nghiệm) dựa trên nguyên lí của bài test DASS </p>
            <h3>Bài test nhằm mục đích: </h3>
            <ul>
                <li>Tự đánh giá tình trạng Sức khỏe tinh thần cá nhân.</li>
                <li>Dự đoán về Sức khỏe tinh thần và có kế hoạch thăm khám phù hợp.</li>
                <li>Tổng hợp thông tin để thuận tiện khi thăm khám với Bác sĩ/Chuyên gia.</li>
            </ul>
            <h3>Nguyên tắc thực hiện bài test:</h3>
            <p>Hãy đọc mỗi câu hỏi sau và chọn đáp án gần giống nhất với tình trạng mà bạn cảm thấy TRONG 1 TUẦN QUA. Không có câu trả lời đúng hay sai. Và đừng dừng lại quá lâu ở bất kỳ câu nào. </p>
            <h3>Lưu ý:</h3>
            <p>Kết quả bài test này chỉ mang tính chất tham khảo, không có giá trị thay thế chẩn đoán y khoa bởi chuyên gia tâm lý/bác sĩ tâm thần.</p>
        </section>
        <div class="Form">
            <a href="form_khao_sat_tam_ly.php">Start</a>
        </div>
        
    </div>
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social ../Media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <!-- Left -->
          <div class="me-5 d-none d-lg-block">
            <span><p id="follow">Theo dõi chúng tôi qua :</p></span>
          </div>
          <!-- Left -->
      
          <!-- Right -->
          <div>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <!-- Right -->
        </section>
        <!-- Section: Social ../Media -->
      
        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <img src="../Media/logo.svg" alt="" srcset=""width="50px"> Health Care
                </h6>
                <p id="mes">
                 <span style="color: rgb(11, 196, 134);"> Đối tác sức khỏe TIN CẬY</span><br>
                  <P id="mes_1">Chúng tôi giúp bạn duy trì một lối sống lành mạnh, và khi bạn cần tham vấn y tế, chúng tôi kết nối bạn với những bác sĩ chuyên khoa hàng đầu qua gọi thoại và gọi video.</P>
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <p id="patients">Dành cho bệnh nhân</p>
                </h6>
                <p id="thao">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Dịch vụ</span></a>
                </p>
                <p id="thuong">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Cẩm nang</span></a>
                </p>
                <p id="phuong">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Blog sống khỏe</span></a>
                </p>
                <p id="ngoc">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Chương trình thành viên</span></a>
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  <p id="sup">Hỗ trợ</p>
                </h6>
                <p id="ques">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Câu hỏi thường gặp</span></a>
                </p>
                <p id="contact">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Liên hệ</span></a>
                </p>
                <p id="privacy">
                  <a href="#!" class="text-reset" style="text-decoration: none;"><span>Chính sách bảo mật</span></a>
                </p>
                
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4"><p id="in4">Thông tin</p></h6>
                <p id="school"><i class="fas fa-home me-3"></i> Đại học Phương Đông (CS2), Minh Khai, Hai Bà Trưng, Hà Nội </p>
                <p id="email">
                  <i class="fas fa-envelope me-3"></i>
                  tranducson2134@gmail.com
                </p>
                <p id="tele_1"><i class="fas fa-phone me-3"></i> + 84 559 174 159</p>
                <p id="tele_2"><i class="fas fa-print me-3"></i> + 84 234 567 89</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->
      
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2024 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/"><p id="group">Group 5</p></a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
     
</body>
</html>