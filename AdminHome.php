<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>myKidney | Login </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!--
		Oxygen by gettemplates.co
		Twitter: http://twitter.com/gettemplateco
		URL: http://gettemplates.co
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
    
	<body>
<!------------ PHP Code ---------- -->
        
<?php
if (isset($_POST['login'])) {
}
        

?>
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-2">
					<div id="gtco-logo"><a href="index.php"><img src="images/Logo.png" style="width:150px;"></a></div>
				</div>
				<div class="col-xs-8 text-center menu-1">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="   ">Search</a></li>
					<!--	<li class="has-dropdown">
							<a href="services.html">Search</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li> -->
					<!--	<li class="has-dropdown">
							<a href="#">Tools</a>
							<ul class="dropdown">
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">Sass</a></li>
								<li><a href="#">jQuery</a></li>
							</ul>
						</li> -->
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="col-xs-2 text-right hidden-xs menu-2">
					<ul>
						<!-- <li class="btn-cta2"><a href="Login.php"><span> <div align="center">Login</div>   </span></a></li>
					</ul>
					<ul> -->
					<!-- <li class="btn-cta"><a href="index.php#Signup"><span>Sign Up</span></a></li> -->
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		
	<div id="gtco-started" Style="background: rgba(0, 0, 0, 0);">
		<div class="gtco-container">
	    <div class="row animate-box"> 
				<div class="col-md-12" Style="margin-top: 150px;">

						<div class="col-md-4 col-sm-4">

                                <P><button type="button" name="login" id="login" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 0.1); height:200px; width:200px; color:#52d3aa;">Login</button></P>

						</div>
						<div class="col-md-4 col-sm-4">

                                <P><button type="button" name="login" id="login" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 0.1); height:200px; width:200px; color:#52d3aa;">Delete Account</button></P>


						</div>


						<div class="col-md-4 col-sm-4">
                                                    
                                <P><button type="button" name="login" id="login" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 0.1); height:200px; width:200px; color:#52d3aa;">Login</button></P>
						</div>
				
				</div>
		    </div>
 			
		</div>
	</div>
        
        	       
        
        <!-- <div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn" Style="align:center" >
							
                            
                            <h1>Login</h1>

                                <p><input type="email" class="form-control" id="email" placeholder="Email" required style="width: 50%;"> </p>
                                
                                <p><input type="text" class="form-control" id="password" placeholder="Phone Number" required style="width: 50%;"></p>
                            
                                <P><button type="submit" class="btn btn-default btn-block" style="width: 50%;">Login</button></P>

                            
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</header>
	
<!------ Footer -------->		
<?php
include ('footer.html');
?>


