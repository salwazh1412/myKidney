<!DOCTYPE HTML>

 <?php require ('connection.php'); ?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>myKidney</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

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
.myInput {
    background-image: url('images/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    background-size: 22px;
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
    font-size: 16px !important;
    width: 100%;
    -webkit-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
    border-radius: 4px;

}
    
.myInput:active, .myInput:focus {
  outline: none;
  box-shadow: none;
  border-color: #52d3aa;
}

table {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    border: 1px solid #ddd; /* Add a grey border */
    font-size: 14px; /* Increase font-size */
}

table th, table td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
    border: 1px solid #ddd; 

}

table tr {
    /* Add a bottom border to all table rows */
    border-bottom: 1px solid #ddd; 
    background:#ffffff; 
}

table tr.header, table tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}

</style>
        
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
                        <!-- <li class="btn-cta"><a href="#Signup"><span>Sign Up</span></a></li> -->
					</ul>
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg); height:170px;">

	</header>
        
<style>
table, th, td {
    border: 1px solid gray;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: center;
}
    #rcorners1 {
    padding: 0px; 
     border: 1px solid #f1f1f1;

}
    }
   
</style>
        
        
	<div id="gtco-features">
		<div ID ="rcorners1"class="gtco-container">
            <div class="row animate-box">
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Patients Information </h2>
			</div>
            
			<div class="row" Style="margin-top:30px; margin-bottom:-41px; margin-right:10px; margin-left:10px;">
                <form method="POST" action="MatchingDonors2.php" class="form-inline">
				<div>
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                           
                        

                    
                        
                        <?php   
                        $target='./Tests/';
                        echo "<table style='width:100%';>";
                        echo "<tr class='header' >
                        <th></th>
                        <th style='text-align:center;'>Name</th>
                        <th style='text-align:center;'>City</th>
                        <th style='text-align:center;'>Blood Type</th>
                        <th style='text-align:center;'>Diabetes</th>
                        <th style='text-align:center;'>Low Pressure</th>
                        <th style='text-align:center;'>High Pressure</th>
                        <th style='text-align:center;'>Test</th></tr>";
                        try {
                            $stmt = $conn->prepare("SELECT Distinct patient.User_ID, patient.Name, patient.City, patient.Blood_Type, patient.Diabetes, patient.LowPressure, patient.HighPressure, patient.Test
                                FROM patient 
                                LEFT JOIN requests ON patient.User_ID=requests.Patients_ID
                                where requests.Donor_Approval!=1 OR Sender!=1;");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){ 
                                    echo "<tr>"."<td style='text-align:center;'>"."<input type='radio' 
                                    name='patients' value='".$row['User_ID']."'>"."</td>";
                                    echo "<td style='text-align:center;'>".$row['Name']."</td>".
                                        "<td style='text-align:center;'>".$row['City']."</td>".
                                        "<td style='text-align:center;'>".$row['Blood_Type']."</td>".
                                        "<td style='text-align:center;'>".$row['Diabetes']."</td>".
                                        "<td style='text-align:center;'>".$row['LowPressure']."</td>".
                                        "<td style='text-align:center;'>".$row['HighPressure']."</td>".
                                        "<td style='text-align:center;'>". "<a href=" .$target.basename($row['Test']).">Download</a>"."</td>".          
                                        "</tr>"."\n";
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }
                        echo "</table>";
                        
                        ?>
 
                
                        
                    </div> 
                        <div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box"   data-animate-effect="fadeIn">
						<P></P>
					</div>
				</div>
                </div>
                
                <button type="submit" 
                        name="result"
                        value="result"
                        id="login" 
                        class="btn btn-default btn-block"
                        Style="background: rgb(82,211,170); width: 200px; color:#ffffff; margin-top:-20px; margin-right:450px;float: right;">Find a Donor</button>
           
            </form>
            </div> <!-- end of row div -->
		</div>
	</div>


  			
	
	<!------ Footer -------->		
<?php
        $conn = null;
include ('footer.html');
?>
