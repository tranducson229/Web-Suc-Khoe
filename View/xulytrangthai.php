<?php
// /Web-Suc-Khoe/View/xulytrangthai.php

header('Content-Type: application/json');

// Giả sử bạn đã kết nối CSDL ở đây
include '../Module/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';

    // Kiểm tra dữ liệu đầu vào
    if ($id <= 0 || !in_array($trangthai, ['xacnhan', 'hoanthanh'])) {
        echo json_encode([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ.'
        ]);
        exit;
    }

    // Ví dụ cập nhật trạng thái trong bảng 'yeucau'
    // $sql = "UPDATE yeucau SET trangthai = ? WHERE id = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param('si', $trangthai, $id);
    // $result = $stmt->execute();

    // Giả lập cập nhật thành công
    $result = true;

    if ($result) {
        echo json_encode([
            'success' => true,
            'trangthai' => $trangthai
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Không thể cập nhật trạng thái.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Phương thức không hợp lệ.'
    ]);
}
?>
