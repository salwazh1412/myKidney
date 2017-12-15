<?php

require ("connection.php");

require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';

if (isset($_POST['send']))
{
    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'mykidney.sa@gmail.com';          // SMTP username
$mail->Password = 'mykidney.sa12345'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom($email, $fName." ".$lName);
//$mail->addReplyTo('mhghamdi@hotmail.com', 'CodexWorld');
$mail->addAddress('mykidney.sa@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
//$bodyContent = 'Hi, You recently requested a password reset.';

$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    //$sent = 'false';
    header('location:contact.php?sent=false');

} else {
    //echo 'Message has been sent';
   // $sent = 'true';
    //echo "<script type='text/javascript'>document.getElementById('email').style.display = 'none';</script>";
    //echo "<script> document.getElementById('email').style.display = 'none'; </script>";
    header('location:contact.php?sent=true');
    

}
    
}

?>

<!DOCTYPE HTML>
<?php 


if (! isset($_SESSION['usr_level']))
{

echo '<html>

	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney | About</title>
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
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-2">
                    <div id="gtco-logo"><a href="index.php"><img src="images/Logo.png" style="width:170px;"></a></div>
				</div>
				<div class="col-xs-8 text-center menu-1">
				<div><br></div>

                    <ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="Search.php">Search</a></li>
                        <li><a href="about.php">About</a></li>
						<li class="active"><a href="contact.php">Contact</a></li>

					</ul>
				</div>
				<div class="col-xs-2 text-right hidden-xs menu-2">
                    <ul>
                        <li class="btn-cta2"><a href="Login.php"><span> <div align="center">Login</div>   </span></a></li>
					</ul>
					<ul>
                        <li class="btn-cta"><a href="#Signup"><span>Sign Up</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav> ';

} elseif (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))

{
    
echo '    
  <!DOCTYPE HTML>


<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />


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
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-2">
					<!-- <div id="gtco-logo"><a href="index.php">MyKidney</a></div> -->
                    <div id="gtco-logo"><a href="HomePD.php"><img src="images/Logo.png" style="width:170px;"></a></div>
				</div>
				<div class="col-xs-8 text-center menu-1">
					<br>
                    <ul>
						<li><a href="HomePD.php">Home</a></li>
				        <li><a href="Search.php">Search</a></li>
                        <li ><a href="about.php">About</a></li>
						<li class="active"><a href="contact.php">Contact</a></li>
						<li><a href="Requests.php">Requests</a></li>
					</ul>
				</div>
                
                
                <div class="col-xs-2 text-right hidden-xs menu-2">
                <ul>
                
                   
                        <br>
                        <li class="btn-cta" style="margin:-10px;"><a href="logout.php"><span>Logout</span></a></li>
                        <br><li style="margin-left:-200px;"><a href="MyProfile.php">My Profile </a></li>
                        
                        
                </ul>

                    

                    
				</div>
			</div>
			
		</div>
	</nav>  ';
}
?>

<script>
        
function checkEmail() {
    var email_x = document.getElementById("email").value;
    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email.value)) {
        document.getElementById("email").style.border = "3px solid green";
        return true;
    } else {
        document.getElementById("email").style.border = "3px solid red";
            return false;
    }
 }        
        
</script>		

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image:url(images/img_bg_1.jpg);">

		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Get In Touch</h1>
							<h2>Contact us if you need any help</h2> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
                				
                    <?php 
                        if (isset($_GET['sent']) && $_GET['sent'] == 'true')
                            echo "<div Style='color:green; text-align:center;'>Thank you! your message has been sent successfully.</div><br><br>";
                    
                        elseif (isset($_GET['sent']) && $_GET['sent'] == 'false')
                            echo "<div Style='color:red; text-align:center;'>Sorry, message could not be sent. Please try again </div><br><br>";
                        
                    ?>
                
				<div class="col-md-6 animate-box">

                    
                    <h3>Get In Touch</h3>
					<form action="contact.php" method="post">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">First Name</label>
								<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname" required>
							</div>
							<div class="col-md-6">
								<label for="lname">Last Name</label>
								<input type="text" id="lname" name="lname" class="form-control" placeholder="Your lastname">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Your email address" required onchange="checkEmail();">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Message</label>
								<textarea name="message" id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Write us something" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" id="send" name="send" value="Send Message" class="btn btn-primary">
						</div>

					</form>		
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="gtco-contact-info">
						<h3>Contact Information</h3>
						<ul>
							<!-- <li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li> -->
							<li class="phone"><a href="tel://0555705464">+966 55 570 5464</a></li>
							<li class="email"><a href="mailto:mykidney.sa@gmail.com">mykidney.sa@gmail.com</a></li>
							<li class="url"><a href="http://gettemplates.co">www.mykidney.com.sa</a></li>
						</ul>
					</div>

				</div>
			</div>
			
		</div>
	</div>
<!--
	<div class="gtco-cover gtco-cover-sm" style="background-image:url(images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Keep it simple</h1>
							<h2>Free html5 templates Made by <a href="http://gettemplates.co" target="_blank">gettemplates.co</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->

<!------ Footer -------->		
<?php
include ('footer.html');
?>


