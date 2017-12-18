<?php
 require ('connection.php');


//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {

	$name =  $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$blood = $_POST['blood'];
	$city = $_POST['city'];
	$dob = $_POST['dob'];
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	$q3 = $_POST['q3'];

	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}

    if ($_SESSION['usr_level'] == 3)
        $Level = 'patient';
    
    elseif ($_SESSION['usr_level'] == 4)
        $Level = 'donor';


	if (!$error) {
		$sql = "INSERT INTO ".$Level." (User_ID, Name, Email, Phone, Blood_Type, City, Date_of_Birth, Diabetes, LowPressure, HighPressure)
		VALUES (".$_SESSION['usr_id'].", '".$name."', '".$email."', ".$phone.", '".$blood."', '".$city."', '".$dob."', '".$q1."', '".$q2."', '".$q3."')";
		
        $stmt = $conn->prepare($sql);
        
        
        if($stmt->execute())
		{
		 	header("Location: HomePD.php");
		} else {
			$errormsg = "Error in registering...Please try again later! <br>";
		}
	}
}
?>
<?php include("header.php") ?>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">

	<div id="gtco-started" Style="background: rgba(0, 0, 0, 0);">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                      <br><br><br><br><br><h2>Sign Up</h2>
				</div>
			</div>

			<!-- STEP 2 -->
		    <div class="row animate-box">
				<div class="col-md-12">
						<h4 class="text-center" style="color:#fff">STEP 2</h4>
				<?php if (isset($errormsg)) {  ?>
				<div class="alert alert-danger">
				<span class="text-center"><?php echo $errormsg; ?></span>
				</div>
				<?php } ?>
				<?php if (isset($successmsg)) {  ?>
					<div class="alert alert-success">
					<span class="text-center"><?php echo $successmsg; ?></span>
					</div>
				<?php } ?>

				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
					<div class="col-md-6 col-sm-12">
							<div class="form-group">

					<p><input type="text" name="name" placeholder="Name" required value="<?php if($error) echo $name; ?>" class="form-control" /></p>
					<p><input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span></p>
					<p><input type="text" name="phone" placeholder="Phone No." required value="<?php if($error) echo $phone; ?>" class="form-control" /></p>
					<p><input type='text' class="form-control" name="dob" id="dob" placeholder="Date of Birth" required value="<?php if($error) echo $dob; ?>" /></p>


				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="form-group">
						<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
						<script type="text/javascript" src="js/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
						<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
				<script type="text/javascript">
					$('#dob').datetimepicker({
						pickTime: false,
						autoclose: 1,
						format: 'yyyy-mm-dd',
						weekStart: 1,
						todayBtn:  1,
						todayHighlight: 1,
						startView: 2,
						minView: 2,
						forceParse: 0
					});

				</script>

				<p><select name="city" required class="form-control">
                                  <option value="" disabled selected hidden="hidden">Select city</option>
                                  <option value="Abha" >Abha</option>
                                  <option value="AlBahah" >AlBahah</option>
                                  <option value="Dammam">Dammam</option>
                                  <option value="Jeddah" >Jeddah</option>
                                  <option value="Makkah" >Makkah</option>                                   
                                  <option value="Taif">Taif</option>
                                  <option value="Riyadh">Riyadh</option>
                                  <option value="Hail" >Hail</option>
                                  <option value="Tabuk">Tabuk</option>
					</select></p>

                    
				<p><select name="blood" required class="form-control">
						<option value="" selected disabled hidden="hidden">Choose Blood Type</option>
						<option value="A+">A+</option>
						<option value="B+">B+</option>
						<option value="O+">O+</option>
						<option value="AB+">AB+</option>
						<option value="A-">A-</option>
						<option value="B-">B-</option>
						<option value="O-">O-</option>
						<option value="AB-">AB-</option>
					</select></p>
					<p>
							<label for="q1">Do you Suffer from Diabetes ?</label>
							<input type="radio" required name="q1" value="Yes"> <label>Yes</label>
							<input type="radio" required name="q1" value="No"> <label>No</label>
					</p>
					<p>
							<label for="q2">Do you Suffer from Low Blood Pressure ?</label>
							<input type="radio" required name="q2" value="Yes"> <label>Yes</label>
							<input type="radio" required name="q2" value="No"> <label>No</label>
					</p>
					<p>
							<label for="q3">Do you Suffer from High Blood Pressure ?</label>
							<input type="radio" required name="q3" value="Yes"> <label>Yes</label>
							<input type="radio" required name="q3" value="No"> <label>No</label>
					</p>

				</div>
			</div>
				<input type="hidden" name="signup">


						<div class="col-md-12 col-sm-12">
						<P><button type="submit" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 1); color:#52d3aa;">Step 2 - Sign Up</button></P>

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
