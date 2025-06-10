<?php
  if(isset($_POST['submit_login'])){
    session_start();
    include("../Module/control_user.php");
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra đăng nhập admin trước
    $get_data_admin = new data_admin();
    $login_admin = $get_data_admin->admin_log($username, $password);

    if($login_admin == 1){
      $_SESSION['username'] = $username;
      echo "<script>alert('Đăng nhập thành công (admin)')
      window.location='../View/admin_index.php'</script>";
      exit();
    }

    // Nếu không phải admin thì thử đăng nhập user
    $get_data_user = new data_user();
    $login_user = $get_data_user->login($username, $password);

    if($login_user == 1){
      $_SESSION['username'] = $username;
      echo "<script>alert('Đăng nhập thành công')
      window.location='../View/Web_Suc_khoe copy.php'</script>";
    } else {
      echo "<script>alert('Đăng nhập không thành công')
      window.location='../View/Web_Suc_khoe.php'</script>";
    }
  }
?>
