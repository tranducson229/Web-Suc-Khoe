<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<p>Bạn cần đăng nhập để xem lịch sử khảo sát.</p>";
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");

$username = $_SESSION['username'];
$sql_user = "SELECT uid FROM user WHERE username = ?";
$stmt = $conn->prepare($sql_user);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    echo "Không tìm thấy user.";
    exit;
}
$user_id = $result->fetch_assoc()['uid'];

// Truy xuất lịch sử khảo sát
$sql_kq = "SELECT tong_diem, danh_gia, thoigian FROM khao_sat_tam_ly WHERE user_id = ? ORDER BY thoigian DESC";
$stmt = $conn->prepare($sql_kq);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử khảo sát tâm lý</title>
    <link rel="stylesheet" href="../CSS/css/all.css">
    <!-- Trước khi đóng </body> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   <link rel="stylesheet" href="../CSS/WebSucKhoe.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            padding: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background: #f39c12;
            color: white;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
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
                              <li><a class="dropdown-item" href="viewkqtest.php">Lịch sử test</a></li>
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
    <h2>Lịch sử khảo sát tâm lý</h2>
    <table>
        <thead>
            <tr>
                <th>Thời gian</th>
                <th>Tổng điểm</th>
                <th>Nhận định</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['thoigian']); ?></td>
                    <td><?php echo $row['tong_diem']; ?></td>
                    <td><?php echo htmlspecialchars($row['danh_gia']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>