<?php
session_start();
ob_start();
session_destroy();
header('location:Web_Suc_Khoe.php');


?>