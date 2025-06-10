<?php
  
    if(isset($_POST['submit_login'])){
      session_start();
      include("../Module/control_user.php");
      $get_data = new data_user();
      $login=$get_data->login($_POST['username'],$_POST['password']);
      if($login==1)
      {
        $_SESSION ['username']= $_POST['username'];
        echo "<script>alert('Đăng nhập thành công')
        window.location='../View/Web_Suc_khoe copy.php'</script>";
      }
      else echo "<script>alert('Đăng nhập không thành công')
       window.location='../View/Web_Suc_khoe.php'</script>";
    }
    if(isset($_POST['submit_login'])){
      session_start();
      include("../Module/control_user.php");
      $get_data = new data_admin();
      $login = $get_data ->admin_log($_POST['username'], $_POST['password']);
      if($login==1){
        $_SESSION ['username']= $_POST['username'];
        echo "<script>alert('Đăng nhập thành công')
        window.location='../View/admin_index.php'</script>";
      }
      else echo "<script>alert('Đăng nhập không thành công')
      window.location='../Web_Suc_Khoe.php'</script>";
     
    }
  ?>