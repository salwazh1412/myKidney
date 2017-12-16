<?php

include ("connection.php");

$ID = $_GET['ID'];

if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}
    
    if($Level == 4){
        
    
    //$sql = "SELECT * FROM requests WHERE = 1 WHERE Donor_ID =".$sessionID." AND Patients_ID =".$ID."";

    //$stmt = $conn->prepare($sql);

  //  if ( ! $stmt->execute() )
    //    die ("Error while execute query, The Error is: ".mysql_error ()); 
    

        
    
    $sql3 = "UPDATE requests SET Donor_Approval	= 1 WHERE Donor_ID =".$sessionID." AND Patients_ID =".$ID."";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    }    
    
    
    
header("Location:Requests.php");

?>
    	        
