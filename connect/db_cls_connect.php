<?php
//session_start();
//Class dbObj{
	/* Database connection start */
	// var $servername = "localhost";
	// var $username = "root";
	// var $password = "";
	// var $dbname = "usersreg";
	// var $conn;
	// function getConnstring() {
	// 	$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

	// 	/* check connection */
	// 	if (mysqli_connect_errno()) {
	// 		printf("Connect failed: %s\n", mysqli_connect_error());
	// 		exit();
	// 	} else {
	// 		$this->conn = $con;
	// 	}
	// 	return $this->conn;
	// }
//}
$servername = "localhost";
$ussername = "root";
$password = "";
$dbname = "usersreg";

$connect = mysqli_connect($servername, $ussername, $password, $dbname);

// check connection
if (!$connect) {
	die("connection fialed:" . mysqli_connect_error() );

	
}

?>