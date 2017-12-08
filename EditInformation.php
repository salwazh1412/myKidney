<!DOCTYPE HTML>

 <?php require ('connection.php');

// If no session value is present, redirect the user to the login page:
//if (!isset($_SESSION['usr_id']) || ($_SESSION['Level'] != 1))
//	{
//		header('location:login.php');
//	}//end if statement

//$sessionID=$_SESSION['usr_id'];	
//$sessionLevel=$_SESSION['usr_level'];	

$userName=0;
$Type=4;

$userName=$_GET['ID'];
$Type=$_GET['Type'];
$updated = false;

if (isset($_POST['Save']))
{
    $sql='SELECT * FROM Staff';
                 
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    
    $updatedName = $_POST['name'];
    $updatedEmail = $_POST['email'];
    $updatedPhone = $_POST['phone'];
    $updatedCity = $_POST['city'];
    $updatedBloodType = $_POST['BloodType'];
    $rawdate = htmlentities($_POST['BD']);
    $updatedBD = date('Y-m-d', strtotime($rawdate));
    $updatedDiabetes = $_POST['diabetes'];
    $updatedLowPressure = $_POST['LowPressure'];
    $updatedHighPressure = $_POST['HighPressure'];
    
    
    if ($Type == 3) {
    $sql4 = "UPDATE Patient SET Name='".$updatedName."', Email ='".$updatedEmail."', Phone = ".$updatedPhone.",City ='".$updatedCity."', Blood_Type = '".$updatedBloodType."', Date_of_Birth = '".$updatedBD."',  Diabetes='".$updatedDiabetes."', LowPressure ='".$updatedLowPressure."',HighPressure = '".$updatedHighPressure."'   WHERE User_ID='".$userName."'";
    
    $stmt = $conn->prepare($sql4);
        
   
    if ( ! $stmt->execute())
				die ("Error while execute query, The Error is: ".mysql_error ()); 
    
    $updated = true;
    }
    
    else if ($Type == 4) {
    $sql5 = "UPDATE Donor SET Name='".$updatedName."', Email ='".$updatedEmail."', Phone = ".$updatedPhone.",City ='".$updatedCity."', Blood_Type = '".$updatedBloodType."', Date_of_Birth = '".$updatedBD."',  Diabetes='".$updatedDiabetes."', LowPressure ='".$updatedLowPressure."',HighPressure = '".$updatedHighPressure."'   WHERE User_ID='".$userName."'";
    
    $stmt = $conn->prepare($sql5);
   
    if ( ! $stmt->execute())
				die ("Error while execute query, The Error is: ".mysql_error ()); 
    
        $updated = true;
        
    }
    
}

    
    $sql1="SELECT * from Patient WHERE User_ID='$userName'";
    $sql2="SELECT * from Donor WHERE User_ID='$userName'";
    $sql3="SELECT * from Staff WHERE User_ID='$userName'";


if ($Type == 3)
{
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $row1 = $stmt->fetch();

    $name = $row1['Name']; 
    $phone = $row1['Phone']; 
    $email = $row1['Email']; 
    $bloodType = $row1['Blood_Type']; 
    $city = $row1['City']; 
    $BD = $row1['Date_of_Birth'];
    $Diabetes = $row1['Diabetes'];
    $LowPressure = $row1['LowPressure'];
    $HighPressure = $row1['HighPressure'];
}  

    elseif ($Type == 4)
    {
        $stmt = $conn->prepare($sql2);
        $stmt->execute();
        $row2 = $stmt->fetch();

        $name = $row2['Name']; 
        $phone = $row2['Phone']; 
        $email = $row2['Email']; 
        $bloodType = $row2['Blood_Type']; 
        $city = $row2['City']; 
        $BD = $row2['Date_of_Birth'];
        $Diabetes = $row2['Diabetes'];
        $LowPressure = $row2['LowPressure'];
        $HighPressure = $row2['HighPressure'];
        
    }

        
        elseif ($Type == 2)
            $stmt = $conn->prepare($sql3);
            $stmt->execute();

?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney</title>
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
	
<script>
    function updated() {
        confirm('Are you sure you want to delete?');
        setTimeout(function() {
        $('#updated').fadeOut('fast');
        }, 5000);    
    
    }



</script>
        
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-2">
					<!-- <div id="gtco-logo"><a href="index.php">MyKidney</a></div> -->
                    <div id="gtco-logo"><a href="AdminHome.php"><img src="images/Logo.png" style="width:170px;"></a></div>
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
					<h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Edit User's Information </h2>					
                    
                    <p class="#updated" id="showupdated" name="showupdated" Style="color:green; margin-left:150px;"> 
                        <?php echo $updated == true ? "The Information have been updated successfully" : "";?></p>
                    
					<form action='EditInformation.php?ID=<?php echo $userName ?>&Type=<?php echo $Type ?>' method='post' class='col-md-6 animate-box' Style='margin-left:80px;'>
				        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="Type"> Type &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
                                 <input type="radio" name="type" value="Patient" disabled = true <?php echo $Type == 3 ? 'checked': ''; ?>> Patient &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                 <input type="radio" name="type" value="Donor" disabled = true <?php echo $Type == 4 ? 'checked': ''; ?>> Donor
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                 <input type="radio" name="type" value="Donor" disabled = true <?php echo $Type == 2 ? 'checked': ''; ?>> Staff
							</div>
                            
						</div>
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="name"> Name </label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo $name; ?>" required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="e-mail address" value="<?php echo $email; ?>" required>
							</div>
						</div>
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone">Phone</label>
								<input type="text" id="phone" name= "phone" class="form-control" placeholder="Phone number" value="<?php echo $phone; ?>" required>
							</div>
						</div>       
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone">Birth Date</label>
								<input type="date" id="BD" name= "BD" class="form-control" value="<?php echo $BD; ?>" required>
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
                                <select class="form-control" name="city" id="city" required>
                                  <option value="Abha" <?php echo $city == 'Abha' ? 'selected':''?> >Abha</option>
                                  <option value="AlBahah" <?php echo $city == 'AlBahah' ? 'selected':''?>>AlBahah</option>
                                  <option value="Dammam" <?php echo $city == 'Dammam' ? 'selected':''?>>Dammam</option>
                                  <option value="Jeddah" <?php echo $city == 'Jeddah' ? 'selected':''?>>Jeddah</option>
                                  <option value="Makkah" <?php echo $city == 'Makkah' ? 'selected':''?>>Makkah</option>                                   
                                  <option value="Taif" <?php echo $city == 'Taif' ? 'selected':''?>>Taif</option>
                                  <option value="Riyadh" <?php echo $city == 'Riyadh' ? 'selected':''?>>Riyadh</option>
                                  <option value="Hail" <?php echo $city == 'Hail' ? 'selected':''?>>Hail</option>
                                  <option value="Tabuk" <?php echo $city == 'Tabuk' ? 'selected':''?>>Tabuk</option>
                                </select>
							</div>
						</div>
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="BloodType">Blood Type </label>
                                <select class="form-control" name="BloodType" required>
                                  <option value="A+" <?php echo $bloodType == 'A+' ? 'selected':''?> >A+</option>
                                  <option value="A-" <?php echo $bloodType == 'A-' ? 'selected':''?>>A-</option>
                                  <option value="B+" <?php echo $bloodType == 'B+' ? 'selected':''?>>B+</option>
                                  <option value="B-" <?php echo $bloodType == 'B-' ? 'selected':''?>>B-</option>
                                  <option value="O+" <?php echo $bloodType == 'O+' ? 'selected':''?>>O+</option>
                                  <option value="O-" <?php echo $bloodType == 'O-' ? 'selected':''?>>O-</option>
                                  <option value="AB+" <?php echo $bloodType == 'AB+' ? 'selected':''?>>AB+</option>
                                  <option value="AB-" <?php echo $bloodType == 'AB-' ? 'selected':''?>>AB-</option>
                                </select>
							</div>
						</div>
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<br><label for="phone" >Suffer from diabetes?</label>
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;<span Style="margin-left:50px;">
                                    <input type="radio" name="diabetes" value="Yes" <?php echo $Diabetes == 'Yes' ? 'checked': ''; ?>> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="diabetes" value="No" <?php echo $Diabetes == 'No' ? 'checked': ''; ?>> No </span>
							</div>
						</div>                        
                 
                        
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone" >Suffer from Low Blood Pressure?</label>
                                <span Style="margin-left:50px;">
                                    <input type="radio" name="LowPressure" value="Yes" <?php echo $LowPressure == 'Yes' ? 'checked': ''; ?>> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="LowPressure" value="No" <?php echo $LowPressure == 'No' ? 'checked': ''; ?>> No </span>
							</div>
						</div>
                 
                        <div class="row form-group">
							<div class="col-md-12">
								<label for="phone" >Suffer from High Blood Pressure?</label>
                                <span Style="margin-left:50px;">
                                    <input type="radio" name="HighPressure" value="Yes" <?php echo $HighPressure == 'Yes' ? 'checked': ''; ?>> Yes 
                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; 
                                    <input type="radio" name="HighPressure" value="No" <?php echo $HighPressure == 'No' ? 'checked': ''; ?>> No </span>
							</div>
						</div>
                 
                        

						<div class="form-group">
							<input type="submit" value="Save" name = "Save" id="Save" class="btn btn-primary">
						</div>

					</form>		
				</div>
	
			</div>
			
		</div>
	</div>


	
	<!------ Footer -------->		
<?php
include ('footer.html');
?>
