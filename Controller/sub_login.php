<?php
include "../Module/control_user.php";
session_start();
if(isset($_POST['submit_login'])){
    if(empty($_POST['txtname']) || empty($_POST['txtpass'])){
        echo"Vui lòng nhập đủ thông tin";
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['txtname']);
        $tmp = $tmp->fetch_assoc(); 
        if($_POST['txtpass'] == $tmp['pass']){
            $_SESSION['user_name'] = $_POST['txtname'];
            echo"
            <script>window.location.href = '../Guest/index.php'; </script>";
        }
        else{
            echo"<script>alert('Sai tài khoản hoặc mật khẩu!');
            window.location.href = '../Guest/login.php'; 
            </script>";
        }

    }
}

if(isset($_POST['login'])){
    if(empty($_POST['username'])||empty($_POST['pass'])){
        echo "Please enter username and password";
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['username']);
        $tmp = $tmp->fetch_assoc(); 
        if($_POST['username']== $tmp['username'] && $_POST['pass']==$tmp['pass'] && $tmp['type']=="1"){
            $_SESSION['username'] = $_POST['username'];
            echo "<script>window.location.href='../advance-admin/index.php'; </script>";
        }
        else{
            echo"<script>alert('Sai tài khoản hoặc mật khẩu!');
            window.location.href = '../advance-admin/login.php'; 
            </script>";
        }
    }
}

?>