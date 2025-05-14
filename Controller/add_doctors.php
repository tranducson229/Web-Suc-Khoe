<?php
include("../Module/control_doctor.php");

if (isset($_POST['doctor_submit'])) {
    $get_data = new doctors();

    // Xử lý upload ảnh
    $target_dir = "../Media/";
    $target_file = $target_dir . basename($_FILES["Picture"]["tmp_name"]);

    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)) {
        // Gửi dữ liệu vào DB
        $insert = $get_data->insert_doctors(
            $_POST['doctors_name'],
            $_POST['specialty'],
            $_POST['des'],
            $_FILES['Picture']['name']
        );

        if ($insert) {
            echo "<script>alert('Thành công'); window.location='../View/Web_Suc_Khoe copy.php';</script>";
        } else {
            echo "<script>alert('Thất bại');</script>";
        }
    } else {
        echo "<script>alert('Lỗi upload ảnh');</script>";
    }
}
?>
