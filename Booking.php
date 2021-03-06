<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Accessories :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
<!--webfont-->
<!-- dropdown -->
<script src="js/jquery.easydropdown.js"></script>
<link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/scripts.js" type="text/javascript"></script>
<!--js-->

</head>
<body>
<!--banner-->
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: false,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>
<div class="banner-bg banner-sec">	
	  <div class="container">
			 <div class="header">
			       <div class="logo">
						 <a href="index.html"><img src="images/logo.png" alt=""/></a>
				   </div>							 
				  <div class="top-nav">										 
						<label class="mobile_menu" for="mobile_menu">
						<span>Menu</span>
						</label>
						<input id="mobile_menu" type="checkbox">
					   <ul class="nav">
						  <li class="dropdown1"><a href="bicycles.html">BICYCLES</a>
							  <ul class="dropdown2">
									<li><a href="bicycles.html">FIXED / SINGLE SPEED</a></li>
									<li><a href="bicycles.html">CITY BIKES</a></li>
									<li><a href="bicycles.html">PREMIMUN SERIES</a></li>												
							  </ul>
						  </li>
						  <li class="dropdown1"><a href="parts.html">PARTS</a>
							 <ul class="dropdown2">
									<li><a href="parts.html">CHAINS</a></li>
									<li><a href="parts.html">TUBES</a></li>
									<li><a href="parts.html">TIRES</a></li>
									<li><a href="parts.html">DISC BREAKS</a></li>
							  </ul>
						 </li>      
						 <li class="dropdown1"><a href="Registration.html">MANAGEMENT</a>
							 <ul class="dropdown2">
									<li><a href="Registration.html">REGISTER</a></li>
										<li><a href="Registration.html">BOOKING</a></li>
										<li><a href="Registration.html">LIST</a></li>
										<li><a href="Registration.html">JERSEYS</a></li>
							  </ul>
						 </li>               
						 <li class="dropdown1"><a href="404.html">EXTRAS</a>
							 <ul class="dropdown2">
									<li><a href="404.html">CLASSIC BELL</a></li>
									<li><a href="404.html">BOTTLE CAGE</a></li>
									<li><a href="404.html">TRUCK GRIP</a></li>
							  </ul>
						 </li>
						  <a class="shop" href="cart.html"><img src="images/cart.png" alt=""/></a>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div> 				 
</div>
<!--/banner-->
<div class="parts">
	<div class="container">
    	<h2> BOOKING
        </h2>
        <br>
        <br>
        <br>
        <form id="BookingForm">
      
            Name:
            <input type="text" id="name" name="name" class="form-control"><br><br>
            Matric Number:
            <input type="text" id="matric" name="matric" class="form-control" ><br><br>
            Type of Bicycle:
            <input type="text" id="address" name="address" class="form-control"><br><br>
            Date Rent:
            <input type="text" id="phone" name="phone" class="form-control"><br><br>
            Date Return:
            <input type="text" id="email" name="email" class="form-control"><br><br>
            Charge:
            <input type="text" id="email" name="email" class="form-control"><br><br>
		</form>
        <button class="btn btn-success" id="btnSubmit">
        	Submit
        </button>
	</div>
</div>
<!---->
<div class="footer">
	 <div class="container wrap">
		<div class="logo2">
			 <a href="index.html"><img src="images/logo2.png" alt=""/></a>
		</div>
		<div class="ftr-menu">
			 <ul>
				 <li><a href="bicycles.html">BICYCLES</a></li>
				 <li><a href="parts.html">PARTS</a></li>
				 <li><a href="accessories.html">ACCESSORIES</a></li>
				 <li><a href="404.html">EXTRAS</a></li>
			 </ul>
		</div>
		<div class="clearfix"></div>
	 </div>
</div>
<!---->
<script>
	$("#btnSubmit").on("click", function(){
		var name=$("#name").val();
		var matric=$("#matric").val();
		var address=$("#address").val();
		var phone=$("#phone").val();
		var email=$("#email").val();
		if(name===""){
				alert("Please enter name");
			}
		else if(matric===""){
				alert("Please enter matric number")
			}
		else if(address===""){
				alert("Please enter address")
			}
		else if(phone===""){
				alert("Please enter number phone")
			}
		else if(email===""){
				alert("Please enter email")
			}
		else{
				var data={
					name:name,
					matric:matric,
					address:address,
					phone:phone,
					email:email
					};
					$.ajax({
						url:"RegisterCustomer.php",
						timeout: 60000,
						data: data,
						type: "POST",
						success: function(reply){
							var obj = JSON.parse(reply);
							if(obj.status){
								alert(obj.msg);
								document.getElementById("RegistrationForm").reset();
							}
							else if(!obj.status){
								alert(obj.msg);
							}
							else{
								alert(reply);
							}
						},
						error: function(xx, xxx, err){
							alert("Error: " +err);
						}
					});
				alert("Hi "+ name + " "+ matric + " "+ address + " "+ phone + " " +email);
		}
		});
</script>
</body>
</html>

