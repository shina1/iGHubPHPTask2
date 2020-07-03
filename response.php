<?php
//include connection file 
include_once("../db_cls_connect.php");
require('recaptcha/src/autoload.php');
$db = new dbObj();
$connString =  $db->getConnstring();

$params = $_REQUEST;
$action = $params['action'] !='' ? $params['action'] : '';
$empCls = new Employee($connString);

switch($action) {
 case 'login':
	$empCls->login();
 break;
 case 'register':
	$empCls->register();
 break;
 case 'logout':
	$empCls->logout();
 break;
 default:
 return;
}


class Employee {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	function login() {
		if(isset($_POST['login-submit'])) {
			$user_email = mysql_real_escape_string(trim($_POST['username']));
			$user_password = mysql_real_escape_string(trim($_POST['password']));
			$sql = "SELECT id, user, password, email FROM tbl_users WHERE email='$user_email'";
			$resultset = mysqli_query($this->conn, $sql) or die("database error:". mysqli_error($this->conn));
			$row = mysqli_fetch_assoc($resultset);
			if(md5($user_password) == $row['password']){
				echo "1";
				$_SESSION['user_session'] = $row['user'];
			} else {
				echo "Ohhh ! Wrong Credential."; // wrong details
			}
		}
	}
	function register() {
		if(isset($_POST['register_button'])) {
			if (!isset($_POST['g-recaptcha-response'])) {
				throw new \Exception('ReCaptcha is not set.');
			}
			$recaptcha_secret_key = 'your secret key';
			$recaptcha = new \ReCaptcha\ReCaptcha($recaptcha_secret_key, new \ReCaptcha\RequestMethod\CurlPost());
			$response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			if (!$response->isSuccess()) {
				throw new \Exception('ReCaptcha was not validated.');
			}
			
			$user_email = mysql_real_escape_string(trim($_POST['email']));
			$f_name = mysql_real_escape_string(trim($_POST['f_name']));
			$l_name = mysql_real_escape_string(trim($_POST['l_name']));
			$user_password = mysql_real_escape_string(trim($_POST['password']));
			$user_name= $f_name. ' '.$l_name;
			$sql = "INSERT INTO `tbl_users` (`user`, `password`, `email`, `profile_photo`, `active`) VALUES
					('".$user_name."', '".$user_password."', '".$user_email."', NULL, 1);";
			$resultset = mysqli_query($this->conn, $sql) or die("database error:". mysqli_error($this->conn));
			//$row = mysqli_fetch_assoc($resultset);
			if($resultset){
				echo "1";
			} else {
				echo "Ohhh ! Something Wrong."; // wrong details
			}
		}
	}
	function logout() {
		unset($_SESSION['user_session']);
		if(session_destroy()) {
			header("Location: index.php");
		}
	}
}
?>
	