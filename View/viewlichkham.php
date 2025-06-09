<?php
session_start(); // Bắt đầu session

// Kiểm tra đăng nhập
if (!isset($_SESSION['username'])) {
    echo '<p>Bạn cần đăng nhập để xem lịch khám.</p>';
    exit;
}

$username = $_SESSION['username'];

// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

// Lấy user_id từ username
$sql_user = "SELECT uid FROM user WHERE username = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("s", $username);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows === 0) {
    echo '<p>Không tìm thấy người dùng.</p>';
    exit;
}

$user_row = $result_user->fetch_assoc();
$user_id = $user_row['uid']; // Lấy ID người dùng

// Lấy dữ liệu lịch khám
$sql = "SELECT l.id, l.hoten, l.ngay AS ngaykham, l.gio AS giokham, d.Ten AS bacsi, l.chuyenkhoa
        FROM lichkham l
        LEFT JOIN doctors d ON l.bacsi_id = d.id
        WHERE l.user_id = ?
        ORDER BY l.ngay DESC, l.gio DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Khám</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
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
            </li>
          <li id="about_us">
            <a href="">Về chúng tôi</a>
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
    <div class="container" style="padding-top: 100px;">
        <h1 class="text-center mb-4" style="color: #007bff;">Lịch Khám Của Bạn</h1>
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="table-primary">
                    <tr style="background-color: #e9f7fe; color: #0056b3;">
                        <th>STT</th>
                        <th>Họ Tên</th>
                        <th>Ngày Khám</th>
                        <th>Giờ Khám</th>
                        <th>Bác Sĩ</th>
                        <th>Chuyên Khoa</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        $stt = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$stt}</td>
                                <td>{$row['hoten']}</td>
                                <td>{$row['ngaykham']}</td>
                                <td>{$row['giokham']}</td>
                                <td>{$row['bacsi']}</td>
                                
                                <td>{$row['chuyenkhoa']}</td>
                                <td class='text-warning fw-bold'>Chờ xác nhận</td>
                            </tr>";
                            $stt++;
                        }
                    } else {
                        echo '<tr><td colspan="7" class="text-muted fst-italic">Chưa có lịch khám nào được đặt.</td></tr>';
                        
                    }
                    $stmt->close();
                    $stmt_user->close();
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
