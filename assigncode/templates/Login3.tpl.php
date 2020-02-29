<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>SilverArrow</title>
<link REL="stylesheet" TYPE="text/css" HREF="style.css" Title="BlueSky 3.0 CSS">
</head>
<body>
<div class="nifty">
<b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>

<div class="nifty2">
<b class="rtop2"><b class="r12"></b><b class="r22"></b><b class="r32"></b><b class="r42"></b></b>
<!-- EDIT ONLY THE TEXT HERE -->
<h1>Silver<span class="gray">Arrow</span></h1>
<h2 id="slogan">Slogan goes here...</h2><br>
<!-- LINKS - ONLY EDIT DISPLAYED TEXT AND URL -->
<!-- MAIN TEXT - EDIT ONLY THE TEXT - KEEP <P> AND </P> TAGS IN TACT! -->
<h2>Welcome to SilverArrow</h2>
<p>
Login to visit the site
</p>
<center>
<p><?php 
  if (!empty($errors) && is_array($errors)):
  ?>
  <ul>
  <?php 
	foreach ($errors as $e): 
  ?>
	<li><?php echo $e ?></li>
  <?php 
    endforeach; ?>
 </ul>
 <?php 
  endif;
  ?>
</p>
<form name="example_form" action="index.php" method="POST"><p />
Email:<br>
<input name="email" value="" type="text" size="30" /><p>
Password:<br>
<input name="password" value="" type="password" size="30" /><p>
<input type="submit" value="Login" class="submit" /><p />
</form>
</center>

<center>
<div class="footer">
&copy; <a href="#">mysite.com</a> 2007 | Valid CSS | Design by <a href="http://www.freelayouts.com/user/rndmworld">RNDMWorld</a>
</div>
</center>
</div>
</div>
</body>
</html>
