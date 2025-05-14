<?php
include ("connect.php");
class data_user
{
    public function login($username, $password) {
        global $conn;
        $select = "SELECT * FROM user WHERE username= '$username' AND password = '$password'";
        $run = mysqli_query($conn, $select);
        $count = mysqli_num_rows($run); // Đếm số dòng trả về
        return $count; // Trả về số lượng dòng
    }
    public function select(){
        global $conn;
        $sql = "SELECT*FROM user";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
   
    public function sl_username($name){
        global $conn;
        $sql = "SELECT*FROM user where username = '$name'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_account($name,$email,$pass){
        global $conn;
        $sql = "INSERT INTO user(username,email,password)
                values('$name','$email','$pass')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
   
    public function update_pass($name, $newpass){
        global $conn;
        $sql = " UPDATE user  SET password = '$newpass' WHERE username = '$name' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_profile($username, $email, $address, $gender){
        global $conn;
        $sql = "UPDATE user
                SET email = '$email', address = '$address',  gender = '$gender' 
                WHERE username = '$username'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    public function update_profile_id($id, $email, $address, $gender,$pass ){
        global $conn;
        $sql = "UPDATE user
                SET email = '$email',  address = '$address', gender = '$gender', password = '$pass'
                WHERE uid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_user($id){
        global $conn;
        $sql = "delete from user
                WHERE uid = '$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}
class data_admin
{
    public function admin_log ($username ,$password)
    {
        global $conn;
        $select = "select * from user where username= '$username' and password = '$password'";
        $run = mysqli_query($conn,$select);
       return $run;
    }
    public function sl_id($id){
        global $conn;
        $sql = "SELECT * FROM user where uid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    
}
?>