
<?php
    session_start();
    
    if (isset($_SESSION["email"])) {
		header("Location: home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Transit Login Form a Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transit Login Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../assets/css_login/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css_login/font-awesome.css" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->

<!-- //Custom Theme files -->
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Acme" rel="stylesheet"> 
<!-- //web font --> 
</head>
<body>
	<!-- main -->
	<div class="main">
		<h1>Bike Booking System</h1>
		<div class="main-w3lsrow">
			<!-- login form -->
			<div class="login-form login-form-left"> 
				<div class="agile-row">
					<h2>Login</h2> 
					<div class="login-agileits-top"> 	
                                            <form action="./control/login.php" method="post"> 
							<p>Email </p>
							<input type="text" class="name" name="email" required=""/>
							<p>Password</p>
							<input type="password" class="password" name="password" required=""/>  
							<input type="submit" value="Login"> 
						</form> 	
					</div> 
					<div class="login-agileits-bottom"> 
						<h6><a href="#">Forgot password?</a></h6>
					</div> 
				</div>  
			</div>  
		</div>	
		<!-- copyright -->
		<div class="copyright">
			<p> © 2017 Transit Login Form. All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
		</div>
		<!-- //copyright --> 
	</div>	
	<!-- //main --> 
</body>
</html>