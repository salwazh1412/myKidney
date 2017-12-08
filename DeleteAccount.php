<!DOCTYPE HTML>

<?php require ('connection.php'); 

// If no session value is present, redirect the user to the login page:
//if (!isset($_SESSION['usr_id']) || ($_SESSION['Level'] != 1))
//	{
//		header('location:login.php');
//	}//end if statement

//$sessionID=$_SESSION['usr_id'];	
//$sessionLevel=$_SESSION['usr_level'];	

?>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MyKidney | Delete Account</title>
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
 

<!----- link the tabs stylesheet ---->
<link type="text/css" rel="stylesheet" href="css/TabsStyleSheet.css"></script>
        

<script>
    
function myFunction1() {
  // Declare variables 
  var input, filter, table, tr, td, td2, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByClassName("1");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("11")[1];
    td2 = tr[i].getElementsByClassName("11")[4];
      
    if (td || td2) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

 
function myFunction2() {
  // Declare variables 
  var input, filter, table, tr, td, td2, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByClassName("2");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("22")[1];
    td2 = tr[i].getElementsByClassName("22")[4];
    if (td || td2) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  
function myFunction3() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable3");
  tr = table.getElementsByClassName("3");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("33")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
    
function ConfirmDelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
    else
        return false;
}

</script>
	        
        
<!-------------------- Table Style --------------------->
        
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
}

table tr.header, table tr:hover {
    /* Add a grey background color to the table header and on hover */
    background-color: #f1f1f1;
}

</style>
        

        
<!-------------------- start tabs holder ----------------->
<div id="gtco-services">
    <div class="gtco-container">
					
            <div class="row animate-box">
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Delete Account </h2>
                
                <!-- <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					
				</div> -->
                
                    <?php 
        
        if (isset($_GET['dele'])){
        
            if ($_GET['dele'] == 'true')
                echo "<div Style='color:green; text-align:center;'>The account has been successfully deleted</div><br>";
            elseif ($_GET['dele'] == 'false')
                echo "<div Style='color:red; text-align:center;'>Couldn't complete the process, please try again</div><br>";
        }
        
        ?>   
                
			</div>
 
<div class="tabs_holder">
		 <ul>
              <li class="tab_selected"><a href="#your-tab-id-1"> Patients </a></li>
              <li><a href="#your-tab-id-2"> Donors </a></li>
              <li><a href="#your-tab-id-3"> Medical Staff </a></li>
		 </ul>
<!---- start content_holder ----->

    <div class="content_holder">

                        <!--------------------- Tab (1) ------------------->
             <div id="your-tab-id-1">

                    <input width=100% type="text" class="myInput" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names or phone number..">
                      
                    <!--------- PHP Code --------->
                    <?php
                                // quiry
                               // $result=mysql_query("SELECT * FROM Patient");
                                
                                $sql='SELECT * FROM Patient';
                 
                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                    
                                    //View
                                echo "<table id='myTable1' style='width:100%;'>";
                                echo "<tr class='header'>
                                        <th style='width:5%; text-align:center;'>ID</th>
                                        <th style='width:25%; text-align:center;'>Name</th>
                                        <th style='width:10%; text-align:center;'>Blood Type</th>
                                        <th style='width:10%; text-align:center;'>City</th>
                                        <th style='width:10%; text-align:center;'>Phone number</th>
                                        <th style='width:25%; text-align:center;'>e-mail</th>
                                        <th style='width:5%; text-align:center;'>Diabetes</th>
                                        <th style='width:5%; text-align:center;'>Low Pressure</th>
                                        <th style='width:5%; text-align:center;'>High Pressure</th>
                                        <th style='width:5%; text-align:center;'>Delete</th>

                                      </tr>";
                                        
                                while($row = $stmt->fetch())

                                {
                                    // rows
                                    echo "<tr class='1'>";
                                    
                                    // column 1
                                    echo "<td class='11' Style='text-align:center;'> ".$row['User_ID']."";
                                    echo "</td>";
                                   
                                    // column 2
                                    echo "<td class='11'><a href='profile.php?ID=".$row['User_ID']."&Type=3'>".$row['Name']."</a>";
                                    echo "</td>";	
                                    
                                    // column 3
                                    echo "<td class='11' Style='text-align:center;'>".$row['Blood_Type']."";
                                    echo "</td>";	 
                                    
                                    // column 4
                                    echo "<td class='11'>".$row['City']."";
                                    echo "</td>";	                                    
                                    
                                    // column 5
                                    echo "<td class='11'>0".$row['Phone']."";
                                    echo "</td>";		
                                 
                                    // column 6
                                    echo "<td class='11'>".$row['Email']."";
                                    echo "</td>";	 
                                    
                                    // column 7
                                    echo "<td class='11'>".$row['Diabetes']."";
                                    echo "</td>";
                                    
                                    // column 8
                                    echo "<td class='11'>".$row['LowPressure']."";
                                    echo "</td>";	                                    
                                    
                                    // column 9
                                    echo "<td class='11'>".$row['HighPressure']."";
                                    echo "</td>";

                                    // column 10
                                    echo "<td class='11' Style='text-align:center;'><a Onclick='return ConfirmDelete();' href='DeleteFunction.php?ID=".$row['User_ID']."&Type=1'><span class='icon-trash' Style = 'zoom: 1.5;'></a></span>";
                                    echo "</td>";	
                                    
                                    echo "</tr>";

                                }


                                echo "</table>";

                                ?>
               

            </div> <!-- end of tabs 1 content --->

                        <!--------------------- Tab (2) ------------------->

            <div id="your-tab-id-2">

                              <input width=100% type="text" id= "myInput2" class="myInput" onkeyup="myFunction2()" placeholder="Search for names or phone number..">
                      
                    <!--------- PHP Code --------->
                    <?php
                                // quiry
                                                
                                $sql='SELECT * FROM Donor';
                 
                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                
                                //View
                                echo "<table id='myTable2' style='width:100%;'>";
                                echo "<tr class='header'>
                                        <th style='width:5%; text-align:center;'>ID</th>
                                        <th style='width:25%; text-align:center;'>Name</th>
                                        <th style='width:10%; text-align:center;'>Blood Type</th>
                                        <th style='width:10%; text-align:center;'>City</th>
                                        <th style='width:10%; text-align:center;'>Phone number</th>
                                        <th style='width:25%; text-align:center;'>e-mail</th>
                                        <th style='width:5%; text-align:center;'>Diabetes</th>
                                        <th style='width:5%; text-align:center;'>Low Pressure</th>
                                        <th style='width:5%; text-align:center;'>High Pressure</th>
                                        <th style='width:5%; text-align:center;'>Delete</th>

                                      </tr>";
                                        
                                while($row = $stmt->fetch())

                                {
                                    // rows
                                    echo "<tr class='2'>";
                                    
                                    // column 1
                                    echo "<td class='22' Style='text-align:center;'> ".$row['User_ID']."";
                                    echo "</td>";
                                   
                                    // column 2
                                    echo "<td class='22'><a href='profile.php?ID=".$row['User_ID']."&Type=4'>".$row['Name']."</a>";
                                    echo "</td>";	
                                    
                                    // column 3
                                    echo "<td class='22' Style='text-align:center;'>".$row['Blood_Type']."";
                                    echo "</td>";	 
                                    
                                    // column 4
                                    echo "<td class='22'>".$row['City']."";
                                    echo "</td>";	                                    
                                    
                                    // column 5
                                    echo "<td class='22'>0".$row['Phone']."";
                                    echo "</td>";		
                                 
                                    // column 6
                                    echo "<td class='22'>".$row['Email']."";
                                    echo "</td>";	 
                                    
                                    // column 7
                                    echo "<td class='22'>".$row['Diabetes']."";
                                    echo "</td>";
                                    
                                    // column 8
                                    echo "<td class='22'>".$row['LowPressure']."";
                                    echo "</td>";	                                    
                                    
                                    // column 9
                                    echo "<td class='22'>".$row['HighPressure']."";
                                    echo "</td>";	

                                    // column 10
                                    echo "<td class='22' Style='text-align:center;'><a Onclick='return ConfirmDelete();' href='DeleteFunction.php?ID=".$row['User_ID']."&Type=2'><span class='icon-trash' Style = 'zoom: 1.5;'></a></span>";
                                    echo "</td>";	
                                    
                                    echo "</tr>";

                                }

                                echo "</table>";

                                ?>
             

            </div>
           
                        <!--------------------- Tab (3) ------------------->
            <div id="your-tab-id-3">

                <input width=100% type="text" id="myInput3" class="myInput" onkeyup="myFunction3()" placeholder="Search for names..">
                      
                    <!--------- PHP Code --------->
                    <?php
                                // quiry
                               
                                $sql='SELECT * FROM Staff';
                 
                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                //View
                                echo "<table id='myTable3' style='width:100%;'>";
                                echo "<tr class='header'>
                                        <th style='width:5%; text-align:center;'>ID</th>
                                        <th style='width:25%; text-align:center;'>Name</th>
                                        <th style='width:25%; text-align:center;'>e-mail</th>
                                        <th style='width:5%; text-align:center;'>Delete</th>

                                      </tr>";
                                        
                                while($row = $stmt->fetch())

                                {
                                    // rows
                                    echo "<tr class='3'>";
                                    
                                    // column 1
                                    echo "<td class='33' Style='text-align:center;'> ".$row['User_ID']."";
                                    echo "</td>";
                                   
                                    // column 2
                                    echo "<td class='33'><a href='profile.php?ID=".$row['User_ID']."&Type=2'>".$row['Name']."</a>";
                                    echo "</td>";	
                                    
                                    // column 3
                                    echo "<td class='33'>".$row['Email']."";
                                    echo "</td>";	

                                    // column 4
                                    echo "<td class='33' Style='text-align:center;'><a Onclick='return ConfirmDelete();' href='DeleteFunction.php?ID=".$row['User_ID']."&Type=3'><span class='icon-trash' Style = 'zoom: 1.5;'></a></span>";
                                    echo "</td>";	
                                    
                                    echo "</tr>";

                                }


                                echo "</table>";

                                ?>
                                
            </div>

 </div><!-- /.content_holder -->
</div><!-- /.tabs_holder -->
        
    </div>        
</div>
        
         
 <!----------- Script ------------>       
<script type="text/javascript" src="js/JQuery1.js"></script>
<script type="text/javascript" src="js/JQuery2.js"></script>
<script type="text/javascript" src="js/JQuery3.js"></script>
<script type="text/javascript">
  $('.tabs_holder').skinableTabs({
    effect: 'slide_left',
    skin: 'skin1',
    position: 'top'
  });
</script>     
        
        
	<!------ Footer -------->		
<?php
include ('footer.html');
?>
