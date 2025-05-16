
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<body>
<!-- Thanh điều hướng cố định đầu trang -->
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
  <script>
            const translations =
            {
              "en": {
                  "title": "Home",
                  "services": "Services",
                  "service1": "Telemedicine",
                  "service2": "Psychotherapy Consultation",
                  "service3": "Personal Doctor",
                  "service4": "Health Check",
                  
                  "expert": "Expert",
                  "expert1": "List of Experts",
                  "expert2": "Direct Consultation",
                  "expert3": "Book an Appointment",
                  "community" : "Community",
                  "forum" : "Forum",
                  "support": "Support",
                  "about_us": "About Us",
                  "mission": "Mission",
                  "vision": "Vision",
                  "sologan_1": "Do you want to take care of yourself?",
                  "txt_1":"Let <span class='highlight'>Health Care</span> help you",
                  "sologan_2":"Do you need advice from experts?",
                  "txt_2":"Let <span class='highlight'>Health Care</span> help you",
                  "sologan_3":"Are you feeling pressured, confused, self-conscious?",
                  "txt_3":"Let <span class='highlight'>Health Care</span> help you",
                  
                  "remote":"Service",
                  "ND1":"Simple approach, effective and economical treatment",
                  "doctor":"Private Doctor",
                  "cnt":"Let people love you",
                  "remote_2":"Remote examination",
                  "cnt_2":" The key is to examine carefully!",
                  "news":"Edu Health",
                  "cnt_3":"Edu Talk, Video training",
                  "know":"Health GPT",
                  "cnt_4":"Chat 24/7 with AI doctor",
                  "feedback":"Feedback",
                  "cmt_1":"Thank you very much doctor. Even though it was only a remote medical examination, the doctor still gave me a feeling of safety from an enthusiastic and very caring doctor. Thank you wellcare because thanks to this remote medical examination channel, patients in remote provinces like us are very confused and don't know where to get medical examination, don't know where to find a place that we can trust absolutely, Health Care has helped us do that. that. Thank you very much Health Care.",
                  "cmt_2":"The support team is very good and timely. The doctor is enthusiastic, skilled, guides and answers patients' questions and concerns, helping patients feel secure for treatment.",
                  "follow":"Follow us: ",
                  "mes":"<span style='color: rgb(11, 196, 134)'> TRUSTED health partner</span>",
                  "mes_1":"We help you maintain a healthy lifestyle, and when you need medical consultation, we connect you with leading specialists via voice and video calls.",
                  "patients":"For patients",
                  "thao":"Services",
                  "thuong":"Guide",
                  "phuong":"Blog",
                  "ngoc":"Membership program",
                  "ques":"Question",
                  "sup":"Support",
                  "contact":"Contact",
                  "privacy":"Privacy",
                  "in4":"Information",
                  "school":"Phuong Dong Univerysity, Minh Khai, Hai Ba Trung, Ha Noi",
                  "email":"tranducson2134@gmail.com",
                  "tele_1":"+ 84 559 174 159",
                  "tele_2":"+84 234 567 89",
                  "txt_4":"Having a personal doctor for someone to love - is no longer a luxury for Vietnamese families",
                },
                "vi": {
                  "title": "Trang chủ",
                  "services": "Dịch vụ",
                  "service1": "Bác sĩ riêng",
                  "service2": "Tư vấn trị liệu tâm lý",
                  "service3": "Khám từ xa",
                  "service4": "Kiểm tra tâm lý",
                  
                  "expert": "Chuyên gia",
                  "expert1": "Danh sách",
                  "expert2": "Chuyên gia tư vấn trực tiếp",
                  "expert3": "Đặt hẹn",
                  "community":"Cộng đồng",
                  "forum": "Diễn đàn",
                  "support": "Hỗ trợ",
                  "about_us": "Về chúng tôi",
                  "mission": "Sứ mệnh",
                  "vision": "Tầm nhìn",
                  "sologan_1":"Bạn muốn tự chăm sóc bản thân",
                  "txt_1":"Để <span class='highlight'>Health Care</span> giúp bạn",
                  "sologan_2":"Bạn cần lời khuyên từ chuyên gia",
                  "txt_2":"Để <span class='highlight'>Health Care</span> giúp bạn",
                  "sologan_3":"Bạn cảm thấy áp lực, lo lắng, tự ti ",
                  "txt_3":"Để <span class='highlight'>Health Care</span> giúp bạn",
                  "remote":"Dịch vụ ",
                  "ND1":"Tiếp cận đơn giản, điều trị hiệu quả, chi phí tiết kiệm",
                  "doctor":"Bác sĩ riêng",
                  "cnt":"Cho người ta thương yêu",
                  "remote_2":"Khám từ xa",
                  "cnt_2":"Khám gần khám xa, cốt là khám kỹ!",
                  "news":"Edu Health",
                  "cnt_3":"Hỏi kiến thức, Healthtalk, Video trainings",
                  "know":"HealthGPT",
                  "cnt_4":"Chat 24/7 với bác sĩ AI",
                  "feedback":"Đánh giá của khách hàng",
                  "cmt_1":"Em cảm ơn bác sĩ rất nhiều. Dù chỉ là khám bệnh từ xa nhưng bác sĩ vẫn cho em cảm giác an toàn từ 1 vị bác sĩ nhiệt tình và rất có tâm. Cảm ơn Health Care vì nhờ kênh khám bệnh từ xa này mà những người bệnh ở tỉnh xa như tụi em đang rất hoang mang ko biết khám bệnh ở đâu, ko biết tìm đâu 1 nơi mình tin tưởng tuyệt đối thì Health Care đã giúp e làm chuyện đó. Cảm ơn Health Care rất nhiều.",
                  "cmt_2":"Đội ngũ hỗ trợ rất tốt, kịp thời. Bác sĩ nhiệt tình, giỏi chuyên môn, hướng dẫn và giải đáp được thắc mắc, lo âu của bệnh nhân, giúp người bệnh an tâm để điều trị.",
                  "cmt_3":"Anh chị em nghiệp vụ của Health Care thực sự chu đáo, tận tình đối với khách hàng- những bệnh nhân và người nhà. Cảm ơn các anh chị. Và mong hệ thống (Web) của Health Care sớm hoàn chỉnh và liên tục được cập nhật để ngày cảng thuận lợi, hiện đại hơn. Bác sĩ khám, tư vấn rất tận tình, rõ ràng, chuyên nghiệp, tác động tích cực đến người bệnh. Cảm ơn đội ngũ bác sĩ nhiều !",
                  "follow":"Theo dõi chúng tôi: ",
                  "mes":"<span style='color: rgb(11, 196, 134)'> Đối tác sức khỏe TIN CẬY</span>",
                  "mes_1":"Chúng tôi giúp bạn duy trì một lối sống lành mạnh, và khi bạn cần tham vấn y tế, chúng tôi kết nối bạn với những bác sĩ chuyên khoa hàng đầu qua gọi thoại và gọi video.",
                  "patients":"Dành cho bệnh nhân",
                  "thao":"Dịch vụ",
                  "thuong":"Cẩm nang",
                  "phuong":"Blog sống khỏe",
                  "ngoc":"Chương trình thành viên",
                  "ques":"Câu hỏi",
                  "sup":"Hỗ trợ",
                  "contact":"Liên hệ",
                  "privacy":"Chính sách bảo mật",
                  "in4":"Thông tin",
                  "school":"Đại học Phương Đông (CS2), Minh Khai, Hai Bà Trưng, Hà Nội",
                  "email":"tranducson2134@gmail.com",
                  "tele_1":"+ 84 559 174 159",
                  "tele_2":"+84 234 567 89",

                },
                "jp":{
                     "title": "ホームページ",
                     "services": "サービス",
                     "service1": "遠隔診療",
                     "service2": "心理カウンセリング",
                     "service3": "プライベートドクター",
                     "service4": "健康チェック",
                     "expert": "専門家",
                     "expert1": "リスト",
                     "expert2": "直接相談専門家",
                     "expert3": "予約",
                     "community": "コミュニティ",
                     "forum": "フォーラム",
                     "support": "サポート",
                     "about_us": "私たちについて",
                     "mission": "ミッション",
                     "vision": "ビジョン",
                     "sologan_1":"自分のことは大事にしたい",
                     "txt_1":" <span class='highlight'>ヘルスケア</span>が お手伝いします",
                     "sologan_2":"専門家からのアドバイスが必要ですか",
                     "txt_2":"<span class='highlight'>ヘルスケア</span>が お手伝いします",
                     "sologan_3":"プレッシャー、不安、自意識過剰を感じている",
                     "txt_3":"<span class='highlight'>ヘルスケア</span>が お手伝いします",
                     "ND_txt_1":"げんじょう",
                     "ND_txt_2":"方法",
                     "ND_txt_3":"もっと見る",
                     "remote":"サービス",
                     "ND1":"シンプルなアクセス、効果的な治療、コスト削減",
                     "doctor":"開業医",
                     "cnt":"人々にあなたを愛してもらいましょう",
                     "remote_2":"遠隔診察",
                     "cnt_2":"近くも遠くもじっくり観察するのがポイント!",
                     "news":"エデュヘルス",
                     "cnt_3":"知識を求める、Healthtalk、ビデオトレーニング",
                     "know":"健康GPT",
                     "cnt_4":"AI 医師と 24 時間 365 日チャットできます",
                     "feedback":"フィードバック",
                     "cmt_1":"医師、本当にありがとうございました。遠隔診療でしたが、熱心でとても親身な先生で安心感がありました。ウェルケアに感謝します。なぜなら、この遠隔診療チャネルのおかげで、私たちのような遠隔地の患者は非常に混乱しており、どこで診察を受ければよいのか、絶対に信頼できる場所をどこで見つけられるのかもわかりません。それを私たちが助けてくれました。ヘルスケアさん、本当にありがとうございました。",
                     "cmt_2":"サポートチームは非常に優秀でタイムリーです。医師は熱心で熟練しており、患者の質問や懸念に答えて指導し、患者が安心して治療を受けられるようサポートします。",
                     "cmt_3":"Health Care のスタッフは真に思いやりがあり、患者やその家族などの顧客に対して献身的に取り組んでいます。兄弟姉妹の皆さん、ありがとう。そして私は、Health Care の (Web) システムがすぐに完成し、より便利で現代的なものになるよう継続的に更新されることを願っています。医師は非常に熱心に、わかりやすく、専門的に診察とアドバイスを行っており、患者に良い影響を与えます。医療チームの皆様、本当にありがとうございました！",
                     "follow":"私たちに従ってください ",
                     "mes":"<span style='color: rgb(11, 196, 134)'> 信頼できる健康パートナー</span>",
                     "mes_1":"私たちは、お客様の健康的なライフスタイルの維持をお手伝いし、医療相談が必要な場合には、音声通話やビデオ通話を通じて一流の専門家におつなぎします。",
                     "patients":"患者様向け",
                     "thao":"サービス",
                     "thuong":"ハンドブック",
                     "phuong":"健康的な生活のブログ",
                     "ngoc":"会員プログラム",
                     "ques":"質問",
                     "sup":"サポート",
                     "contact":"連絡",
                     "privacy":"プライバシーポリシー",
                     "in4":"情報",
                     "school":"フォンドン大学,ミンカイ、ハイバチュン、ハノイ",
                     "email":"tranducson2134@gmail.com",
                     "tele_1":"+ 84 559 174 159",
                     "tele_2":"+84 234 567 89",
                 }
                
              };
          
              // Hàm để thay đổi ngôn ngữ
              function changeLanguage(lang) {
                
           document.getElementById("title").querySelector('a').innerText = translations[lang].title;
           document.getElementById("services").querySelector('a').innerText = translations[lang].services;
           document.getElementById("service1").innerText = translations[lang].service1;
           document.getElementById("service2").innerText = translations[lang].service2;
           document.getElementById("service3").innerText = translations[lang].service3;
           document.getElementById("service4").innerText = translations[lang].service4;
          
           document.getElementById("expert").querySelector('a').innerText =translations[lang].expert;
           document.getElementById("expert1").innerText = translations[lang].expert1;
           document.getElementById("expert2").innerText = translations[lang].expert2;
           document.getElementById("expert3").innerText = translations[lang].expert3;
           document.getElementById("community").querySelector('a').innerText = translations[lang].community
           document.getElementById("forum").innerText = translations[lang].forum;
           document.getElementById("support").innerText= translations[lang].support;
           document.getElementById("about_us").querySelector('a').innerText =translations[lang].about_us;
           document.getElementById("mission").innerText =translations[lang].mission;
           document.getElementById("vision").innerText =translations[lang].vision;
           document.getElementById("sologan_1").innerText=translations[lang].sologan_1;
           document.getElementById("txt_1").innerHTML=translations[lang].txt_1;
           document.getElementById("sologan_2").innerText=translations[lang].sologan_2;
           document.getElementById("txt_2").innerHTML=translations[lang].txt_2;
           document.getElementById("sologan_3").innerText=translations[lang].sologan_3;
           document.getElementById("txt_3").innerHTML=translations[lang].txt_3;
           
           document.getElementById("remote").innerText=translations[lang].remote;
           document.getElementById("ND1").innerText=translations[lang].ND1;
           document.getElementById("doctor").innerText=translations[lang].doctor;
           document.getElementById("cnt").innerText=translations[lang].cnt;
           document.getElementById("remote_2").innerText=translations[lang].remote_2;
           document.getElementById("cnt_2").innerText=translations[lang].cnt_2;
           document.getElementById("news").innerText=translations[lang].news;
           document.getElementById("cnt_3").innerText=translations[lang].cnt_3;
           document.getElementById("know").innerText=translations[lang].know;
           document.getElementById("cnt_4").innerText=translations[lang].cnt_4;
           document.getElementById("feedback").innerText=translations[lang].feedback;
           document.getElementById("cmt_1").innerText=translations[lang].cmt_1;
           document.getElementById("cmt_2").innerText=translations[lang].cmt_2;
           document.getElementById("cmt_3").innerText=translations[lang].cmt_3;
           document.getElementById("follow").innerText=translations[lang].follow;
           document.getElementById("mes").innerHTML=translations[lang].mes;
           document.getElementById("mes_1").innerText=translations[lang].mes_1;
           document.getElementById("patients").innerText=translations[lang].patients;
           document.getElementById("thao").innerText=translations[lang].thao;
           document.getElementById("thuong").innerText=translations[lang].thuong;
           document.getElementById("phuong").innerText=translations[lang].phuong;
           document.getElementById("ngoc").innerText=translations[lang].ngoc;
           document.getElementById("sup").innerText=translations[lang].sup;
           document.getElementById("ques").innerText=translations[lang].ques;
           document.getElementById("contact").innerText=translations[lang].contact;
           document.getElementById("privacy").innerText=translations[lang].privacy;
           document.getElementById("in4").innerText=translations[lang].in4;
           document.getElementById("school").innerText=translations[lang].school;
           document.getElementById("email").innerText=translations[lang].email;
           document.getElementById("tele_1").innerText=translations[lang].tele_1;
           document.getElementById("tele_2").innerText=translations[lang].tele_2;
           document.getElementById("txt_4").innerText=translations[lang].txt_4;
        }
            window.onload =function(){
                let savedLang =localStorage.getItem('language');
                if(savedLang){
                    changeLanguage(savedLang);
                }
            };

        </script>
      </ul>
    </nav>
  </div>
</div>
    
<script>
    $(document).ready(function(){
        // tìm tất cả các li có sub-menu và thêm vào nó class has-child
        $('.sub-menu').parent('li').addClass('has-child')
    });
</script>
<div class="slider">
    <!-- First Slide -->
    <div class="slide active">
            <img src="../Media/tramcam_1.jpg" alt="Slide 1">
            <div class="text-overlay">
                    <h1 id="sologan_3">Bạn đang cảm thấy áp lực, bối rối, tự ti ? </h1>
                    <p id="txt_3">Để <span class="highlight">Health Care</span> giúp bạn</p>
            </div>
    </div>
    <!-- Second Slide -->
    <div class="slide">
            <img src="../Media/anh_2.webp" alt="Slide 2">
            <div class="text-overlay">
                    <h1 id="sologan_2">Bạn cần những lời khuyên từ chuyên gia ?</h1>
                    <p id="txt_2">Để <span class="highlight">Health Care</span> giúp bạn</p>
            </div>
    </div>
    <!-- Third Slide -->
    <div class="slide">
        <img src="../Media/practice.webp" alt="Slide 3">
        <div class="text-overlay">
                <h1 id="sologan_1">Bạn muốn tự chăm sóc cho bản thân ? </h1>
                <p id="txt_1">Để <span class="highlight">Health Care</span> giúp bạn</p>
        </div>
    </div>
    <!-- Navigation Arrows -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>



<script>
let slideIndex = 0;
let slides = document.getElementsByClassName("slide");
let autoSlideTimeout;

function showSlides(n) {
        if (n >= slides.length) { slideIndex = 0; }
        if (n < 0) { slideIndex = slides.length - 1; }
        for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove('active');
        }
        slides[slideIndex].classList.add('active');
}

function plusSlides(n) {
        slideIndex += n;
        showSlides(slideIndex);
        resetAutoSlide();
}

function autoSlide() {
        slideIndex++;
        showSlides(slideIndex);
        autoSlideTimeout = setTimeout(autoSlide, 5000);
}

function resetAutoSlide() {
        clearTimeout(autoSlideTimeout);
        autoSlideTimeout = setTimeout(autoSlide, 5000);
}

// Initialize slider
document.addEventListener("DOMContentLoaded", function() {
        showSlides(slideIndex);
        autoSlideTimeout = setTimeout(autoSlide, 5000);
        // Pause on hover
        document.querySelector('.slider').addEventListener('mouseenter', function() {
                clearTimeout(autoSlideTimeout);
        });
        document.querySelector('.slider').addEventListener('mouseleave', function() {
                resetAutoSlide();
        });
});
</script>
    <div class="services-section">
        <div class="services-header">
            <h2 id="remote">Dịch vụ</h2>
            <p id="ND1">Tiếp cận đơn giản, điều trị hiệu quả, tiết kiệm</p>
        </div>
        <div class="services-menu">
            <div class="service-card" data-video="../Media/original.mp4">
                <div class="service-icon">
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="service-content">
                    <h3 id="doctor">Bác sĩ riêng</h3>
                    <p id="cnt">Cho người ta thương yêu</p>
                </div>
            </div>
            <div class="service-card" data-video="../Media/original-2.mp4">
                <div class="service-icon">
                    <i class="fas fa-video"></i>
                </div>
                <div class="service-content">
                    <h3 id="remote_2">Khám từ xa</h3>
                    <p id="cnt_2">Khám gần khám xa, cốt là khám kỹ!</p>
                </div>
            </div>
            <div class="service-card" data-video="../Media/original-3.mp4">
                <div class="service-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="service-content">
                    <h3 id="news">Edu Health</h3>
                    <p id="cnt_3">Hỏi kiến thức, Healthtalk, Video trainings</p>
                </div>
            </div>
            <div class="service-card" data-video="../Media/original-4.mp4">
                <div class="service-icon">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="service-content">
                    <h3 id="know">HealthGPT</h3>
                    <p id="cnt_4">Chat 24/7 với bác sĩ AI</p>
                </div>
            </div>
        </div>
        <div class="video-container">
            <video id="videoPlayer" controls autoplay muted>
                <source id="videoSource" src="../Media/original.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>

    <style>
<<<<<<< HEAD
        
=======
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
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
>>>>>>> 1f570d2b52d482a12e3e7c7efdda81aa0b942b08
    </style>

    <script>
        const serviceCards = document.querySelectorAll('.service-card');

        serviceCards.forEach(card => {
            card.addEventListener('click', function () {
                serviceCards.forEach(c => c.classList.remove('selected'));
                this.classList.add('selected');

                const videoSrc = this.getAttribute('data-video');
                changeVideo(videoSrc);
            });
        });

        function changeVideo(videoSrc) {
            const videoPlayer = document.getElementById("videoPlayer");
            const videoSource = document.getElementById("videoSource");
            videoSource.src = videoSrc;
            videoPlayer.load();
            videoPlayer.play();
        }
    </script>
    
    <!-- <div class="video-container" style="margin:auto">
        <video controls autoplay muted>
            <source src="../Media/original.mp4"> 
        </video>
    </div> -->
<!-- Customer Feedback Section -->


<div id="comment">
    <h2 id="feedback" style ="weight: 80px">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h2>
    <div id="comment-body">
        <div class="prev_1" title="Trước">
            <img src="../Media/up.png" alt="Lên">
        </div>
        <ul id="list-comment">
            <li class="item">
                <div class="avatar">
                    <img src="../Media/avatar_4.webp" alt="Nguyễn Đình Vũ">
                </div>
                <div class="stars">
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                </div>
                <div class="name">Nguyễn Đình Vũ</div>
                <div class="text-cmt">
                    <p>Cảm ơn bác sĩ rất nhiều. Dù chỉ là khám từ xa nhưng cảm giác an tâm, nhiệt tình và có tâm lắm ạ.</p>
                </div>
            </li>
            <li class="item">
                <div class="avatar">
                    <img src="../Media/avatar_1.png" alt="Đỗ Khánh Trâm">
                </div>
                <div class="stars">
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                </div>
                <div class="name">Đỗ Khánh Trâm</div>
                <div class="text-cmt">
                    <p>Đội ngũ hỗ trợ tốt, bác sĩ nhiệt tình, giải đáp thắc mắc rõ ràng và giúp người bệnh an tâm điều trị.</p>
                </div>
            </li>
            <li class="item">
                <div class="avatar">
                    <img src="../Media/avatar_4.webp" alt="Trần Ngọc Sơn">
                </div>
                <div class="stars">
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                    <span><img src="../Media/star.png" alt="*"></span>
                </div>
                <div class="name">Trần Ngọc Sơn</div>
                <div class="text-cmt">
                    <p>Đội ngũ Health Care chu đáo, tận tâm. Mong hệ thống ngày càng hiện đại hơn, bác sĩ tư vấn rất rõ ràng và chuyên nghiệp.</p>
                </div>
            </li>
        </ul>
        <div class="next_1" title="Sau">
            <img src="../Media/down.png" alt="Xuống">
        </div>
    </div>
</div>

<script>
    const next = document.querySelector('.next_1');
    const prev = document.querySelector('.prev_1');
    const comment = document.querySelector('#list-comment');
    const commentItems = document.querySelectorAll('#list-comment .item');

    const itemHeight = 380; // height of .item in px
    let currentIndex = 0;
    const maxIndex = commentItems.length - 1;

    function updateCommentPosition() {
        comment.style.transform = `translateY(-${currentIndex * itemHeight}px)`;
    }

    next.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCommentPosition();
        }
    });

    prev.addEventListener('click', function (e) {
        e.preventDefault();
        if (currentIndex > 0) {
            currentIndex--;
            updateCommentPosition();
        }
    });

    // Optional: auto scroll every 6s
    let autoScroll = setInterval(() => {
        if (currentIndex < maxIndex) {
            currentIndex++;
        } else {
            currentIndex = 0;
        }
        updateCommentPosition();
    }, 6000);

    // Pause auto scroll on hover
    document.getElementById('comment-body').addEventListener('mouseenter', () => clearInterval(autoScroll));
    document.getElementById('comment-body').addEventListener('mouseleave', () => {
        autoScroll = setInterval(() => {
            if (currentIndex < maxIndex) {
                currentIndex++;
            } else {
                currentIndex = 0;
            }
            updateCommentPosition();
        }, 6000);
    });
</script>
     <!-- Footer -->
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