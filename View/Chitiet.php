<?php
include("../Module/connect.php"); // hoặc đường dẫn file kết nối DB của bạn

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM doctors WHERE ID = $id";
    $result = mysqli_query($conn, $query);
    $doctor = mysqli_fetch_assoc($result);
} else {
    echo "Không tìm thấy bác sĩ.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết bác sĩ</title>
    <link rel="stylesheet" href="style.css"> <!-- CSS riêng nếu cần -->
</head>
<style>
    .doctor-detail {
    width: 80%;
    margin: auto;
    padding: 20px;
    box-shadow: 0 0 10px #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
}

.doctor-detail img {
    display: block;
    margin-bottom: 20px;
}

.doctor-detail ul {
    list-style: none;
    padding: 0;
}

.doctor-detail li {
    margin-bottom: 10px;
}

</style>
<body>

<div class="doctor-detail">
    <h2><?php echo $doctor['Ten']; ?></h2>
    <img src="../Media/<?php echo $doctor['Hinh']; ?>" alt="Ảnh bác sĩ" width="300">
    
    <ul>
        <li><strong>Chuyên khoa:</strong> <?php echo $doctor['specialty']; ?></li>
        <li><strong>Kinh nghiệm:</strong> <?php echo $doctor['description']; ?> </li>
        <li><strong>Mô tả:</strong> <?php echo $doctor['description']; ?></li>
    </ul>

    <a href="add_to_cart.php?id=<?php echo $doctor['id']; ?>&Ten=<?php echo $doctor['Ten']; ?>&picture=<?php echo $doctor['Hinh']; ?>&price=0" class="btn">Đặt lịch hẹn</a>
</div>

</body>
</html>
