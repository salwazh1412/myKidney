<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

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
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"> -->



	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		option{
			color:#000;
		}
		label{
			color:#fff;
		}
		.gtco-container input{
			color:#000;
		}
		.gtco-container select{
			color:#000;
		}
	</style>
	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
                
                
                <div class="col-xs-2">
					<!-- <div id="gtco-logo"><a href="index.php">MyKidney</a></div> -->
                    <div id="gtco-logo"><a href="index.php"><img src="images/Logo.png" style="width:170px;"></a></div>
				</div>
				<div class="col-xs-8 text-center menu-1">
					<br>
                    <ul>
						<li class="active"><a href="AdminHome.php">Home</a></li>
				        <li><a href="">Search</a></li>
                        <li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
            
                
                
                
                <div class="col-xs-2 text-right hidden-xs menu-2">
                <ul>
                <?php if (isset($_SESSION['usr_id'])) { ?>
                   
                        <li><a href="profile.php">logged in as as <?php echo $_SESSION['usr_name']; ?></a></li>
                        <li class="btn-cta"><a href="logout.php"><span>Logout</span></a></li>
                       
                        <?php }
                        else{ 
                            
                        echo "<br><li class='btn-cta2'><a href='Login.php'><span> <div align='center'>Login</div></span></a></li>
                        <ul><li class='btn-cta'><a href='signup.php'><span>Sign Up</span></a></li></ul>";
                        ?>
                        
                        
                </ul>
                <?php } ?>
                    

                    
				</div>
			</div>

		</div>
	</nav>
