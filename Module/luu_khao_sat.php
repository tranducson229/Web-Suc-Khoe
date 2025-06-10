<?php
session_start();
if (!isset($_SESSION['username'])) {
    http_response_code(403);
    echo "Chưa đăng nhập";
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$tong_diem = (int) $data['tong_diem'];
$danh_gia = $data['danh_gia'] ?? '';

// Kết nối DB
$conn = new mysqli('localhost', 'root', '', 'healthy');
$conn->set_charset("utf8");

$username = $_SESSION['username'];
$sql = "SELECT uid FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    http_response_code(404);
    echo "Không tìm thấy user";
    exit;
}
$user_id = $result->fetch_assoc()['uid'];

// Lưu khảo sát
$stmt = $conn->prepare("INSERT INTO khao_sat_tam_ly (user_id, tong_diem, danh_gia) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $user_id, $tong_diem, $danh_gia);
if ($stmt->execute()) {
    echo "Đã lưu khảo sát thành công.";
} else {
    http_response_code(500);
    echo "Lỗi khi lưu dữ liệu.";
}
$stmt->close();
$conn->close();
?>