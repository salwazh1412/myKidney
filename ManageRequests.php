<?php 

include("HeaderStaff.php");
        
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
        $(function(){ //this is shorthand for document.ready
        $('#match').on('click',function(){
        $('#inputUserAction').val($(this).data('userAction')); //update our hidden with the data
        $('#someFormId').submit(); //submit the form
        
                                
    });
});
         
</script>
        
<!-- <style>
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
</style> -->

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
    text-align: center; /* Left-align text */
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
    }
   
</style>
        
        

       
<div id="gtco-features">
		<div ID ="rcorners1"class="gtco-container">
            <div class="row animate-box">
				
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Manage Requests </h2>
			
            </div>
            
			<div class="row" Style="margin-top:30px; margin-bottom:-41px; margin-right:10px; margin-left:10px;">
                <form method="POST" action="MatchingDonors2.php" class="form-inline">
				<div>
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                        


<?php  
    if (!empty($_POST['userAction'])) {
        $string = $_POST['userAction'];
        list($part1, $part2) = explode('-', $string);
        $part3=(int)$part1;
        $part4=(int)$part2;
                                               
$db = new PDO("mysql:host=localhost;dbname=mykideny4;charset=utf8mb4", 'root', '');

// works not with the following set to 0. You can comment this line as 1 is default
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
                         
 
      $db=null;            } 
                      
                      //  $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND status=?');
                      //  $stmt->execute([$email, $status]);
                     //   $user = $stmt->fetch();
                        $target='./Tests/';
                        echo "<table style='width:100%';>";
                        echo "<form method='post' action='ManageRequests.php' id='someFormId'>";
                        echo "<input type='hidden' name='userAction' id='inputUserAction' value='' /> ";
                        echo "<tr class='header'><th>Patient Name</th><th>Patient Tests</th><th>Donor Name</th><th>Donor Tests</th><th>Match</th><th>Remove</th></tr>";  
                        try {
                            $stmt = $conn->prepare("SELECT patient.User_ID as patientID, patient.Name as PName, patient.Test as PTest, donor.User_ID as donorID, donor.Name as DName, donor.Test as DTest 
                                FROM requests 
                                INNER JOIN patient ON patient.User_ID=requests.Patients_ID
                                INNER JOIN donor ON donor.User_ID=requests.Donor_ID
                                where requests.Donor_Approval=1 ORDER BY requests.Request_Date;");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){
                                    echo "<tr>"."<td>".$row['PName']."</td>".
                                        "<td>". "<a href=" .$target.basename($row['PTest']).">Download</a>"."</td>".
                                        "<td>".$row['DName']."</td>".
                                        "<td>". "<a href=" .$target.basename($row['DTest']).">Download</a>"."</td>".
                                        "<td width=50>". 
                                        "<a href='Match.php?PID=".$row['patientID']."&DID=".$row['donorID']."&match=true'> <input type='button'
                                        ID='match' 
                                        name='match'value='Match' 
                                        class='btn btn-default btn-block' 
                                        Style='background: rgb(82,211,170); width: 100px; color:#ffffff; float:center;'/></a></td>"
                                        
                                        ."<td width=50>". 
                                        "<a href='Match.php?PID=".$row['patientID']."&DID=".$row['donorID']."&match=false'><input type='button' 
                                        ID='remove' 
                                        name='remove'value='Remove' 
                                        class='btn btn-default btn-block' data-user-action='' 
                        Style='background: rgb(239,145,145); width: 100px; color:#ffffff;  float: center;' /></a></td>".
                                        
                                        "</tr>"."\n"
                                        ."</form>";
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }$conn=null;
                        echo "</table>";           
                 

                        


    
                         
                         
   
                             
   /*                                                         

$sql = "
INSERT INTO matches(Patient_ID, Donor_ID)VALUES (".$part3.",".$part4.");
";

try {
    $stmt = $db->prepare($sql);
    $stmt->execute();
}
catch (PDOException $e)
{
    echo $e->getMessage();
    die();
}
$sql = "
DELETE FROM requests WHERE Patient_ID =".$part3." AND Donor_ID=".$part4.";
";

try {$conn->beginTransaction();
    $stmt = $db->prepare($sql);
    $stmt->execute();
   // $db->commit(); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    die();
}*/

                         
                         
                         
                         
                         
                         
                         
                         
                     
                         /*
         $sql = "INSERT INTO matches (Patient_ID, Donor_ID) VALUES (3,10)"; 
         $stmt = $conn->prepare($sql);

//$stmt->execute(array("55","18"));
         
      //  $stmt1 = $conn->prepare("insert into matches (Patient_ID, Donor_ID) VALUES ('3','4')");
      // $stmt2 = $conn->prepare("DELETE FROM requests WHERE Patient_ID ='".$part3."' AND Donor_ID='".$part4."'");
                           $stmt->execute(); //$stmt2->execute();                           
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        } */ 
                        ?> 
                    </div>
                </div>
            </div> <!-- end of row div -->
		</div>
	</div>


	<!------ Footer -------->		
<?php
       
include ('footer.html');
        
?>
