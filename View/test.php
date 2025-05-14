<style>
    .doctor-box {
  width: 300px;
  border: 1px solid #ddd;
  border-radius: 10px;
  overflow: hidden;
  margin: 20px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  text-align: center;
  background-color: #fff;
}

.doctor-image img {
  width: 100%;
  height: auto;
}

.doctor-info {
  padding: 15px;
}

.doctor-info h3 {
  font-size: 20px;
  margin: 10px 0 5px;
}

.doctor-info p {
  font-size: 14px;
  color: #666;
}

.doctor-actions {
  margin-top: 10px;
}

.btn {
  display: inline-block;
  padding: 8px 12px;
  margin: 5px;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}

.buy-now {
  background-color: #28a745;
}

.add-cart {
  background-color: #007bff;
}

</style>
<div class="doctor-box">
  <div class="doctor-image">
    <img src="../Media/<?php echo $doctor['Picture']; ?>" alt="Bác sĩ" />
  </div>
  <div class="doctor-info">
    <h3><?php echo $doctor['Ten']; ?></h3>
    <p><?php echo $doctor['description']; ?></p>
    <div class="doctor-actions">
      <a class="btn buy-now" href="#">Buy Now</a>
      <a class="btn add-cart" href="add_to_cart.php?id=<?php echo $doctor['ID']; ?>&Ten=<?php echo $doctor['Ten']; ?>&picture=<?php echo $doctor['Picture']; ?>&price=0">Add to cart</a>
    </div>
  </div>
</div>
