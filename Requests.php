<?php 

include ("headerPD.php");

if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}



if (isset($_SESSION['usr_id']))
{
    if ($_SESSION['usr_level'] == 3)
    {
    
    
    $sql1="SELECT * from requests WHERE Patients_ID = ".$sessionID."";   
    
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $row1 = $stmt->fetchColumn();
    
    }

}



?>


 

<!----- link the tabs stylesheet ---->
<link type="text/css" rel="stylesheet" href="css/TabsStyleSheet.css"></script>
        
	        
        
<!-------------------- Table Style --------------------->
<style>
.BoxBorder {
padding-left: 50px;    
padding-right: 50px;    
padding-top: 30px;    
padding-bottom: 30px;    
border: 1px solid #f1f1f1; 
border-radius: 10px;
width:85%;
text-align:left;        
        
}        

</style>
 
<!-------------------- start tabs holder ----------------->
<div id="gtco-services">
    <div class="gtco-container" >
		
        <div class="gtco-contact-info row animate-box" >
            <div class="row animate-box" align="center" >
	
                <div class="BoxBorder" Style="text-align:right; border:0px;">                  
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> Manage Requests </h2>
                </div>
                
                <?php 
                
                    if ($Level == 4)
                    {
                     //   echo "<span Style='text-align:left; font-size:18px; color:#b7b7b7; margin-left:-830px;'> Requests</span>";
                        
                        $sql = "SELECT * FROM requests WHERE Donor_ID = ".$sessionID." AND Sender != ".$sessionID." AND Donor_Approval = 0";

                        $stmt2 = $conn->prepare($sql);

                        if ( ! $stmt2->execute() )
                            die ("Error while execute query, The Error is: ".mysql_error ()); 
                        
                        
                            echo "<div class=' BoxBorder'>";        
                        
                        while($row = $stmt2->fetch())
                        {
                            $sql2 = "SELECT Name, User_ID FROM patient WHERE User_ID = ".$row['Patients_ID']."";

                            $stmt = $conn->prepare($sql2);

                            $stmt->execute();
                            
                            $row2 = $stmt->fetch();
                            
                            echo "<table border=0>";
                            echo "<tr>";
                            echo "<td width=200px> <a href='Profile.php?ID=".$row['Patients_ID']."&Type=3'>".$row2['Name']."</a>";
                            echo "</td>";

                            
                            //echo "<div class='col-md-4 col-sm-4'  Style='margin:0; padding:0px;'>";
                            echo "<td width=100px ><br><br><a class='feature-center' href='AcceptRequest.php?ID=".$row2['User_ID']."'><span class='icon' Style='zoom:0.5; margin=-200px; padding:-200px;'>
							 <i class='icon-check'></i></span></a></td>";
                            
                            echo "<td width=100px><br><br><a class='feature-center' href='RejectRequest.php?ID=".$row2['User_ID']."'><span class='icon' Style='zoom:0.5; margin=-200px; padding:-200px;'>
							 <i class='icon-cross' Style='color:red;'></i></span></a></td>";
                            
                            echo "</tr>";
                            echo "</table>";
                            
                        }

                                                
                       // echo "<span Style='text-align:left; font-size:18px; color:#b7b7b7; margin-left:-800px;' >Sent Requests</span>"; 
                        
 
                        
                }
                   elseif ($Level == 3)
                   {
                       echo "";
                   }
                
                ?>
                
                  

                
			</div>            
            


        </div>
              
</div>
</div>       
              
        
        
	<!------ Footer -------->		
<?php
include ('footer.html');
?>