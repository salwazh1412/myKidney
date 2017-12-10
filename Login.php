<!----------------------- PHP Code ---------- -->
<?php

 require ('connection.php');

if(isset($_SESSION['usr_id'])!= "") {
	header("Location: index.php");
}



//check if form is submitted
if (isset($_POST['login'])) {

	
	$sql1 = "SELECT * FROM Users WHERE User_Name = '".$_POST['user_name']."' and password ='".md5($_POST['password'])."'";
    $stmt=$conn->prepare($sql1);
    $stmt->execute();
    
	if ($row = $stmt->fetch()) {
		$_SESSION['usr_id'] = $row['ID'];
		$_SESSION['usr_name'] = $row['User_Name'];
		$_SESSION['usr_level'] = $row['Level'];
		header("Location:index.php");
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


