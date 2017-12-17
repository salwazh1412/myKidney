<?php

require ('connection.php');

include_once ('dbconnect.php');

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
	$user_name =  $_POST['user_name'];
	$password =  $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$level = $_POST['level'];

	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}

	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}

	if (!$error) {
           
       $sql= "INSERT INTO Users (User_Name, Password, Level) VALUES('".$user_name."','".md5($password)."', '".$level."')";
		          
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        {

			$sql2 = "SELECT * FROM Users WHERE User_Name = '".$user_name."' and password = '".md5($password)."'";
        
                $stmt = $conn->prepare($sql2);
                $stmt->execute();
        
			if ($row = $stmt->fetch()) {
				$_SESSION['usr_id'] = $row['ID'];
				$_SESSION['usr_name'] = $row['User_Name'];
				$_SESSION['usr_level'] = $row['Level'];
                
				header("Location:user_information.php");
			}

    }
    } else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}

?>
<?php include("header.php") ?>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		<style>
			option{
				color:#000;
			}
		</style>
	<div id="gtco-started" Style="background: rgba(0, 0, 0, 0);">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                      <br><br><br><br><br><h2>Sign Up</h2>
				</div>
			</div>
			<!-- STEP ONE -->
			<div class="row animate-box">
                				
                <div class="col-md-3">

                </div>
				
                <div class="col-md-6">
					<h4 class="text-center" style="color:#fff">STEP 1</h4>
				<?php if (isset($errormsg)) {  ?>
				<div class="alert alert-danger">
				<span class="text-center"><?php echo $errormsg; ?></span>
				</div>
				<?php } ?>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
					<div class="col-md-12 col-sm-12">
							<div class="form-group">
					<p>
							<select name="level" required class="form-control">
									<option selected hidden="hidden" disabled value="">Choose User Type</option>
									<option value="4">Donor</option>
									<option value="3">Patient</option>
				            </select>
                        
                        

                    
					<p><input type="text" name="user_name" placeholder="User Name" required value="<?php if($error) echo $user_name; ?>" class="form-control" /></p>

					<p><input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span></p>
					<p><input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span></p>

					<input type="hidden" name="signup">
				</div>
			</div>


						<P><button type="submit" name="Signup" id="Signup" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 1); color:#52d3aa;">Step 1 - Next</button></P>
                    </form>

                    </div>

                <div class="col-md-3">

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
