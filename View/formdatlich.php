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
  ?>
  <div class="container">
    <h2>Đặt lịch khám với bác sĩ</h2>
    <form>
    <label>Chuyên khoa:</label>
    <select>
      <option>Da liễu</option>
      <option>Nội khoa</option>
      <option>Tâm lý</option>
    </select>

    <label>Bác sĩ:</label>
    <select>
      <?php echo $doctorOptions; ?>
    </select>

    <label>Ngày khám:</label>
    <input type="date" />

    <label>Giờ khám:</label>
    <input type="time" />

    <label>Họ và tên:</label>
    <input type="text" placeholder="Nhập họ tên..." />

    <label>Email:</label>
    <input type="email" placeholder="Nhập email..." />

    <label>Số điện thoại:</label>
    <input type="tel" placeholder="Nhập số điện thoại..." />

    <button type="submit">Đặt lịch</button>
    </form>
  </div>

  
</body>
</html>
