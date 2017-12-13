<?php

include ("connection.php");

$ID = $_GET['ID'];

if (isset($_SESSION['usr_level']) )
{
    $Level = $_SESSION['usr_level'];
}
    
    if($Level == 4){
    
    $sql3 = "INSERT INTO requests (Patients_ID, Donor_ID , Donor_Approval , Sender, Request_Date) VALUES (".$ID.",".$_SESSION['usr_id'].",0,".$_SESSION['usr_id'].",'".date("Y-m-d H:i:s")."')";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    }    
    
    if($Level == 3){
    
    $sql3 = "INSERT INTO requests (Patients_ID, Donor_ID , Donor_Approval , Sender, Request_Date) VALUES (".$_SESSION['usr_id'].",".$ID.",0,".$_SESSION['usr_id'].",'".date("Y-m-d H:i:s")."')";

    $stmt = $conn->prepare($sql3);

    if ( ! $stmt->execute() )
        die ("Error while execute query, The Error is: ".mysql_error ()); 
    }
    
    
header("Location:HomePD.php");

?>
    	        
