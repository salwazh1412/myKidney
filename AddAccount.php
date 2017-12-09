<!DOCTYPE HTML>

 <?php 
require ('connection.php'); 

// If no session value is present, redirect the user to the login page:
//if (!isset($_SESSION['usr_id']) || ($_SESSION['Level'] != 1))
//	{
//		header('location:login.php');
//	}//end if statement

//$sessionID=$_SESSION['usr_id'];	
//$sessionLevel=$_SESSION['usr_level'];	

if (isset($_POST['Add']))
{

    
    $Type = $_POST['type'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];    
               

    // insert into users table
    $sql1 = "INSERT INTO users (User_Name, Password, Level) VALUES ('".$username."','".$password."','".$Type."')";
    
    $stmt = $conn->prepare($sql1);

    if ( ! $stmt->execute() ){
        //die ("Error while execute query, The Error is: ".mysql_error ()); 
             $Added = false;
   
    }
    
    else {

            /// get ID

            $sql2 = "SELECT ID FROM users where User_Name = '".$username."'";

            $stmt = $conn->prepare($sql2);

            if ( ! $stmt->execute() )
                die ("Error while execute query, The Error is: ".mysql_error ()); 
        
            elseif ($Type == 3 || $Type == 4)
            {
                    $phone = $_POST['phone'];
                    $city = "";
                    $city = $_POST['city'];
                    $bloodType = "";
                    $bloodType = $_POST['BloodType'];
                    $rawdate = htmlentities($_POST['BD']);
                    $BD = date('Y-m-d', strtotime($rawdate));
                    $diabetes = $_POST['diabetes'];
                    $LowPressure = $_POST['LowPressure'];
                    $HighPressure = $_POST['HighPressure'];
                
                    $row = $stmt->fetch();
                    if ($Type == 3)
                        $tableName = 'patient';
                    elseif ($Type == 4)
                        $tableName = 'donor';

                
                    // insert into Donor / Patient table
                    $sql3 = "INSERT INTO ".$tableName." (User_ID, Name, Email, Phone, City, Blood_Type, Date_of_Birth, Diabetes, LowPressure, HighPressure) VALUES (".$row['ID'].",'".$name."','".$email."',".$phone.",'".$city."','".$bloodType."',".$BD.",'".$diabetes."','".$LowPressure."','".$HighPressure."')";

                    $stmt = $conn->prepare($sql3);

                    if ( ! $stmt->execute() )
                    { //die ("Error while execute query, The Error is: ".mysql_error ()); 
                         $Added = false;

                    }
                        else
                            $Added = true;
            
            
            } elseif ($Type == 2)
                
                {
                    $row = $stmt->fetch();

                    // insert into staff table
                    $sql4 = "INSERT INTO staff ( Name, Email, User_ID) VALUES ('".$name."','".$email."',".$row['ID'].")";

                    $stmt = $conn->prepare($sql4);

                    if ( ! $stmt->execute() )
                    { //die ("Error while execute query, The Error is: ".mysql_error ()); 
                         $Added = false;
   
                    }
                        else

                            $Added = true;
                }
        
        
        
    }
    
}  // end of post add function



?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>myKidney | Add Account</title>
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
        
<style>
.status-available{color:green;}
.status-not-available{color:#D60202;}
</style>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>      
        
<script type="text/javascript">

$(function() {
    $('input[name="type"]').on('click', function() {
        if ($(this).val() == 2) {
            $('#notstaff').hide();
            $("#phone").prop('required',false);
            $("#BD").prop('required',false);
            $("#city").prop('required',false);
            $("#BloodType").prop('required',false);
            $("#diabetes").prop('required',false);
            $("#LowPressure").prop('required',false);
            $("#HighPressure").prop('required',false);

        }
        else {
            $('#notstaff').show();
            $("#phone").prop('required',true);
            $("#BD").prop('required',true);
            $("#city").prop('required',true);
            $("#BloodType").prop('required',true);
            $("#diabetes").prop('required',true);
            $("#LowPressure").prop('required',true);
            $("#HighPressure").prop('required',true);

        }
      });
});
    
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
    
  var checkPasswords = function() {
  if (document.getElementById('password').value ==
    document.getElementById('ConfirmPassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}

    
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
     
function checkPassLength(){
    
    if ($("#password").val().length < 8 && $("#password").val().length > 0)
        {
            document.getElementById('passMessage').style.color = 'red';
            document.getElementById('passMessage').innerHTML = 'password length should be at least 8 ';
        }
    else
           document.getElementById('passMessage').innerHTML = '';
}
    
function checkPhoneLength(){
    
    if ($("#phone").val().length != 10 && $("#phone").val().length > 0)
        {
            document.getElementById('phoneMessage').style.color = 'red';
            document.getElementById('phoneMessage').innerHTML = 'phone should be 10 digits ';
        }
    else
           document.getElementById('phoneMessage').innerHTML = '';
    
    if (isNaN($("#phone").val())){
            document.getElementById('phoneMessage').style.color = 'red';
            document.getElementById('phoneMessage').innerHTML = 'please enter numbers only';
    }
}
</script>
        
        
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
				        <!-- <li><a href="">Search</a></li>
                        <li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li> -->
					</ul>
				</div>
				<div class="col-xs-2 text-right hidden-xs menu-2">
					
                    <ul>
                    <br><li class="btn-cta2"><a href="Login.php"><span> <div align="center">Logout</div>   </span></a></li>
					</ul>
					<ul>
                      <!--  <li class="btn-cta"><a href="#Signup"><span>Sign Up</span></a></li> -->
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
					<h2 class= "text-center"; Style="color:gray; margin-top:-80px;">  Add Account </h2>			
                    <?php 
                    if (isset($Added) && $Added == 'true')
                        echo "<div Style='color:green; text-align:center;'>The account has been successfully created</div><br>";
                    elseif (isset($Added) && $Added == 'false')
                        echo "<div Style='color:red; text-align:center;'>Couldn't complete the process, please try again</div><br>";
             
                    $Added = false;

                    ?>
                    
					<form action='AddAccount.php' method='post' class='col-md-6 animate-box' Style='margin-left:80px;'>
				        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="type"> Type &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
                                 <br><p Style="margin-left:50px;">
                                    <input type="radio" name="type" value=3 > Patient 
                                    
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="type" value=4 > Donor 
                                    
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="type" value=2 > Staff </p>
							</div>
                            
						</div>
                       
                         <div class="row form-group" id="frmCheckUsername">
							<div class="col-md-12">
								<label for="username"> Username </label>
								<input type="text" id="username" name="username" class="form-control demoInputBox" placeholder="Username" onBlur="checkAvailability();" required>
                                <span id="user-availability-status"></span> 
                                <p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
							</div> 
				        </div> 

                             
					<!-- </div> -->
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="name" > Name </label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="e-mail address" required onchange="checkEmail();">
							</div>
						</div>						
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" onblur="checkPassLength()" required>
							    <span id='passMessage'></span>

                            </div>
						</div>  
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="ConfirmPassword">Confirm Password</label>
								<input type="password" id="ConfirmPassword" name="ConfirmPassword" class="form-control" placeholder="Confirm Password" onkeyup='checkPasswords();' required>
                                <span id='message'></span>
							</div>
						</div>
                        
             <div id="notstaff" Style="display:block;">
         
                        <div class="row form-group" >
							<div class="col-md-12">
								<label for="phone" >Phone</label>
								<input type="text" id="phone" name= "phone" class="form-control" placeholder="ex. 0555555555" onblur="checkPhoneLength()">
							    <span id='phoneMessage'></span>
                            </div>
						</div>       
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="BD" >Birth Date</label>
								<input type="date" id="BD" name="BD" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" >
							</div>
						</div>
                 
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="test" >Test</label>
                                <input type="file" id="test" name="test" size="40"  >
							</div>
						</div>
                 
                 

						<div class="row form-group">
							<div class="col-md-12">
								<label for="city">City</label>
                                <select class="form-control" name="city" id="city">
                                  <option value="" disabled selected>Select city</option>
                                  <option value="Abha" >Abha</option>
                                  <option value="AlBahah" >AlBahah</option>
                                  <option value="Dammam">Dammam</option>
                                  <option value="Jeddah" >Jeddah</option>
                                  <option value="Makkah" >Makkah</option>                                   
                                  <option value="Taif">Taif</option>
                                  <option value="Riyadh">Riyadh</option>
                                  <option value="Hail" >Hail</option>
                                  <option value="Tabuk">Tabuk</option>
                                </select>
							</div>
						</div>
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="BloodType">Blood Type </label>
                                <select class="form-control" name="BloodType" id="BloodType">
                                  <option value="" disabled selected>Select blood type</option>
                                  <option value="A+" >A+</option>
                                  <option value="A-" >A-</option>
                                  <option value="B+" >B+</option>
                                  <option value="B-" >B-</option>
                                  <option value="O+" >O+</option>
                                  <option value="O-" >O-</option>
                                  <option value="AB+">AB+</option>
                                  <option value="AB-">AB-</option>
                                </select>
							</div>
						</div>
                 
                        <div class="row form-group">
							<div class="col-md-12">
								<br><label for="diabetes" >Suffer from diabetes?</label>
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span Style="margin-left:50px;">
                                    <input type="radio" name="diabetes" id="diabetes" value="Yes"> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="diabetes" id="diabetes" value="No"> No </span>
							</div>
						</div>                        
                 
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone" >Suffer from Low Blood Pressure?</label>
                                <span Style="margin-left:50px;">
                                    <input type="radio" name="LowPressure" id="LowPressure" value="Yes"> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="LowPressure" id="LowPressure" value="No"> No </span>
							</div>
						</div>
                 
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone" >Suffer from High Blood Pressure?</label>
                                <span Style="margin-left:50px;">
                                    <input type="radio" name="HighPressure" id="HighPressure" value='Yes'> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="HighPressure" id="HighPressure" value='No'> No </span>
							</div>
						</div>
                 
                 
             </div>  
   
                        <div class="form-group">
                            						                         
							<input type="submit" value="Add" name = "Add" id="Add"  class="btn btn-primary">
						</div>

					</form>		
				</div>
	
			</div>
			
		</div>
	</div>
        </div>

	
	<!------ Footer -------->		
<?php
include ('footer.html');
?>
