<!----------------------- PHP Code ---------- -->
<?php

include ("connection.php");

if(isset($_SESSION['usr_id']) == "") {
	header("Location: login.php");
}

include_once 'dbconnect.php';
    $userid = $_SESSION['usr_id'];

  	$getUser = mysqli_query($con, "SELECT * FROM Users WHERE ID = '" . $userid. "'");
    $row = mysqli_fetch_array($getUser);

		if ($row['Level'] == 'Donor'){
			$tableprofile = 'donor';
		}elseif($row['Level'] == 'Patient'){
			$tableprofile = 'patient';
		}
  	$getDonorUser = mysqli_query($con, "SELECT * FROM $tableprofile WHERE User_ID = '" . $userid. "'");
    $rowDonor = mysqli_fetch_array($getDonorUser);
//check if form is submitted
if (isset($_POST['updateprofile'])) {
  if ($row['Level'] == 'Donor'){
	$username   = mysqli_real_escape_string($con, $_POST['username']);
	$email      = mysqli_real_escape_string($con, $_POST['email']);
	$phone      = mysqli_real_escape_string($con, $_POST['phone']);
	$blood      = mysqli_real_escape_string($con, $_POST['blood']);
	$city       = mysqli_real_escape_string($con, $_POST['city']);
	$UpdateQuery     = "UPDATE donor SET
    Name = '$username',
    Email = '$email',
    Phone = '$phone',
    Blood_Type = '$blood',
    City = '$city' WHERE User_ID = '$userid'";
	if (mysqli_query($con,$UpdateQuery)) {
		// $_SESSION['usr_id'] = $row['ID'];
		// $_SESSION['usr_name'] = $row['User_Name'];
		// $_SESSION['usr_level'] = $row['Level'];
		// header("Location: profile.php?success");
    $errormsg = "Profile Updated";
	} else {
		$errormsg = "COULDN'T UPDATE YOUR PROFILE";
	}
}elseif($row['Level'] == 'Patient'){

	$username   = mysqli_real_escape_string($con, $_POST['username']);
	$email      = mysqli_real_escape_string($con, $_POST['email']);
	$phone      = mysqli_real_escape_string($con, $_POST['phone']);
	$blood      = mysqli_real_escape_string($con, $_POST['blood']);
	$city       = mysqli_real_escape_string($con, $_POST['city']);
	$dateofbirth       = mysqli_real_escape_string($con, $_POST['dateofbirth']);
	$UpdateQuery     = "UPDATE patient SET
    Name = '$username',
    Email = '$email',
    Phone = '$phone',
    Blood_Type = '$blood',
    Date_of_Birth = '$dateofbirth',
    City = '$city' WHERE User_ID = '$userid'";
	if (mysqli_query($con,$UpdateQuery)) {
		// $_SESSION['usr_id'] = $row['ID'];
		// $_SESSION['usr_name'] = $row['User_Name'];
		// $_SESSION['usr_level'] = $row['Level'];
		// header("Location: profile.php?success");
    $errormsg = "Profile Updated";
	} else {
		$errormsg = "COULDN'T UPDATE YOUR PROFILE";
	}

}
}

if(isset($_POST['updatePassword'])){
	$oldPass	   = mysqli_real_escape_string($con, $_POST['oldPass']);
	$NewPass	      = mysqli_real_escape_string($con, $_POST['NewPass']);
	$NewPassconf	      = mysqli_real_escape_string($con, $_POST['NewPassconf']);
	if($NewPass == $NewPassconf){
	if($row['Password'] == md5($oldPass)){
		$UpdateQuery     = "UPDATE users SET Password = '".md5($NewPassconf)."' WHERE ID = '" . $userid. "'";
		if (mysqli_query($con,$UpdateQuery)) {
			$errormsg = "Password Updated";
		}else{
			$errormsg = "Couldn't Update Your Password";
		}
	}else{
		$errormsg = "Old Password is not correct";
	}
	}else{
		$errormsg = "Password and Confirm Password doesn't match";
	}


}
?>

<?php include("header.php") ?>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">

	<div id="gtco-started" Style="background: rgba(0, 0, 0, 0);">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
                      <br><br><br><h2>PROFILE</h2>
				</div>
			</div>
		    <div class="row animate-box">
				<div class="col-md-12">
          <?php if(isset($errormsg)){?> <div class="alert alert-info">
             <?php echo $errormsg; ?>
          </div><?php } ?>
          <div class="">
            <!-- <div class="panel-heading">
              My Profile
            </div> -->
            <div style="color:#fff">

              <div class="row" id="profilebody">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <div class="col-md-4 com-sm-6">
                  Name: <?php echo $row['User_Name'] ?>
                </div>
                <div class="col-md-4 com-sm-6">
                  Email: <?php echo $rowDonor['Email'] ?>
                </div>
                <div class="col-md-4 com-sm-6">
                  Phone: <?php echo $rowDonor['Phone'] ?>
                </div>
                <div class="col-md-4 com-sm-6">
                  Blood Type: <?php echo $rowDonor['Blood_Type'] ?>
                </div>
                <div class="col-md-4 com-sm-6">
                  City: <?php echo $rowDonor['City'] ?>
                </div>
                <?php if ($row['Level'] == 'Patient'){ ?>

                <?php } ?>
              </div>
              <div class="row" id="UpdateProfile">

                <div class="col-md-4 com-sm-6">
                  Name:
                  <input type="text" name="username" value="<?php echo $row['User_Name'] ?>" class="form-control">

                </div>
                <div class="col-md-4 com-sm-6">
                  Email:
                  <input type="email" name="email" value="<?php echo $rowDonor['Email'] ?>" class="form-control">
                </div>
                <div class="col-md-4 com-sm-6">
                  Phone:
                  <input type="number" name="phone" value="<?php echo $rowDonor['Phone'] ?>" class="form-control">
                </div>
                
                <div class="col-md-4 com-sm-6">
                  Blood Type:
                  <select name="blood" id="bloodType" required class="form-control">
          						<option value="" selected disabled hidden="hidden">Choose Blood Type</option>
          						<option value="A+">A+</option>
          						<option value="B+">B+</option>
          						<option value="O+">O+</option>
          						<option value="AB+">AB+</option>
          						<option value="A-">A-</option>
          						<option value="B-">B-</option>
          						<option value="O-">O-</option>
          						<option value="AB-">AB-</option>
          					</select>
                </div>
                <div class="col-md-4 com-sm-6">
                  City:
                  <select name="city" required id="selectCity" class="form-control">
          						<option value="" selected disabled hidden="hidden">Choose City</option>
          						<option value="Riyadh">Riyadh</option>
          						<option value="Jeddah">Jeddah</option>
          						<option value="Dammam">Dammam</option>
          						<option value="Makkah">Makkah</option>
          						<option value="Other">Other</option>
          					</select>
                </div>
                <?php if ($row['Level'] == 'Patient'){ ?>
                  <div class="col-md-4 com-sm-6">
                    Date Of Birth:
                    <input type="date" name="dateofbirth" value="<?php echo $rowDonor['Date_of_Birth'] ?>" class="form-control">
                  </div>
                  <!-- <div class="col-md-4 com-sm-6">
                    Phone:
                    <input type="number" name="phone" value="<?php echo $rowDonor['Phone'] ?>" class="form-control">
                  </div>
                  <div class="col-md-4 com-sm-6">
                    Phone:
                    <input type="number" name="phone" value="<?php echo $rowDonor['Phone'] ?>" class="form-control">
                  </div> -->
                <?php } ?>
              </div>

              <input type="hidden" name="updateprofile" />
            </div>
            <hr />
            <div class="">
              <button type="button" id="editprodilebtn" class="btn btn-primary">Edit Profile</button>
              <button type="submit" id="editfromformBtn" class="btn btn-success">Update</button>
            </div>
            </form>
          </div>
					<hr />
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
	                     <h2>UPDATE PASSWORD</h2>
					</div>
				<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="col-md-4 col-sm-4">
							<p><input type="password" class="form-control" name="oldPass" placeholder="Old Password" required > </p>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="form-group">

                <p><input type="password" name="NewPass" class="form-control" placeholder="New Password" required></p>

							</div>
						</div>

						<div class="col-md-4 col-sm-4">
							<p><input type="password" name="NewPassconf" class="form-control" placeholder="Confirm New Password" required></p>
						</div>
						<input type="hidden" name="updatePassword" />
						<P><button type="submit" name="login" id="login" class="btn btn-default btn-block" Style="background: rgba(255, 255, 255, 1); color:#52d3aa;">Update Password</button></P>

					</form>
				</div>
		    </div>
		</div>
	</div>
	</header>

<!------ Footer -------->
<?php
include ('footer.html');
?>
<script>
  $('#bloodType').val('<?php echo $rowDonor['Blood_Type'] ?>');
  $('#selectCity').val('<?php echo $rowDonor['City'] ?>');
  $('#UpdateProfile').hide();
  $('#editfromformBtn').hide();
  $('#editprodilebtn').on('click',function () {
      $('#profilebody').fadeOut('fast');
      $('#editprodilebtn').fadeOut('fast');
      $('#UpdateProfile').fadeIn('fast');
      $('#editfromformBtn').fadeIn('fast');
  })
</script>
