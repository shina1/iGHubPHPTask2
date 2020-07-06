<?php
// session_start();

require("connect/db_cls_connect.php");

$email=$_POST['email'];
$password=$_POST['password'];
 $new_pass = crypt($password,'test');
//echo $email;
// echo $new_pass;
// exit();
$result="SELECT * FROM `tb_users` WHERE `email`='$email' AND `pswd`='$new_pass'";
$query=mysqli_query($connect,$result);
$row=mysqli_fetch_array($query);
$_SESSION['fName'] = $row['fName'];
$_SESSION['lName'] = $row['lName'];
if($row == true) {
  $_SESSION['email']=$email;
  header("location:dashboard.php");
}
else{
    echo 'Incorrect details';
    header("location:index.php");
}


?>