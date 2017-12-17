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

</style>
        

        
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
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Donor Information </h2>
			</div>
            
			<div class="row" Style="margin-top:30px; margin-bottom:-41px; margin-right:10px; margin-left:10px;">
                <form method="POST" action="MatchingConfirmation.php" class="form-inline">
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
                            $stmt = $conn->prepare("SELECT Distinct donor.User_ID, donor.Name, donor.City, donor.Blood_Type, donor.Diabetes, donor.LowPressure, donor.HighPressure, donor.Test
                                FROM donor
                                LEFT JOIN requests ON donor.User_ID=requests.Donor_ID
                                where requests.Donor_Approval!=1 OR Sender!=1;");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){  
                                    echo "<tr>"."<td style='text-align:center;'>"."<input type='radio' 
                                    name='donors' value='".$row['User_ID']."'>"."</td>";
                                    echo "<td style='text-align:center;'>".$row['Name']."</td>".
                                        "<td style='text-align:center;'>".$row['City']."</td>".
                                        "<td style='text-align:center;'>".$row['Blood_Type']."</td>".
                                        "<td style='text-align:center;'>".$row['Diabetes']."</td>".
                                        "<td style='text-align:center;'>".$row['LowPressure']."</td>".
                                        "<td style='text-align:center;'>".$row['HighPressure']."</td>".
                                        "<td style='text-align:center;'>".
                                        "<a href=" .$target.basename($row['Test'])." target='_blank'>Download</a>"."</td>".          
                                        "</tr>"."\n";
                            
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }
                        echo "</table>";
                        echo "<input type='hidden' name='patients' value='".$_POST['patients']."' />";
                        
                        ?>
 
                
                        
                    </div> 
                        <div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box"   data-animate-effect="fadeIn">
						<P></P>
					</div>
				</div>
                </div>
                
                <a href='MatchingPatients.php'><input type="button" 
                        name="back"
                        value="Back"
                        id="back" 
                        class="btn btn-default btn-block"
                               Style="background: rgb(82,211,170); width: 150px; color:#ffffff; margin-top:-20px; float: left; margin-left:-330px;"></a>
                    
                    
                <button type="submit" 
                        name="result"
                        value="result"
                        id="login" 
                        class="btn btn-default btn-block"
                        Style="background: rgb(82,211,170); width: 150px; color:#ffffff; margin-top:-20px; margin-right:30px; float: right;">Match</button>
           
            </form>
            </div> <!-- end of row div -->
		</div>
	</div>


  			
	
	<!------ Footer -------->		
<?php
        $conn = null;
include ('footer.html');
?>
