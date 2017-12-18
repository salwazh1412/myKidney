<?php

include ("connection.php");

$ID = $_GET['ID'];

if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}
    
    if($Level == 4){
        
    
    $sql = "SELECT count(*) FROM requests WHERE  Donor_ID =".$sessionID." AND Patients_ID =".$ID." AND Sender = 1";

    $stmt = $conn->prepare($sql);

    if ( ! $stmt->execute() )
       die ("Error while execute query, The Error is: ".mysql_error ()); 
    
    $row = $stmt->fetchColumn();
    
        // incase the sender is Staff ..
        
    if($row > 0) 
    {
        $sql = "INSERT INTO matches(Patient_ID,Donor_ID) VALUES (".$ID.",".$sessionID.")";
        $stmt = $conn->prepare($sql);
       if ( ! $stmt->execute() ){ die ("Error while execute query, The Error is: ".mysql_error ()); }


       $sql = "Delete From requests where Patients_ID = ".$ID." AND Donor_ID = ".$sessionID."";
        $stmt = $conn->prepare($sql);
       if ( ! $stmt->execute() )  die ("Error while execute query, The Error is: ".mysql_error ()); 
    
        
    }
        
        // in calse sender is not staff
        
    else 

    {
    
    $sql3 = "UPDATE requests SET Donor_Approval	= 1 WHERE Donor_ID =".$sessionID." AND Patients_ID =".$ID."";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    
    }  
    }
    
    
    
header("Location:Requests.php");

?>
    	        
