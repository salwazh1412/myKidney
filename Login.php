<!----------------------- PHP Code ---------- -->
<?php

//include connection to database
// require ('connection.php');

// if (isset($_POST['login'])) {
    
// $myfile = fopen("AdminInfo.txt", "r") or die("Unable to open file!");
// $i=0;
// $AdminUsername;
// $AdminPassword;
// $email = $_POST["email"];
// $password = $_POST["password"];
    
// while(!feof($myfile)) {

//      if ($i==0) {
//         $AdminUsername = fgets($myfile); 
//      }else {
//         $AdminPassword = fgets($myfile);}
// $i++;         

// }
    
// fclose($myfile);

// //////////////////// Login Code redirect (Admin) ///////////////

//    $email = str_replace("@", "", $email);
//    $AdminUsername = str_replace("@", "", $AdminUsername);
    
    
//     echo (strcasecmp($email ,  $AdminUsername))."<br>";
//     echo similar_text($email,$AdminUsername)."<br>";
    
//     if ( $email == $AdminUsername && $password == $AdminPassword) {
//         //$_SESSION['Admin']=$AdminUsername;
//         header('location:AdminHome.php');
//     }
    
//     elseif ($email == $AdminUsername && $password != $AdminPassword)
//     {	
//             echo '<script> alert("Incorrect Password. Try again!"); </script>';
//     }   
    
//     else {
//         echo 'No <br>';
//         echo $AdminUsername."<br>";
//         echo $email."<br>";
//         echo $AdminPassword."<br>";
//         echo $_POST['password'];
//     }       
// }      

session_start();

if(isset($_SESSION['usr_id'])!= "") {
	header("Location: index.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM Users WHERE User_Name = '" . $user_name. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['ID'];
		$_SESSION['usr_name'] = $row['User_Name'];
		$_SESSION['usr_level'] = $row['Level'];
		header("Location: index.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>

<?php include("templates/header.php") ?>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		
	<div id="gtco-started" Style="background: rgba(0, 0, 0, 0);">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                      <br><br><br><br><br><h2>Login</h2>
				</div>
			</div>
		    <div class="row animate-box"> 
				<div class="col-md-12">
				<?php if (isset($errormsg)) {  ?>
				<div class="alert alert-danger">
				<span class="text-center"><?php echo $errormsg; ?></span>
				</div>
				<?php } ?> 
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
						<div class="col-md-4 col-sm-4">
	
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">
								<p><input type="text" class="form-control" name="user_name" id="email" placeholder="Username" required > </p>
                                
                                <p><input type="password" name="password" id="password" class="form-control" id="password" placeholder="Password" required></p>

                                <P><button type="submit" name="login" id="login" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 1); color:#52d3aa;">Login</button></P>
                                <p><a  Style="color:#efeded" href="ForgotPassword.php"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Forgot Password? </a></p>
							</div>
						</div>
                        
						<div class="col-md-4 col-sm-4">
                            
						</div>
					</form>
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


