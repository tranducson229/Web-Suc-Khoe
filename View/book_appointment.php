<?php

session_start();
include('../Module/control_appointment.php'); // Tạo file này nếu chưa có

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Bạn chưa đăng nhập'); window.location='login.php';</script>";
    exit();
}

if (isset($_GET['id'])) {
    $doctors_id = intval($_GET['id']);
    $username = $_SESSION['username'];
    $date = date('Y-m-d'); // Ngày hiện tại, có thể cho chọn ngày nếu muốn

    $appointment = new appointment();
    $result = $appointment->add($username, $doctors_id, $date);

    if ($result) {
        echo "<script>alert('Đặt lịch thành công!'); window.location='viewlichkham.php';</script>";
    } else {
        echo "<script>alert('Đặt lịch thất bại!'); window.location='doctors.php';</script>";
    }
} else {
    echo "<script>window.location='doctors.php';</script>";
}
?>