<?php
include('connect.php');
class doctors{
    public function select(){
        global $conn;
        $sql= "SELECT * FROM doctors";
        $run= mysqli_query($conn,$sql);
        return $run;
    }
    public function insert_doctors ($txtname,$specialty,$des,$Picture){
        global $conn;
        $sql = "INSERT INTO doctors(Ten,specialty,description,Hinh)
                values('$txtname','$specialty','$des','$Picture')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}



?>