<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="index.php?controller=Home"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=Profile">Profile</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>
			
            <?php
			 $count=0;
				
				for($row=0; $row<2; $row++){
					?>
				    <div class="centered">
					<?php
					for($col=0; $col<4; $col++){
					   echo'<section>
                              <a href="#"><img src=images/'.$recomm[0][$count]["course_image"].'>
							  <span class="course-title">'.$recomm[0][$count]["course_name"].'</span>
				              <span>'.$recomm[0][$count]["instructor_name"].'</span></a>
					        </section>				   
					   ';
					   $count++;
					}
					?>
					</div>
					<?php
				}
			?>	
				
			
			<h1>Learner Recommended</h1>
			<?php
			 $count=0;
			
				
				for($row=0; $row<2; $row++){
					?>
				    <div class="centered">
					<?php
					for($col=0; $col<4; $col++){
					   echo'<section>
                              <a href="#"><img src=images/'.$recomm[1][$count]["course_image"].'>
							  <span class="course-title">'.$recomm[1][$count]["course_name"].'</span>
				              <span>'.$recomm[1][$count]["instructor_name"].'</span></a>
					        </section>				   
					   ';
					   $count++;
					}
					?>
					</div>
					<?php
				}
			?>	
			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>