<link rel="stylesheet" href="../CSS/all.css">
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


    
</style>
<div id="wrapper">
        <div class="header">
           <nav class="container">
            <a href="Web_Suc_Khoe.html" id="logo" style="text-decoration: none;color:#474746;">
                <img src="../Media/logo.svg" alt="" srcset="" style="width: 15%;"> HEALTH CARE
                
            </a>
            <ul id="main-menu">
                <li id="title"><a href="Web_Suc_Khoe.html">Trang chủ</a></li>
                <li id="services" class="has-child">
                    <a href="#">Dịch vụ</a>
                    <ul class="sub-menu">
                        <li><a id="service4" href="face_form.html">Kiểm tra tâm lý</a></li>
                        <li><a id="service2" href="Tuvantrilieutamly.html">Tư vấn trị liệu tâm lý</a></li>
                        <li><a id="service3" href="khamtuxa.html">Khám từ xa</a></li>
                        <li><a id="service1" href="Bacsirieng.html">Bác sĩ riêng</a></li>
                        
                    </ul>
</li>
            
                <li id="expert">
                 <a href="">Chuyên gia</a>
                    <ul class="sub-menu">
                        <li><a id="expert1"href="List.html">Danh sách</a></li>
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
           
             <li>
                <div class="user-img-div" style="padding-left:20px">
                    <img src="assets/img/user.png" class="img-thumbnail" />

                    <div class="inner-text">
                        <?php
               
                if(!empty($_SESSION['username']))
                 {
                     echo "Hello: ".$_SESSION['username']."<br>"."<a class ='nav-link' href= 'login_admin.php'>Logout</a>"."</p>";
                 }
                 else
                  echo "<a class='nav-link' href='login_admin.php'>Login</a>";
          
                     ?>
                    
                </div>

            </li>
        </nav>
        
    </div>