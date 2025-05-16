<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <!-- <link href="assets/css/bootstrap.css" rel="stylesheet" /> -->
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="../CSS/login.css">

</head>
<body style="background-color: #E2E2E2;">
    <!-- <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form method="post" action="../controller/control_user.php">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username "name="username"/>
                                        </div>
                                    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password"/>
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="index.html" >Forget password ? </a> 
                                            </span>
                                        </div>
                                     
                                     <button type="submit"class="btn btn-primary " name="submit">Login Now</button>
                                    <hr />
                                    Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a> 
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div> -->
    <div class="container">
    <div class="containerContent">
      <h3>Welcome back!</h3>
      <h1>Log In</h1>
      <form method="post"action="../Controller/control_user.php">
        <label for="name">Name</label>
        <div class="inputRow">
          <input type="text" placeholder="Enter your name" name="username"/>
        </div>
        <label for="password">Password</label>
        <div class="inputRow">
          <input type="password" id="password" placeholder="Enter your Password" name="password"/>
          <span id="password-eye"><i class="ri-eye-off-line"></i></span>
        </div>
        <div class="inputFP">
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit"class="btn btn-primary " name="submit">Login Now</button>
      </form>
      <h6>Or continue with</h6>
      <div class="logins">
        <a href="#"><img src="../Media/search.png" alt="google" /></a>
        <a href="#"><img src="../Media/github.png" alt="github" /></a>
        <a href="#"><img src="../Media/facebook.png" alt="facebook" /></a>
      </div>
      <p>Don't have an account yet? <a href="#">Sign up</a></p>
    </div>
    <!-- <div id="quaylai">
      <a href="gioithieu.html">Get back</a>
    </div> -->
    <div class="containerImg">
      <img src="../Media/1.1.png" alt="header" />
    </div>
  </div>

  <script >
    
const passwordBtn = document.getElementById("password-eye");

passwordBtn.addEventListener("click", (e) => {
  const passwordInput = document.getElementById("password");
  const icon = passwordBtn.querySelector("i");
  const isVisible = icon.classList.contains("ri-eye-line");
  passwordInput.type = isVisible ? "password" : "text";
  icon.setAttribute("class", isVisible ? "ri-eye-off-line" : "ri-eye-line");
});

  </script>

</body>
</html>