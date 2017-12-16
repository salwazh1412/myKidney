<?php

include ("headerPD.php");


if (isset($_SESSION['usr_level']) )
{
    $Level = $_SESSION['usr_level'];
}

?>
    	        
        
<style>
.BoxBorder {
    
border: 1px solid #f1f1f1; 
border-radius: 10px;
text-align:left; 
width: 31%;
float: left;
margin: 10px;
padding: 50px;
padding-top: 30px;
padding-bottom: 30px;
font-size:16px;    

        
}
    
.BoxTitle {
    
border: 0px solid #f1f1f1; 
border-radius: 10px;
text-align:left; 
width: 85%;
float: left;
font-size:18px;    
color:#b7b7b7; 

}        

</style>
 
<div id="gtco-services">
    <div class="gtco-container" >
		
        <div class="gtco-contact-info" >
            <div class="row animate-box" >


               <!-- <span Style="text-align:left; font-size:18px; color:#b7b7b7; margin-left:-700px;" >Personal Information             
                </span> -->
                
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> 
                    
                    <?php
                        
                    if($Level == 3)
                    {
                        $sql="SELECT Name from patient WHERE User_ID = ".$_SESSION['usr_id']."";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();  
                        $row = $stmt->fetch();
                           
                        echo "Welcom ".$row['Name']."";
                    } 
                    
                    if($Level == 4)
                    {
                        $sql="SELECT Name from donor WHERE User_ID = ".$_SESSION['usr_id']."";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();  
                        $row = $stmt->fetch();
                           
                        echo "Welcom ".$row['Name']."";
                    }
                    
                        
                    ?> 
                </h2>
                
                <?php 
                
                
            // ------------------------- Patient HOME PAGE ------------------------

                
                    if ($Level == 3)
                    {
		            
                        // Query 1
                        $sql1="SELECT Blood_Type, City from patient WHERE User_ID=".$_SESSION['usr_id']."";

                        $stmt = $conn->prepare($sql1);
                        $stmt->execute();
                        $row1 = $stmt->fetch();
                        
                        $bloodType = $row1['Blood_Type']; 
                        $city = $row1['City']; 

                        
                        // Query 2
                        $sql2="SELECT count(*) from donor WHERE Blood_Type='".$bloodType."' AND City ='".$city."'";

                        $stmt = $conn->prepare($sql2);
                        $stmt->execute();
                        $row2 = $stmt->fetchColumn();
                        
                        // Query 3
                        $sql3="SELECT * from donor WHERE Blood_Type='".$bloodType."'AND City ='".$city."'";

                        $stmt3 = $conn->prepare($sql3);
                        $stmt3->execute();    
                        
                        
                        echo "<Div class='BoxTitle'> 
                            Donors with same your blood type and also live in your city:
                        </div>";
                              
                        
                    if ($row2 > 0)
                    {
                        
                    while($row3 = $stmt3->fetch())
                    {
                 
                        $sql7="SELECT count(*) from requests WHERE (Donor_ID= ".$row3['User_ID']." AND Patients_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval != 2)";   

                        $stmt = $conn->prepare($sql7);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $requested = 'true';
                        }
                        else {
                            $requested = 'false';

                        }
                        
                        $sql9="SELECT count(*) from requests WHERE (Donor_ID= ".$row3['User_ID']." AND Patients_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval = 2)";   

                        $stmt = $conn->prepare($sql9);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $rejected = 'true';
                        }
                        else {
                            $rejected = 'false';

                        }
                        

                        $sql8="SELECT count(*) from matches WHERE (Patient_ID=".$_SESSION['usr_id']." AND  Donor_ID = ".$row3['User_ID'].")";   

                        $stmt8 = $conn->prepare($sql8);
                        $stmt8->execute();
                        $row8 = $stmt8->fetchColumn();

                        if($row8 > 0) 
                        {
                            $matched = 'true';
                        }
                        else {
                            $matched = 'false';

                        }                              
                
                        
                        echo "<div class='BoxBorder animate-box'>
                                <ul>
                                <br>
                                <li class='icon-user' Style='align:center;'><b><a href='Profile.php?ID=".$row3['User_ID']."&Type=4'>".$row3['Name']."</a></b></<li>
                                <li class='address' Style='align:center;'> ".$row3['City']."</<li>
                                <li class='email' Style='align:center;'> ".$row3['Email']."</<li>";
                                  
                        if (($requested == 'false')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Request' name = 'Request' id='Request'  class='btn btn-primary'></a>";
                        } 
                        
                        elseif(($requested == 'true')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Requested' name = 'Requested' disabled = true id='Requested'  class='btn btn-primary'></a>";
                        }
                        elseif (($requested == 'false')&&($matched == 'true')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Matched' name = 'Matched' disabled = true id='Matched'  class='btn btn-primary'></a>";
                        }
                        elseif (($requested == 'false')&&($matched == 'false')&&($rejected == 'true'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Rejected' name = 'Rejected' disabled = true id='Rejected'  class='btn btn-primary' Style='background: rgb(239,145,145); border-color:rgb(239,145,145);'></a>";
                        }
                        
                        
                        
                        echo "</ul>
                            </div>";

                    }
                    }  else
                      {
                            echo "<div class='text-center'><br><br><br><br>non<br><br><br>";

                      }
                          
                        
                        
                         // Query 4
                        $sql2="SELECT count(*) from donor WHERE Blood_Type='".$bloodType."' AND City !='".$city."'";

                        $stmt = $conn->prepare($sql2);
                        $stmt->execute();
                        $row2 = $stmt->fetchColumn();
                        
                        $bloodType2 = $row1['Blood_Type']; 
                        $city2 = $row1['City']; 
                        
                        
                        // Query 5
                        $sql3="SELECT * from donor WHERE Blood_Type='".$bloodType2."'AND City !='".$city2."'";

                        $stmt5 = $conn->prepare($sql3);
                        $stmt5->execute();                    
                        
                        echo "<Div class='BoxTitle'> 
                            <br> Donors with same your blood type BUT live in another city:
                        </div>";
                        
                        
                    
  
                        
                        
                        
                        // Donors with same your blood type BUT live in another city
                        
                    if ($row2 >0)
                    {
                    while($row4 = $stmt5->fetch())
                    {
                         
                                  
                        $sql7="SELECT count(*) from requests WHERE (Donor_ID = ".$row4['User_ID']." AND Patients_ID= ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval != 2)";   

                        $stmt = $conn->prepare($sql7);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $requested = 'true';
                        }
                        else {
                            $requested = 'false';

                        }
                        
                        $sql9="SELECT count(*) from requests WHERE (Donor_ID = ".$row4['User_ID']." AND Patients_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval = 2)";   

                        $stmt = $conn->prepare($sql9);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $rejected = 'true';
                        }
                        else {
                            $rejected = 'false';

                        }
                        

                        $sql8="SELECT count(*) from matches WHERE (Patient_ID =".$_SESSION['usr_id']." AND Donor_ID = ".$row4['User_ID'].")";   

                        $stmt8 = $conn->prepare($sql8);
                        $stmt8->execute();
                        $row8 = $stmt8->fetchColumn();

                        if($row8 > 0) 
                        {
                            $matched = 'true';
                        }
                        else {
                            $matched = 'false';

                        }
    
                        
                        echo "<div class='BoxBorder animate-box'>
                                <ul>
                                <br>
                                <li class='icon-user' Style='align:center;'><b><a href='Profile.php?ID=".$row4['User_ID']."&Type=4'>".$row4['Name']."</a></b></<li>
                                <li class='address' Style='align:center;'> ".$row4['City']."</<li>
                                <li class='email' Style='align:center;'> ".$row4['Email']."</<li>";
                                  
                        if (($requested == 'false')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Request' name = 'Request' id='Request'  class='btn btn-primary'></a>";
                        } 
                        
                        elseif(($requested == 'true')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Requested' name = 'Requested' disabled = true id='Requested'  class='btn btn-primary'></a>";
                        }
                        elseif (($requested == 'false')&&($matched == 'true')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Matched' name = 'Matched' disabled = true id='Matched'  class='btn btn-primary'></a>";
                        }             
                        elseif (($requested == 'false')&&($matched == 'false')&&($rejected == 'true'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Rejected' name = 'Rejected' disabled = true id='Rejected'  class='btn btn-primary' Style='background: rgb(239,145,145);  border-color:rgb(239,145,145);'></a>";
                        }
                        
                        
                        
                        echo "</ul>
                            </div>";
                        

                    }
                        
                    }
                        else
                            echo "<div class='text-center'><br><br><br><br>non<br><br><br>";

                    }
                
                
                       
                    
                
            // ------------------------- DONOR HOME PAGE ------------------------

                
                elseif ($Level == 4)
                    {
		            
                        // Query 1
                        $sql1="SELECT Blood_Type, City from donor WHERE User_ID=".$_SESSION['usr_id']."";

                        $stmt = $conn->prepare($sql1);
                        $stmt->execute();
                        $row1 = $stmt->fetch();
                        
                        $bloodType = $row1['Blood_Type']; 
                        $city = $row1['City']; 

                        
                        // Query 2
                        $sql2="SELECT count(*) from patient WHERE Blood_Type='".$bloodType."' AND City ='".$city."'";

                        $stmt = $conn->prepare($sql2);
                        $stmt->execute();
                        $row2 = $stmt->fetchColumn();
                        
                        // Query 3
                        $sql3="SELECT * from patient WHERE Blood_Type='".$bloodType."'AND City ='".$city."'";

                        $stmt3 = $conn->prepare($sql3);
                        $stmt3->execute();    
                        
                        
                        echo "<Div class='BoxTitle'> 
                            Patients with same your blood type and also live in your city:
                        </div>";
                     
                        
                    if ($row2 > 0)
                    {
                        
                    while($row3 = $stmt3->fetch())
                    {
                 
                        $sql7="SELECT count(*) from requests WHERE (Patients_ID= ".$row3['User_ID']." AND Donor_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval != 2)";   

                        $stmt = $conn->prepare($sql7);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $requested = 'true';
                        }
                        else {
                            $requested = 'false';

                        }
                        
                        $sql9="SELECT count(*) from requests WHERE (Patients_ID = ".$row3['User_ID']." AND Donor_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval = 2)";   

                        $stmt = $conn->prepare($sql9);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $rejected = 'true';
                        }
                        else {
                            $rejected = 'false';

                        }

                        $sql8="SELECT count(*) from matches WHERE (Donor_ID=".$_SESSION['usr_id']." AND Patient_ID = ".$row3['User_ID'].")";   

                        $stmt8 = $conn->prepare($sql8);
                        $stmt8->execute();
                        $row8 = $stmt8->fetchColumn();

                        if($row8 > 0) 
                        {
                            $matched = 'true';
                        }
                        else {
                            $matched = 'false';

                        }
    
                                                        
                
                        
                        echo "<div class='BoxBorder animate-box'>
                                <ul>
                                <br>
                                <li class='icon-user' Style='align:center;'><b><a href='Profile.php?ID=".$row3['User_ID']."&Type=3'>".$row3['Name']."</a></b></<li>
                                <li class='address' Style='align:center;'> ".$row3['City']."</<li>
                                <li class='email' Style='align:center;'> ".$row3['Email']."</<li>";
                                  
                        if (($requested == 'false')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Request' name = 'Request' id='Request'  class='btn btn-primary'></a>";
                        } 
                        
                        elseif(($requested == 'true')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Requested' name = 'Requested' disabled = true id='Requested'  class='btn btn-primary'></a>";
                        }
                        elseif (($requested == 'false')&&($matched == 'true')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Matched' name = 'Matched' disabled = true id='Matched'  class='btn btn-primary'></a>";
                        }                        
                        elseif (($requested == 'false')&&($matched == 'false')&&($rejected == 'true'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row3['User_ID']."'><input type='submit' value='Rejected' name = 'Rejected' disabled = true id='Rejected'  class='btn btn-primary' Style='background: rgb(239,145,145);  border-color:rgb(239,145,145);'></a>";
                        }
                        
                        
                        
                        echo "</ul>
                            </div>";

                    }
                    }
                        else
                            echo "<div class='text-center'><br><br><br><br>non<br><br><br>";
                      
                        
                        
                         // Query 4
                        $sql2="SELECT count(*) from patient WHERE Blood_Type='".$bloodType."' AND City !='".$city."'";

                        $stmt = $conn->prepare($sql2);
                        $stmt->execute();
                        $row2 = $stmt->fetchColumn();
                        
                        $bloodType2 = $row1['Blood_Type']; 
                        $city2 = $row1['City']; 
                        
                        
                        // Query 5
                        $sql3="SELECT * from patient WHERE Blood_Type='".$bloodType2."'AND City !='".$city2."'";

                        $stmt5 = $conn->prepare($sql3);
                        $stmt5->execute();                    
                        
                        echo "<Div class='BoxTitle'> 
                            <br> Patients with same your blood type BUT live in another city:
                        </div>";
                        
                        

                
                        // Donors with same your blood type BUT live in another city
                
                    if ($row2 > 0)
                    {
                    while($row4 = $stmt5->fetch())
                    {
                         
                                  
                        $sql7="SELECT count(*) from requests WHERE (Patients_ID= ".$row4['User_ID']." AND Donor_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND  Donor_Approval != 2)";   

                        $stmt = $conn->prepare($sql7);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $requested = 'true';
                        }
                        else {
                            $requested = 'false';

                        }
                        
                        $sql9="SELECT count(*) from requests WHERE (Patients_ID = ".$row4['User_ID']." AND Donor_ID = ".$_SESSION['usr_id']." AND Sender = ".$_SESSION['usr_id']." AND Donor_Approval = 2)";   

                        $stmt = $conn->prepare($sql9);
                        $stmt->execute();
                        $row7 = $stmt->fetchColumn();

                        if($row7 > 0) 
                        {
                            $rejected = 'true';
                        }
                        else {
                            $rejected = 'false';

                        }
                        
                        $sql8="SELECT count(*) from matches WHERE (Donor_ID=".$_SESSION['usr_id']." AND Patient_ID = ".$row4['User_ID'].")";   

                        $stmt8 = $conn->prepare($sql8);
                        $stmt8->execute();
                        $row8 = $stmt8->fetchColumn();

                        if($row8 > 0) 
                        {
                            $matched = 'true';
                        }
                        else {
                            $matched = 'false';

                        }
    
                        
                        echo "<div class='BoxBorder animate-box'>
                                <ul>
                                <br>
                                <li class='icon-user' Style='align:center;'><b><a href='Profile.php?ID=".$row4['User_ID']."&Type=3'>".$row4['Name']."</a></b></<li>
                                <li class='address' Style='align:center;'> ".$row4['City']."</<li>
                                <li class='email' Style='align:center;'> ".$row4['Email']."</<li>";
                                  
                        if (($requested == 'false')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Request' name = 'Request' id='Request'  class='btn btn-primary'></a>";
                        } 
                        
                        elseif(($requested == 'true')&&($matched == 'false')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Requested' name = 'Requested' disabled = true id='Requested'  class='btn btn-primary'></a>";
                        }
                        elseif (($requested == 'false')&&($matched == 'true')&&($rejected == 'false'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Matched' name = 'Matched' disabled = true id='Matched'  class='btn btn-primary'></a>";
                        }                        
                        elseif (($requested == 'false')&&($matched == 'false')&&($rejected == 'true'))
                        {
                            echo "<br><br>";
                            echo "<a href='SentRequest.php?ID=".$row4['User_ID']."'><input type='submit' value='Rejected' name = 'Rejected' disabled = true id='Rejected'  class='btn btn-primary' Style='background: rgb(239,145,145); border-color:rgb(239,145,145);'></a>";
                        }
                        
                        
                        
                        echo "</ul>
                            </div>";
                        

                    }
                    }
                        else
                            echo "<div class='text-center'><br><br><br><br>non<br><br><br>";

                        
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
