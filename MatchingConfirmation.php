<?php 

include("HeaderStaff.php");
        
?>

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
   
</style>
        
        
	<div id="gtco-features">
		<div ID ="rcorners1"class="gtco-container">
            <div class="row animate-box">
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Matching Confirmation</h2>
			</div>
            
			<div class="row" Style="margin-top:30px; margin-bottom:-41px; margin-right:10px; margin-left:10px;">
                <form method="POST" action="MatchingPatients.php" class="form-inline">
				<div>
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                           
                        

                    
                        
                        <?php   
                        echo "<table style='width:100%';>";
                        echo "<tr class='header' >
                        <th style='text-align:center;'>Patient ID</th>
                        <th style='text-align:center;'>Patient Name</th>
                        <th style='text-align:center;'>Donor ID</th>
                        <th style='text-align:center;'>Donor Name</th> 
                        <th style='text-align:center;'>SMS Confirmation</th></tr>";
                        try {
                            $stmt = $conn->prepare("SELECT Distinct patient.Name as PName, donor.Name as DName 
                            FROM patient, donor
                            WHERE ".$_POST["patients"]." = patient.User_ID AND ".$_POST["donors"]." = donor.User_ID ");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){ 
                                    echo "<tr>"."<td style='width:10%; text-align:center;'>".$_POST["patients"]."</td>".
                                        "<td style='text-align:center;'>"."<a href='profile.php?ID=".$_POST["patients"]."&Type=3'>".$row['PName']."</a>"."</td>".
                                        "<td style='width:10%; text-align:center;'>".$_POST["donors"]."</td>".
                                        "<td style=' width:35%; text-align:center;'>"."<a href='profile.php?ID=".$_POST["donors"]."&Type=4'>".$row['DName']."</a>"."</td>".
                                        "<td style='width:10%';><button type='submit' 
                        name='Match'
                        value='match'
                        class='btn btn-default btn-block'
                        Style='background: rgb(82,211,170); width: 100px; color:#ffffff;  float: right;'>send</button></td>".
                                        "</tr>"."\n";
                                    echo "<input type='hidden' name='patients' value='".$_POST["patients"]."' />";
                                    echo "<input type='hidden' name='donors' value='".$_POST['donors']."' />";
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }
                        echo "</table>";
                        ?>
 
                
                        
                </div> 
                <div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<P></P>
					</div>
				</div>
                </div>
                
          <!--      <button type="submit" 
                        name="result"
                        value="result"
                        id="login" 
                        class="btn btn-default btn-block"
                        Style="background: rgb(82,211,170); width: 200px; color:#ffffff; margin-top:-20px; margin-right:450px;float: right;">Find a Donor</button> -->
           
            </form>
            </div> <!-- end of row div -->
		</div>
	</div>


  			
	
	<!------ Footer -------->		
<?php
        $conn = null;
include ('footer.html');
?>
