<?php
include('partials/header.php');
// session_start();
include_once('checkUsers.php');
?>
<link rel="stylesheet" href="libs/css/bootstrap.css">
<div class="container">
	<div class="row">
	
        
    <h1>Welcome to your dashboard</h1>
<div class=" col-sm-12 col-md-8 col-lg-10 username">   
    <h2><?php echo $_SESSION['fName']; ?></h2>
    <br>
    <h2><?php echo $_SESSION['lName']; ?></h2>
    <br>
    <h2><?php echo $_SESSION['email']; ?></h2>

</div>
    
</div>
	
		<li><a href="logout.php" class="btn btn-default btn-sm">
          Logout
        </a></li>
	</ul>
	</div>
    
    
    
 
    
</div>
<?php
include('partials/footer.php')
?>