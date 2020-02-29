<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
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
		<h1>Courses</h1>
		<?php if(isset($maxError)){
			 echo "<p style='text-align:center;color:red;'>$maxError<p>";
		} ?>
		<?php
		  if(isset($courseAdded))
		  {
		     echo $courseAdded;
		  }
		?>
		<ul class="course-list">
			<?php 
			
			foreach ($courses as $key => $record)
			      {
			   echo '
				<li><div>
				<a href="#"><img src="images/'.$record['course_image'].'" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">'.$record['faculty_dept_name'].' </span>	
					<span class="course-title"> '.$record['course_name'].' </span>
					<span class="instructor"> '.$record['instructor_name'].' </span></a>
				</div>
				<div>
					<p>Get Curious.</p>
					<a href="index.php?controller=Courses&id='.$record['course_id'].'" class="startnow-button startnow-btn">Start Now!</a>
				</div>
			</li>
				   ';} ?>
		</ul>
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