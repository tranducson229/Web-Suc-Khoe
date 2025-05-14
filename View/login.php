
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../CSS/login.css" />
  <title>Login Page</title>
</head>

<body>
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
            <button type="submit"class="btn btn-primary " name="submit_login">Login Now</button>
          </form>
          <h6>Or continue with</h6>
          <div class="logins">
            <a href="#"><img src="../Media/search.png" alt="google" /></a>
            <a href="#"><img src="../Media/github.png" alt="github" /></a>
            <a href="#"><img src="../Media/facebook.png" alt="facebook" /></a>
          </div>
          <p>Don't have an account yet? <a href="#">Sign up</a></p>
        </div>
        <div id="quaylai">
          <a href="gioithieu.html">Get back</a>
        </div>
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
