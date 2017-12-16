<?php

include ("connection.php");

$PID = $_GET['PID'];
$DID = $_GET['DID'];
$match = $_GET['match'];

if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}
    
if ($match == 'true')
    {
        $sql = "INSERT INTO matches(Patient_ID,Donor_ID) VALUES (".$PID.",".$DID.")";
        $stmt = $conn->prepare($sql);
       if ( ! $stmt->execute() ){ die ("Error while execute query, The Error is: ".mysql_error ()); }


       $sql = "Delete From requests where Patients_ID = ".$PID." AND Donor_ID=".$DID."";
        $stmt = $conn->prepare($sql);
       if ( ! $stmt->execute() )  die ("Error while execute query, The Error is: ".mysql_error ()); 
    }
    else if ($match == 'false')
    {
            $sql = "UPDATE requests SET Donor_Approval = 2 where Patients_ID = ".$PID." AND Donor_ID=".$DID."";
            $stmt = $conn->prepare($sql);
            if ( ! $stmt->execute() )  die ("Error while execute query, The Error is: ".mysql_error ()); 
    }
    
    
    
header("Location:ManageRequests.php");

?>
    	        
