<?php
 session_start();
class appointment {
    function add($username, $bacsi_id, $ngay) {
        include('connect.php'); // Kết nối DB

        // Lấy thông tin bệnh nhân từ bảng users (hoặc từ session nếu có)
        $stmt = $conn->prepare("SELECT Ten, specialty FROM doctors WHERE Ten = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hoten, $chuyenkhoa);
        $stmt->fetch();
        $stmt->close();

        // Giả sử giờ khám mặc định là 08:00
        $gio = "08:00";

        // Thêm vào bảng lichkham
        $sql = "INSERT INTO lichkham (hoten, ngay, gio, bacsi_id, chuyenkhoa) VALUES (?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($sql);
        return $stmt2->execute([$hoten, $ngay, $gio, $bacsi_id, $chuyenkhoa]);
    }
}
?>