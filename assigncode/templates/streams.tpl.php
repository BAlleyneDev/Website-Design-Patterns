<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Streams | Quwius</title>
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
		<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
            <?php
			   $count=0;
			  for($row=0; $row<3; $row++)
			  {
			 
				  ?><div class="centered"><?php
				  for($col=0; $col<4; $col++ )
				  {
				  echo'
				
					<section class="streams">
					<a href="#"><img src="images/'.$streams[$count]['stream_image'].'" alt="Data Science Stream" title="Data Scientist">
					<span class="course-title padded">'.$streams[$count]['stream_name'].'</span>
					<span class="padded">'.$streams[$count]['instructor_name'].'</span></a>
					</section>
				
			    
				  ';
				  $count++;
				  }
				  ?></div><?php
			  }
			?>
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