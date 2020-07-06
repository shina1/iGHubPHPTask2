<?php
require("connect/db_cls_connect.php");



if (!$_SESSION['email']) {
die(header("location: index.php"));
}else{
}
		
		$mail = $_SESSION['email'];
		$sql = "SELECT * FROM `tb_users` where email='$mail'";
		$result = mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		$_SESSION['fName'] = $row['fName'];
		$_SESSION['lName'] = $row['lName'];
		// $_SESSION['address'] = $row['address'];
		$_SESSION['email'] = $row['email'];



		
		// exit($rank );


		
?>