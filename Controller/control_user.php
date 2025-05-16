<?php
    if(isset($_POST['submit_contact'])){
      include("../model/control_contact.php");
      $get_data=new data();
      $insert=$get_data->insert_table($_POST['Ten'],$_POST['Email'],$_POST['Phone'],$_POST['Messages']);  
      if($insert) echo "<script>alert('Thành công')
                 window.location='../Guest/contact.php'</script>";
      else echo "<script>alert('MAKE')</script>";
    }
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
    if(isset($_POST['submit'])){
      session_start();
      include("../Module/control_user.php");
      $get_data = new data_admin();
      $login =$get_data ->admin_log($_POST['username'], $_POST['password']);
      if($login==1){
        $_SESSION ['username']= $_POST['username'];
        echo "<script>alert('Đăng nhập thành công')
        window.location='../View/Web_Suc_khoe.php'</script>";
      }
      else echo "<script>alert('Đăng nhập không thành công')
      window.location='../Web_Suc_Khoe.php'</script>";
      // else echo "<script>alert('MAKE')</script>";
    }
  ?>