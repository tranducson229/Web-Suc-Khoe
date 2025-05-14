<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Ninom</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body class="sub_page">

  <form method="post" action="../controller/sub_register.php">
      <div  style="width: 400px; margin-top: 100px; margin-bottom: 100px;" class="border p-3 mx-auto">
        <h4 class="text-center">Sign Up</h4>
        <div class="mt-4 mb-4 form-floating">
          <input type="text" class="form-control" name="txtname" placeholder="UserName" id="username">
          <label for="txtname" >UserName</label>
        </div>
        <div class="mt-4 mb-4 form-floating">
          <input type="text" class="form-control" name="txtmail" placeholder="Email" id="email">
          <label for="txtmail" >Email</label>
        </div>
        <div  class="mt-4 mb-4 form-floating">      
          <input type="password" class="form-control" name="txtpass" placeholder="Password"  id="txtpass">
          <label for="txtpass" >Password</label>
        </div>
        <div  class="mt-4 mb-4 form-floating">      
          <input type="password" class="form-control" name="txtconfirm" placeholder="Confirm Password"  id="txtconfirm">
          <label for="txtpass" >Confirm Password</label>
        </div>
       
        <div class="text-center mt-3">
          <input type="submit" class="btn btn-primary" style="width: 100% ;" value="Sign Up" name="txtsub">
          <p class=" d-inline">Have an account? </p> <a class="text-decoration-none" href="register.php"> Sign in</a>
        </div>
       
      </div>
    </form>



  
</body>

</html>