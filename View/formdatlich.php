<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<p>Bạn cần đăng nhập để đặt lịch.</p>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt lịch khám bác sĩ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #007bff;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      background: #007bff;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
    }

    button:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>
  
<?php
  // Kết nối database (giả sử dùng MySQLi)
  $conn = new mysqli("localhost", "root", "", "healthy");
  $conn->set_charset("utf8");

  // Lấy danh sách bác sĩ
  $doctorOptions = "";
  $sql = "SELECT id, Ten FROM doctors";
  $result = $conn->query($sql);
  if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $doctorOptions .= '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['Ten']) . '</option>';
    }
  } else {
    $doctorOptions = '<option>Không có bác sĩ</option>';
  }
  $username = $_SESSION['username'];
$sql_user = "SELECT uid FROM user WHERE username = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("s", $username);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
if ($result_user->num_rows === 0) {
    echo "<p>Không tìm thấy người dùng.</p>";
    exit;
}
$user_id = $result_user->fetch_assoc()['uid'];
?>

  <div class="container">
    <h2>Đặt lịch khám bác sĩ</h2>
    <form action="" method="POST">
      <label>Chuyên khoa:</label>
      <select name="chuyenkhoa" required>
        <option value="Da liễu">Da liễu</option>
        <option value="Nội khoa">Nội khoa</option>
        <option value="Tâm lý">Tâm lý</option>
      </select>

      <label>Bác sĩ:</label>
      <select name="bacsi_id" required>
        <?php echo $doctorOptions; ?>
      </select>

      <label>Ngày khám:</label>
      <input type="date" name="ngay" required />

      <label>Giờ khám:</label>
      <input type="time" name="gio" required />

      <label>Họ và tên:</label>
      <input type="text" name="hoten" placeholder="Nhập họ tên..." required />

      <label>Email:</label>
      <input type="email" name="email" placeholder="Nhập email..." required />

      <label>Số điện thoại:</label>
      <input type="tel" name="sdt" placeholder="Nhập số điện thoại..." required />

      

      <button type="submit" name="submit">Đặt lịch</button>
    </form>
  </div>

  <?php
  if (isset($_POST['submit'])) {
      $chuyenkhoa = $_POST['chuyenkhoa'];
      $bacsi = $_POST['bacsi_id'];
      $ngay = $_POST['ngay'];
      $gio = $_POST['gio'];
      $hoten = $_POST['hoten'];
      $email = $_POST['email'];
      $sdt = $_POST['sdt'];
      

      // Kết nối đến cơ sở dữ liệu
      $conn = new mysqli('localhost', 'root', '', 'healthy');

      // Kiểm tra kết nối
      if ($conn->connect_error) {
          die("Kết nối thất bại: " . $conn->connect_error);
      }

      // Câu lệnh SQL để chèn dữ liệu
      $sql = "INSERT INTO lichkham (chuyenkhoa, bacsi_id, ngay, gio, hoten, email, sdt, user_id) 
              VALUES ('$chuyenkhoa', '$bacsi', '$ngay', '$gio', '$hoten', '$email', '$sdt', '$user_id')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Đặt lịch thành công!');</script>";
          echo "<script>window.location.href = 'Web_Suc_Khoe copy.php';</script>"; // Chuyển hướng về trang chủ
          exit();
      } else {
          echo "<p style='text-align: center; color: red;'>Lỗi: " . $conn->error . "</p>";
      }

      // Đóng kết nối
      $conn->close();
  }
  ?>


  
</body>
</html>