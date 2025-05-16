  <?php
  session_start();
  ?>
  <link rel="stylesheet" href="../CSS/css/all.css">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="../CSS/WebSucKhoe.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <?php
  include('nav copy.php');
  ?>
  <?php
  if(!isset($_SESSION['username'])){
    echo "<script>alert('Bạn chưa đăng nhập')
    window.location='../View/login.php'</script>";
  }
  ?>

  <section class="doctor-section py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); min-height:100vh;">
    <div class="container">
    <div class="heading_container text-center mb-5">
      <hr style="width:60px; border:2px solid #4CAF50; margin:auto;">
      <h2 class="fw-bold mt-3" style="color:#2d3a4b;">Danh sách bác sĩ</h2>
    </div>
    <div class="row g-4">
      <?php
      include ('../Module/control_doctor.php'); 
      $get_data = new doctors();
      $select = $get_data->select();
      foreach($select as $doctors){
      ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card doctor-card h-100 shadow-sm border-0 rounded-4">
        <div class="doctor-img-wrapper position-relative">
          <img src="../Media/<?php echo $doctors['Hinh']; ?>" alt="Doctor Image" class="card-img-top rounded-top-4" style="height:220px; object-fit:cover;">
          <span class="doctor-badge position-absolute top-0 end-0 m-2 px-3 py-1 bg-success text-white rounded-pill small" style="font-size:13px;">Bác sĩ</span>
        </div>
        <div class="card-body d-flex flex-column">
          <h5 class="card-title fw-bold mb-2" style="color:#1a2b3c;"><?php echo $doctors['Ten']; ?></h5>
          <p class="card-text text-muted mb-3" style="font-size:15px; min-height:48px;"><?php echo $doctors['description']; ?></p>
          <div class="mt-auto">
          <a href="Chitiet.php?id=<?php echo $doctors['id']; ?>" class="btn btn-outline-primary w-100 mb-2">
            <i class="fas fa-info-circle me-1"></i> Xem chi tiết
          <a class="btn btn-success w-100" href="book_appointment.php?id=<?php echo $doctors['id']; ?>">
            <i class="fas fa-calendar-check me-1"></i> Đặt lịch ngay
          </a>
          </div>
        </div>
        </div>
      </div>
      <?php } ?>
    </div>
    </div>
  </section>

  <style>
  .doctor-card {
    transition: transform 0.2s, box-shadow 0.2s;
    background: #fff;
  }
  .doctor-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 8px 24px rgba(44, 62, 80, 0.13);
  }
  .doctor-img-wrapper {
    overflow: hidden;
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
  }
  .doctor-img-wrapper img {
    transition: transform 0.3s;
  }
  .doctor-card:hover .doctor-img-wrapper img {
    transform: scale(1.07);
  }
  .doctor-badge {
    box-shadow: 0 2px 8px rgba(76,175,80,0.15);
  }
  .card-title {
    font-size: 1.15rem;
  }
  .btn-outline-primary {
    border-radius: 0.5rem;
  }
  .btn-success {
    border-radius: 0.5rem;
  }
  @media (max-width: 575.98px) {
    .doctor-card {
    margin-bottom: 1.5rem;
    }
  }
  </style>
