  <?php
  session_start();
  ?>
 <link rel="stylesheet" href="../CSS/css/all.css">
    <!-- Trước khi đóng </body> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   <link rel="stylesheet" href="../CSS/WebSucKhoe.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
include('nav copy.php');

?>
 <?php
        
        if(!isset($_SESSION['username'])){
            echo "<script>alert('Bạn chưa đăng nhập')
            window.location='../View/login.php'</script>";
        }
    ?>

<section class="fruit_section layout_padding">
  <div class="container">
    <div class="heading_container">
      <hr>
      <h2>Danh sách bác sĩ</h2>
    </div>
  </div>

  <div class="container-fluid">

    <div class="grid-container">
      <?php
        include ('../Module/control_doctor.php'); 
        $get_data = new doctors();
        $select = $get_data->select();
        foreach($select as $doctors){
      ?>
        <div class="grid-item">
          <img src="../Media/<?php echo $doctors['Hinh']; ?>" alt="Doctor Image">
          <h5><?php echo $doctors['Ten']; ?></h5>
          <p><?php echo $doctors['description']; ?></p>
          <a href="Chitiet.php?id=<?php echo $doctors['id']; ?>" class="btn btn-primary">Xem chi tiết</a>
          <a class="btn" href="add_to_cart.php?id=<?php echo $doctors['id']; ?>&Ten=<?php echo $doctors['Ten']; ?>&Picture=<?php echo $doctors['Hinh']; ?>&price=0">Add to cart</a>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<style>
  .grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 25px;
    padding: 20px;
  }

  .grid-item {
    background: #fff;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    text-align: center;
  }

  .grid-item img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
  }

  .grid-item h5 {
    margin: 10px 0 5px;
    font-size: 18px;
    font-weight: bold;
  }

  .grid-item p {
    font-size: 14px;
    color: #555;
    margin-bottom: 10px;
  }

  .grid-item .btn {
    display: inline-block;
    padding: 8px 12px;
    margin: 5px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 14px;
  }

  .grid-item .btn:hover {
    background-color: #45a049;
  }
</style>
