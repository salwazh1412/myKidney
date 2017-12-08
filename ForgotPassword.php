<!DOCTYPE HTML>

     <!-------------- PHP Code --------------->
<?php
 require ('connection.php');
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
        
 if (isset($_GET['sent']))
 {
     $sent = $_GET['sent'];
 }
else 
    $sent = "non";

if ( isset ($_POST['send']))
{

    $sql1='SELECT count(*) FROM Donor WHERE Email ="'.$_POST['email'].'"';   
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $row1 = $stmt->fetchColumn();
    
    $sql2='SELECT count(*) FROM patient WHERE Email ="'.$_POST['email'].'"';   
    $stmt = $conn->prepare($sql2);
    $stmt->execute();
    $row2 = $stmt->fetchColumn();

    $sql3='SELECT count(*) FROM staff WHERE Email ="'.$_POST['email'].'"';   
    $stmt = $conn->prepare($sql3);
    $stmt->execute();
    $row3 = $stmt->fetchColumn();

    if ($row1==0 && $row2==0 && $row3==0)
    {
        header('location:forgotpassword.php?notfound=true');    
    }
    else {
    
$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'mykidney.sa@gmail.com';          // SMTP username
$mail->Password = 'mykidney.sa12345'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@MyKidney.com', 'MyKidney');
//$mail->addReplyTo('mhghamdi@hotmail.com', 'CodexWorld');
$mail->addAddress(''.$_POST['email']);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
$randPass = generatePassword();
$bodyContent = 'Hi, You recently requested a password reset.';
$bodyContent .= '<p>Your new password is'.$randPass.'</b></p>';
$bodyContent .= '<p>Thanks</b></p>';

$mail->Subject = 'Reset your password on MyKidney';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    $sent = 'false';
} else {
    //echo 'Message has been sent';
    $sent = 'true';
    echo "<script type='text/javascript'>document.getElementById('email').style.display = 'none';</script>";
    //echo "<script> document.getElementById('email').style.display = 'none'; </script>";
    header('location:forgotpassword.php?sent=true');
    
}
}
}
/////////////////   genrate password code
function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}
?>

<!-- END of send email PHP Code -->


<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyKidney | Reset Password </title>
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

 <!--------- JavaScript ------------>
    
<link rel="stylesheet" href="css/colorbox.css"/>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script>
      //function openColorBox(){
      //    $.colorbox({iframe:false, width:"50%", height:"50%" });
         // setTimeout($.colorbox.close(), 5000);
          
    //      setTimeout(function() {
      //      $(openColorBox()).fadeOut('fast');
    //        }, 5000);
  //    }
 


</script>
    
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
					<br><ul>
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
						<br> <li class="btn-cta2"><a href="Login.php"><span> <div align="center">Login</div>   </span></a></li>
					</ul>
					<ul> 
						<li class="btn-cta"><a href="index.php#Signup"><span>Sign Up</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg); height:170px;">
        
	</header>
  	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h3 class= "text-center"; Style="color:gray; margin-top:-80px; <?php echo (isset($_GET['sent'])) == true ?  "display:none;" : "display:block;"?>">Reset Forgotten Password</h3>
                    
                    <p <?php echo (isset($_GET['notfound']) == true) ?  "Style='display:block;'" : "Style='display:none;'"?>><span Style="color:red; text-align:center;"> User not found
                        
                       <!-- <lable class="form-control" Style="color:white; border:0px; text-align:center; background:rgba(230, 79, 79,.3); width:200; align:center;" >  User not found  </lable> -->
                        
                       
                        
                        </span> </p>
                    
                    <p <?php echo (isset($_GET['sent'])) == true ?  "Style='display:none;'" : "Style='display:block;'"?>> Please enter the email address for your account. You will be emailed a new password. </p>
					<form action="Forgotpassword.php" method="post" <?php echo (isset($_GET['sent'])) == true ?  "Style='display:none;'" : "Style='display:block;'"?>>
						<div class="row form-group">
							<div class="col-md-5">
								<input type="email" name="email" id="email" class="form-control" placeholder="Your email address">
							
                                <label><?php 
                                    if ($sent == 'true') 
                                            echo " <script>  openColorBox(); </script>";
                                        elseif ($sent == 'false') 
                                            echo "NOT SENT :/"; ?>
                                </label>
                            </div>
						</div>

						<div class="form-group">
							<input type="submit" value="Send" id="send" name="send" class="btn btn-primary">
						</div>

					</form>		
                    
                   <!-------------- SENT ---------------> 
                <div class="col-md-12" <?php echo (isset($_GET['sent'])) == true ?  "Style='display:block;'" : "Style='display:none;'"?>>
                    
					<div Style="margin-top:-50px;" class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon" Style="zoom:1.2;">
							 <i class="icon-check" ></i> 
                            <!--<img src="images/OK.png" width="60px" Style="margin-top:20px"> -->
						</span>
                 <h1 Style=" color:gray;">Mail Sent Successfully !</h1>
                <h4 Style=" color:gray;">A new password has been successfully sent to your e-mail</h4>
				<a href="Login.php">Login now</a>
                </div>
                  
				</div>

			</div>
			
		</div>
	</div>      
    
<!------ Footer -------->		
<?php

include ('footer.html');
?>