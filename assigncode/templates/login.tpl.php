<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Login|Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="index.php?controller=Home"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=Profile">Profile</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		   <?php
          if(isset($errors))
		  {
		   foreach($errors as $error){
			           echo "<p style='text-align:center;color:red;'>$error<p>";
		   }
		  }
		    ?>
		   <div class="login-box">
			<div class="login-box-body">
			<p class="login-box-msg">Be Curious - Sign In</p>
			<form action="#" method="post">
			  <div class="form-group has-feedback">
				<input name="email" type="text" class="form-control" placeholder="Email"/>
			  </div>
			  <div class="form-group has-feedback">
				<input name="password" type="password" class="form-control" placeholder="Password"/>
			  </div>
			  <div class="row">
				<div class="col-xs-8">    
				  <div class="checkbox icheck">
					<label>
					  <input type="checkbox"> Remember Me
					</label>
				  </div>                        
				</div><!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
			  </div>
			</form>
			<br>
			<a href="register.html" class="text-center">Sign Up</a>
       </div><!-- /.login-box-body -->
	  </div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>