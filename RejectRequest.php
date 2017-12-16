<?php

include ("connection.php");

$ID = $_GET['ID'];

if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}
    
    if($Level == 4){
    
        $sql = "UPDATE requests SET Donor_Approval = 2 where Patients_ID = ".$ID." AND Donor_ID=".$sessionID."";
            
        $stmt = $conn->prepare($sql);
            
        if ( ! $stmt->execute() )
            die ("Error while execute query, The Error is: ".mysql_error ()); 
    }
    
header("Location:Requests.php");

?>
