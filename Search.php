<?php

require ('connection.php'); 


if (isset($_SESSION['usr_level']) )
{
    $Level = $_SESSION['usr_level'];


if ($Level == 2)
    include("HeaderStaff.php");

     elseif ($Level == 3 || $Level == 4)
        include("HeaderPD.php");

         elseif ($Level == 1)
             include("HeaderAdmin.php");
}
else

    include("HeaderSearch.php");



?>

<!----- link the tabs stylesheet ---->
<link type="text/css" rel="stylesheet" href="css/TabsStyleSheet.css"></script>
        

<script>
    
function myFunction1() {
  // Declare variables 
  var input, filter, table, tr, td2, td, i;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByClassName("1");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("11")[0];
    td2 = tr[i].getElementsByClassName("11")[3];

    if (td || td2) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter)> -1) {
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
    td = tr[i].getElementsByClassName("22")[0];
    td2 = tr[i].getElementsByClassName("22")[3];

    if (td || td2) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter)> -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  
function CityDropdown1() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("city");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByClassName("1");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("11")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  
function BloodDropdown1() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("BloodType");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByClassName("1");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("11")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  
function CityDropdown2() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("city2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByClassName("2");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("22")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
  
function BloodDropdown2() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("BloodType2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByClassName("2");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByClassName("22")[1];
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
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Search </h2>
                
                <!-- <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					
				</div> -->
			</div>
        
<div class="tabs_holder">
		 <ul>
              <li class="tab_selected"><a href="#your-tab-id-1"> Patients </a></li>
              <li><a href="#your-tab-id-2"> Donors </a></li>
		 </ul>
<!---- start content_holder ----->

    <div class="content_holder">

                        <!--------------------- Tab (1) ------------------->
             <div id="your-tab-id-1">
                 
                 <div class="row form-group">
                     
				    <div class="col-md-6">	

                    <input type="text" class="myInput" id="myInput1" onkeyup="myFunction1()" placeholder="Search for names <?php if(isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2) {echo "or phone numbers";} ?>.." Style="display: inline-block; float: left; margin-right: 20px;"> 
                     </div>
                     
                    <div class="col-md-6">
                     
                        <div class="col-md-6">

                    <select class="form-control" name="city" id="city" Style="width:100%;" onChange="CityDropdown1()" Style="display: inline-block; float: left;">
                                  <option value="">Select city</option>
                                  <option value="Abha">Abha</option>
                                  <option value="AlBahah">AlBahah</option>
                                  <option value="Dammam">Dammam</option>
                                  <option value="Jeddah" >Jeddah</option>
                                  <option value="Makkah" >Makkah</option>                                   
                                  <option value="Taif">Taif</option>
                                  <option value="Riyadh">Riyadh</option>
                                  <option value="Hail" >Hail</option>
                                  <option value="Tabuk">Tabuk</option>
                    </select>
                        </div>
                    
                    <div class="col-md-6">
                     

                    <select class="form-control" name="BloodType" id="BloodType" Style="width:100%;" onchange="BloodDropdown1()" Style="display: inline-block; float: left;">
                                  <option value="">Select blood type</option>
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
                 </div>
                 
                    <!--------- PHP Code --------->
                    <?php
                 
                        $target='./Tests/';
                                // quiry
                               // $result=mysql_query("SELECT * FROM Patient");
                                
                                $sql='SELECT * FROM Patient';
                 
                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                                    
                                    //View
                                echo "<table id='myTable1' style='width:100%;'>";
                                echo "<tr class='header'>
                                        <th style='width:25%; text-align:center;'>Name</th>
                                        <th style='width:10%; text-align:center;'>Blood Type</th>
                                        <th style='width:10%; text-align:center;'>City</th>";
                                        
                                        
                                    if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                    {
                                        echo "<th style='width:13%; text-align:center;'>Phone number</th>
                                              <th style='width:25%; text-align:center;'>e-mail</th>";
                                    }
                                    
                                        echo "<th style='width:5%; text-align:center;'>Diabetes</th>
                                        <th style='width:5%; text-align:center;'>Low Pressure</th>
                                        <th style='width:5%; text-align:center;'>High Pressure</th>";
                                            
                                    if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                    {
                                        echo "<th style='width:13%; text-align:center;'>Test</th> 
                                            </tr>";

                                    }
                                      
                                        
                                while($row = $stmt->fetch())

                                {
                                    // rows
                                    echo "<tr class='1'>";

                                    // column 1
                                    echo "<td class='11'> <a href='profile.php?ID=".$row['User_ID']."&Type=3'>".$row['Name']."</a>";
                                    echo "</td>";	
                                    
                                    // column 2
                                    echo "<td class='11' Style='text-align:center;'>".$row['Blood_Type']."";
                                    echo "</td>";	 
                                    
                                    // column 3
                                    echo "<td class='11' Style='text-align:center;'>".$row['City']."";
                                    echo "</td>";	                                    
                                    
                                  if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                  {
                                    // column 4
                                    echo "<td class='11' Style='text-align:center;'> 0".$row['Phone']."";
                                    echo "</td>";		
                                 
                                    // column 5
                                    echo "<td class='11' Style='text-align:center;'>".$row['Email']."";
                                    echo "</td>";	 
                                  
                                  }
                                    
                                    // column 6
                                    echo "<td class='11' Style='text-align:center;'>".$row['Diabetes']."";
                                    echo "</td>";
                                    
                                    // column 7
                                    echo "<td class='11' Style='text-align:center;'>".$row['LowPressure']."";
                                    echo "</td>";	                                    
                                    
                                    // column 8
                                    echo "<td class='11' Style='text-align:center;'>".$row['HighPressure']."";
                                    echo "</td>";

                                if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                  {
                                    // column 9
                                    echo "<td class='11' Style='text-align:center;'><a href='".$target.basename($row['Test'])."'>Download</a>";
                                    echo "</td>";		
                                  
                                  
                                  }
                                    
                                    echo "</tr>";

                                }


                                echo "</table>";

                                ?>
               

            </div> <!-- end of tabs 1 content --->

                        <!--------------------- Tab (2) ------------------->

            <div id="your-tab-id-2">

						<div class="row form-group">
							<div class="col-md-6">
                                <input width=100% type="text" id= "myInput2" class="myInput" onkeyup="myFunction2()" placeholder="Search for names <?php if(isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2) {echo "or phone numbers";} ?>..">
							</div>
                            
							<div class="col-md-6">
                     
                        <div class="col-md-6">

                            <select class="form-control" name="city2" id="city2" Style="width:100%;" onChange="CityDropdown2()">
                        
                                  <option value="">Select city</option>
                                  <option value="Abha">Abha</option>
                                  <option value="AlBahah">AlBahah</option>
                                  <option value="Dammam">Dammam</option>
                                  <option value="Jeddah" >Jeddah</option>
                                  <option value="Makkah" >Makkah</option>                                   
                                  <option value="Taif">Taif</option>
                                  <option value="Riyadh">Riyadh</option>
                                  <option value="Hail" >Hail</option>
                                  <option value="Tabuk">Tabuk</option>
                    </select>
                        </div>
                 
                <div class="col-md-6">

                    <select class="form-control" name="BloodType2" id="BloodType2" Style="width:100%;" onchange="BloodDropdown2()">
                                  <option value="">Select blood type</option>
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
						</div>
                                <!--------- PHP Code --------->
                    <?php
                                // quiry
                                                
                                $sql='SELECT * FROM Donor';
                 
                                $stmt = $conn->prepare($sql);

                                $stmt->execute();

                
                                //View
                                echo "<table id='myTable2' style='width:100%;'>";
                                echo "<tr class='header'>
                                        <th style='width:25%; text-align:center;'>Name</th>
                                        <th style='width:10%; text-align:center;'>Blood Type</th>
                                        <th style='width:10%; text-align:center;'>City</th>";
                                        
                                        
                                  if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                    {
                                        echo "<th style='width:13%; text-align:center;'>Phone number</th>
                                              <th style='width:25%; text-align:center;'>e-mail</th>";
                                    }
                                        
                                        
                                  echo "<th style='width:5%; text-align:center;'>Diabetes</th>
                                        <th style='width:5%; text-align:center;'>Low Pressure</th>
                                        <th style='width:5%; text-align:center;'>High Pressure</th>";
                                
                                  if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                    {
                                        echo "<th style='width:13%; text-align:center;'>Test</th>";
                                    }

                                      echo "</tr>";
                                        
                                while($row = $stmt->fetch())

                                {
                                    // rows
                                    echo "<tr class='2'>";
                                    
                                    // column 1
                                    echo "<td class='22'><a href='profile.php?ID=".$row['User_ID']."&Type=4'>".$row['Name']."</a>";
                                    echo "</td>";	
                                    
                                    // column 2
                                    echo "<td class='22' Style='text-align:center;'>".$row['Blood_Type']."";
                                    echo "</td>";	 
                                    
                                    // column 3
                                    echo "<td class='22' Style='text-align:center;'>".$row['City']."";
                                    echo "</td>";	
                                    
                        if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                        {
                                    // column 4
                                    echo "<td class='22' Style='text-align:center;'> 0".$row['Phone']."";
                                    echo "</td>";		
                                 
                                    // column 5
                                    echo "<td class='22' Style='text-align:center;'>".$row['Email']."";
                                    echo "</td>";	 
                        }
                                    // column 6
                                    echo "<td class='22' Style='text-align:center;'>".$row['Diabetes']."";
                                    echo "</td>";
                                    
                                    // column 7
                                    echo "<td class='22' Style='text-align:center;'> ".$row['LowPressure']."";
                                    echo "</td>";	                                    
                                    
                                    // column 8
                                    echo "<td class='22' Style='text-align:center;'> ".$row['HighPressure']."";
                                    echo "</td>";	
                                    
                                    if (isset($_SESSION['usr_level']) && $_SESSION['usr_level'] == 2)
                                    {
                                        echo "<th style='width:13%; text-align:center;'><a href='".$target.basename($row['Test'])."'>Download</a></th> 
                                            </tr>";

                                    }
                                    
                                      
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
