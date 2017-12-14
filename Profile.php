<!DOCTYPE HTML>

 <?php require ('connection.php'); 

$ID = $_GET['ID'];
$Type = $_GET['Type'];


if (isset($_SESSION['usr_level']))
{
    $Level = $_SESSION['usr_level'];
}


if (isset($_POST['Request']))
{
    
    if($Type == 4){
    
    $sql3 = "INSERT INTO requests (Patients_ID, Donor_ID , Donor_Approval , Sender, Request_Date) VALUES (".$_SESSION['usr_id'].",".$ID.",1,".$_SESSION['usr_id'].",'".date("Y-m-d H:i:s")."')";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    }    
    
    if($Type == 3){
    
    $sql3 = "INSERT INTO requests (Patients_ID, Donor_ID , Donor_Approval , Sender, Request_Date) VALUES (".$ID.",".$_SESSION['usr_id'].",0,".$_SESSION['usr_id'].",'".date("Y-m-d H:i:s")."')";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    }
    

}


if (isset($_SESSION['usr_id']))
{
    $sessionID = $_SESSION['usr_id'];
    
    $sql="SELECT count(*) from requests WHERE (Patients_ID=".$ID." AND Donor_ID = ".$sessionID." AND Sender = ".$sessionID.") OR (Donor_ID=".$ID." AND Patients_ID = ".$sessionID." AND Sender = ".$sessionID.")";   
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetchColumn();
    
    if($row > 0) 
    {
        $requested = true;
    }
    else {
        $requested = false;

    }    
    
    $sql2="SELECT count(*) from matches WHERE (Patient_ID=".$ID." AND Donor_ID = ".$sessionID.") OR (Donor_ID=".$ID." AND Patient_ID = ".$sessionID.")";   
    
    $stmt = $conn->prepare($sql2);
    $stmt->execute();
    $row = $stmt->fetchColumn();
    
    if($row > 0) 
    {
        $matched = true;
    }
    else {
        $matched = false;

    }
    
    
}



if ($Type == 3)
{
    
    $sql="SELECT * from Patient WHERE User_ID=".$ID."";            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    
} elseif ($Type == 4)
{
    $sql="SELECT * from Donor WHERE User_ID=".$ID."";            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    
} elseif ($Type == 2)
{
    $sql="SELECT * from Staff WHERE User_ID=".$ID."";            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    
}

?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney | <?php echo $row['Name']?></title>
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
						<li><a href="index.php">Home</a></li>
				         <li class="active"><a href="Search.php">Search</a></li>
                        <li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="col-xs-2 text-right hidden-xs menu-2">
					
                    <ul>
                        <br><li class="btn-cta2"><a href="Login.php"><span> <div align="center">Login</div>   </span></a></li> 
					</ul>
					<ul>
                         <li class="btn-cta"><a href="#Signup"><span>Sign Up</span></a></li>
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg); height:170px;">

	</header>
 

<!----- link the tabs stylesheet ---->
<link type="text/css" rel="stylesheet" href="css/TabsStyleSheet.css"></script>
        
	        
        
<!-------------------- Table Style --------------------->
<style>
.BoxBorder {
    
border: 1px solid #f1f1f1; 
border-radius: 10px;
width:85%;
text-align:left;        
        
}        

</style>
 
<!-------------------- start tabs holder ----------------->
<div id="gtco-services">
    <div class="gtco-container" >
		
        <div class="gtco-contact-info" >
            <div class="row animate-box" align="center" >
	
                <div class="BoxBorder" Style="text-align:right; border:0px;">

                                    
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> <?php echo $row['Name'] ?> 
                <span Style="text-align:right;">
                    
                    <?php 
                        
                        if (($Type != $Level)&&($Level != 1)&&($Level != 2)&&($requested == false)&&($Type != 2)&&($Type != 1)&&($matched != 'true'))
                        {
                            echo "<form method='POST'><input type='submit' value='Request' name = 'Request' id='Request'  class='btn btn-primary'></form>";
                        } 
                        elseif(($Type != $Level)&&($Level != 1)&&($Level != 2)&&($requested == true)&&($Type != 2)&&($Type != 1)&&($matched != 'true'))
                        {
                            echo "<form method='POST'><input type='submit' value='Requested' name = 'Requested' disabled = true id='Requested'  class='btn btn-primary'></form>";
                        }
                        elseif (($Type != $Level)&&($Level != 1)&&($Level != 2)&&($requested == false)&&($Type != 2)&&($Type != 1)&&($matched == true))
                        {
                            echo "<form method='POST'><input type='submit' value='Matched' name = 'Matched' disabled = true id='Matched'  class='btn btn-primary'></form>";
                        }

                    ?>
                    
                </span>
                </h2>
                </div>
                
                <span Style="text-align:left; font-size:18px; color:#b7b7b7; margin-left:-700px;" >Personal Information             
                </span>
                

                
                    
                    
                
                            <!-- <div class="text-center menu-1">
					<ul>
						<li class="has-dropdown">
							<a href=""><spnan class="icon-share" Style = 'zoom: 2;'></spnan></a>
							<ul class="dropdown">
								<li><a href=""><spnan class="icon-twitter" Style = 'zoom: 1.5;'></spnan></a>&ensp;&ensp;
                                    <a href=""><spnan class="icon-facebook" Style = 'zoom: 1.5;'></spnan></a>&ensp;&ensp;
								    <a href=""><spnan class="icon-email" Style = 'zoom: 1.5;'></spnan></a>
                                </li>
							</ul>
						</li>
					</ul>
				</div> -->
                
                
                <div class="BoxBorder">
                    
                    <br><ul Style="margin-left:100px;">
				
                    
                    <li class="address" <?php echo ($Type == 2 ) ?  "Style='display:none;'" : "Style='display:block;'"?>> <?php echo $row['City']; ?>
                    
                    <li class="phone" <?php echo ($Type == 2 ) ?  "Style='display:none;'" : "Style='display:block;'"?>><a href="tel://1234567920" Style="color:gray;"> <?php echo "+966 ".$row['Phone']; ?></a></li>
                    
                    
                    <li class="email"><a href="mailto: <?php echo $row['Email']; ?>" Style='color:gray;'><?php echo $row['Email']; ?></a></li>
                    		
                    
                    <li class="icon-calendar" <?php echo ($Type == 2 ) ?  "Style='display:none; font-size: 18px; font-weight: bold;'" : "Style='display:block; font-size: 18px; font-weight: bold;'"?>><?php echo $row['Date_of_Birth']; ?></li>
				
                    </ul>
                    
				</div>
			</div>            
            
            <div class="row animate-box" align="center" <?php echo ($Type == 2 ) ?  "Style='display:none;'" : "Style='display:block;'"?>>
	
                <br><br>
                <span Style="text-align:left; font-size:18px; color:#b7b7b7; margin-left:-700px;" >Medical Information </span>
                <div Style=" border: 1px solid #f1f1f1; border-radius: 10px; width:85%; text-align:left; ">
                    <br><ul Style="margin-left:100px;">
							 
                          <li class="icon-user" Style="font-size: 18px; font-weight: bold;"><?php if ($Type == 3) echo 'Patient'; elseif ($Type == 4) echo 'Donor'; ?></li>
                    
                    <p><img src="images/Blood.png" style="width:23px;">
                                &ensp;&ensp;
                            <?php echo $row['Blood_Type']; ?> </p>	
                    </ul>
                    
                    <br>
				</div>
			</div>
            <br>
            
         <div class="row animate-box" align="center" <?php echo $Type == 3 ?  "Style='display:block;'" : "Style='display:none;'"?>>

                <div class="BoxBorder" Style="text-align:center; border:0px;">
                            <a href="https://twitter.com/intent/tweet?text=<?php echo $row['Name'];?> needs a kidney donor. Please share this link &url=https%3A%2F%2Flocalhost%2Fmykidney%2Fprofile.php?ID=<?php echo $ID ?>%26Type=<?php echo $Type ?>&hashtags=MyKidney" target="_blank" >
                                
                            <spnan class="icon-twitter" Style = 'zoom: 1.7;'></spnan></a>
                                &ensp;&ensp;
                                   
				            <a title="send to Facebook" href="http://www.facebook.com/sharer.php?s=100&p[title]=Kidney Donation Request&p[summary]=<?php echo $row['Name'];?> needs a kidney donor. Please share this link&p[url]=https://localhost/mykidney/profile.php?ID=5%26Type=3&hashtags=MyKidney" target="_blank">    
                            
                            <spnan class="icon-facebook" Style = 'zoom: 1.7;'></spnan> </a> 
                            &ensp;&ensp;

                                <a href="mailto:?subject=<?php echo $row['Name']?> needs a kidney donor &amp;body=Check out the information of <?php echo $row['Name'];?>, kidney failure patient.%0A Please share it.%0A http://localhost/mykidney/profile.php?ID=<?php echo $ID; ?>%26Type=<?php echo $Type; ?> %0A%0A%0A%0A Shared by www.mykidney.com" title="Share by Email">
                                
                               
                                <!-- echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  -->  
                                <spnan class="icon-email" Style = 'zoom: 1.7;'></spnan></a>
                    </div>
            
            </div>
        </div>
              
</div>
</div>       
              
        
        
	<!------ Footer -------->		
<?php
include ('footer.html');
?>
