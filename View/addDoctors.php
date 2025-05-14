<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Thêm Bác Sĩ</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      border: none;
      border-radius: 10px;
    }
    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card p-4">
          <h3 class="text-center text-primary mb-4">Thêm Bác Sĩ Mới</h3>
          <form action="../Controller/add_doctors.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
              <label for="name" class="form-label">Họ tên bác sĩ</label>
              <input type="text" class="form-control" name="doctors_name" id="name" placeholder="VD: Nguyễn Văn A" required>
            </div>

            <div class="mb-3">
              <label for="specialty" class="form-label">Chuyên khoa</label>
              <input type="text" class="form-control" name="specialty" id="specialty" placeholder="VD: Tâm lý" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Mô tả chi tiết</label>
              <textarea class="form-control" name="des" id="description" rows="4" placeholder="VD: Hơn 10 năm kinh nghiệm trong khám chữa bệnh..." required></textarea>
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Ảnh bác sĩ</label>
              <input class="form-control" type="file" name="Picture" id="image" accept="image/*" required>
              <div class="form-text">Chỉ chấp nhận ảnh JPG, PNG.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100"name="doctor_submit">Lưu Thông Tin</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (nếu cần) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
