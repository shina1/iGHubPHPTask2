<?php 
// session_start();

require("connect/db_cls_connect.php");

 
if(isset($_POST['register_button'])){

    $firstName = $_POST['f_name'];
    $secondName = $_POST['l_name'];
    $email = $_POST['email'];
    $psw = $_POST['password'];
    $re_psw = $_POST['re_password'];
    $new_pass = crypt($psw,'test');

    $insert = "INSERT INTO `tb_users` (`fName`,`lName`, `email`, `pswd`) VALUES ('$firstName','$secondName','$email','$new_pass' )";
    

    if(empty($_POST["f_name"]) && empty($_POST["l_name"]) && empty($_POST["email"]) && empty($_POST["password"]) && empty($_POST["re_password"])) {

        echo '<script>alert("All fields are required")</script>';
    }else if($psw != $re_psw){
        echo "Password not match";
    }
    
         else{
            $firstName = mysqli_real_escape_string($connect,  $firstName);
            $secondName = mysqli_real_escape_string($connect, $secondName);
            $email = mysqli_real_escape_string($connect,  $email);
            $psw = mysqli_real_escape_string($connect, $psw);
            // $ashiri_keji = mysqli_real_escape_string($connect,  $ashiri_keji);
             }
             if (mysqli_query($connect,  $insert))
             {
                 echo "<script>alert('Registration Succesful') </script>";
                 header("Location:index.php");
             }
             else{
                echo "something went wrong";
             }
}





?>