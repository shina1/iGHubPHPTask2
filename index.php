<?php
include('partials/header.php');
?>
<link rel="stylesheet" href="libs/css/bootstrap.css">
<div class="row box" id="login-box">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-login">
			<div class="alert alert-info">
				<ul>
					<li>Sample login email : test@phpflow.com</li>
					<li>Password  : test123</li>
				</ul>
			</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-12">
				  <div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
				  <form id="login-form" name="login_form" role="form" style="display: block;" method="post">
					  <div class="form-group">
						<input type="email" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=""  required>
					  </div>
					  <div class="form-group">
						<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"> 
					  </div>
					  <div class="col-xs-6 form-group pull-right">     
							<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Log In
							</button>
					  </div>
					  <div class="col-xs-6 form-group pull-right">     
							<a type="submit" name="register-submit" id="register-submit" tabindex="4" href="register.php" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Register
							</a>
					  </div>
				  </form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<?php
include('partials/footer.php')
?>