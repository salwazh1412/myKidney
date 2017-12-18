<?php
    include("HeaderAdmin.php");
?>

        
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
                    
					<form action='AddAccount.php' method='post' class='col-md-6 animate-box' Style='margin-left:80px;' enctype="multipart/form-data">
				        
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
								<label for="phone">Phone</label>
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
                 
                 
                        <div class="row form-group">
							<div class="col-md-12">
							<!--	<label for="test" >Test</label>
                                <input type="file" id="test" name="test" size="40"  > --> 
                                 <input type="hidden" name="MAX_FILE_SIZE" value="5632000">

                             <label for='file'>Filename:</label> <input type="file" name="file" id="file" style="cursor: pointer;">
                                
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


if (isset($_POST['Add']))
{
 
    $Type = $_POST['type'];
    $username = $_POST['username'];
    $Fname = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);    
               

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
                
                
                // -------------------- FILE ---------------------- //
                
                    $temp = explode('.', $_FILES['file']['name']);
                    $extn = strtolower(end($temp));
                    if(($extn == "doc") || ($extn == "docx") || ($extn == "pdf")) {
                        // Filetype is correct. Check size

                    if($_FILES['file']['size'] < 5632000) {
                        // Filesize is below maximum permitted. Add to the DB.
                        $mime = $_FILES['file']['type'];
                        $size = $_FILES['file']['size'];
                        $name = $_FILES['file']['name'];
                        $tmpf = $_FILES['file']['tmp_name'];
                        $file = fopen($_FILES['file']['tmp_name'], "rb");

                        try {
                            
                            // insert into Donor / Patient table
                            
                            $sql3 = "INSERT INTO ".$tableName." (User_ID, Name, Email, Phone, City, Blood_Type, Date_of_Birth, Diabetes, LowPressure, HighPressure, Test) VALUES (".$row['ID'].",'".$Fname."','".$email."',".$phone.",'".$city."','".$bloodType."',".$BD.",'".$diabetes."','".$LowPressure."','".$HighPressure."','".$_FILES['file']['name']."')";

                            $stmt = $conn->prepare($sql3);
                            

                            $target='./Tests/';


                            // Bind Values
                            $stmt->bindParam(1, $appID, PDO::PARAM_INT, 11);
                            $stmt->bindParam(2, $uaID, PDO::PARAM_INT, 11);
                            $stmt->bindParam(3, $uID, PDO::PARAM_INT, 11);

                            $stmt->bindParam(5, $applicationKey, PDO::PARAM_STR, 8);
                            $stmt->bindParam(6, $name, PDO::PARAM_STR, 256);
                            $stmt->bindParam(7, $mime, PDO::PARAM_STR, 128);
                            $stmt->bindParam(8, $size, PDO::PARAM_INT, 20);
                            $stmt->bindParam(9, $file, PDO::PARAM_LOB);

  

                            if ( ! $stmt->execute() )
                            {  
                                 $Added = false;

                            }
                                else
                                    $Added = true;
                            
                        move_uploaded_file($_FILES["file"]["tmp_name"], $target.$_FILES["file"]["name"]);

                            
                            } catch(PDOException $e) {    echo "Error: " . $e->getMessage(); }

                        } else {
                                // Filesize is over our limit. Send error message
                                $error = "Your file is too large.";
                            }
                    }
                    else 
                    {$error = "Your file was the incorrect type.";}
                    
                        
                        //move_uploaded_file($_FILES['file']['name'], $target);

            
                }
    
            
             elseif ($Type == 2)
                
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




include ('footer.html');
?>
