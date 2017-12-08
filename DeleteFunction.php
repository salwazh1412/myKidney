<?php
require ('connection.php');

$UserID=$_GET['ID'];
$Type=$_GET['Type'];

/*    $sql1="DELETE from Patient WHERE ID='$UserID'";
    $sql2="DELETE from Donor WHERE ID='$UserID'";
    $sql3="DELETE from Staff WHERE ID='$UserID'";
    
    $sql11="DELETE from requests WHERE Patients_ID='$UserID'";
    $sql22="DELETE from requests WHERE Donor_ID='$UserID'";

    $sql111="DELETE from matches WHERE Patient_ID='$UserID'";
    $sql222="DELETE from matches WHERE Donor_ID='$UserID'"; */


    $sql1111="DELETE from users WHERE ID='$UserID'";
    $sql2222="DELETE from users WHERE ID='$UserID'";
    $sql3333="DELETE from users WHERE ID='$UserID'";

if ($Type == 1)
{
    $stmt = $conn->prepare($sql1111);
    if ( ! $stmt->execute() )
        header('location:DeleteAccount.php?dele=false');      
    else 
        header('location:DeleteAccount.php?dele=true');

}
                    
    elseif ($Type == 2)
    {
          $stmt = $conn->prepare($sql2222);
          if ( ! $stmt->execute() )
             header('location:DeleteAccount.php?dele=false');     
          else 
             header('location:DeleteAccount.php?dele=true'); 

    }

        elseif ($Type == 3)
        {
            $stmt = $conn->prepare($sql3333);
            if ( ! $stmt->execute() )
                header('location:DeleteAccount.php?dele=false');
            else
                header('location:DeleteAccount.php?dele=true');
                
        }

/*
if ($Type == 1)
{
        $stmt = $conn->prepare($sql1);
        if ( ! $stmt->execute() )
            header('location:DeleteAccount.php?dele=false');
    
        else {
            $stmt = $conn->prepare($sql11);
            if ( ! $stmt->execute() )
                header('location:DeleteAccount.php?dele=false');
        
            else{
                $stmt = $conn->prepare($sql111);
                if ( ! $stmt->execute() )
                    header('location:DeleteAccount.php?dele=false');   
            
                else{
                        $stmt = $conn->prepare($sql1111);
                    if ( ! $stmt->execute() )
                        header('location:DeleteAccount.php?dele=false');
                
                    else 
                        header('location:DeleteAccount.php?dele=true');
                }
            }
        }
}
                    
   

    elseif ($Type == 2)
    {
        $stmt = $conn->prepare($sql2);
        if ( ! $stmt->execute() )
            header('location:DeleteAccount.php?dele=false');
    
        else {
            $stmt = $conn->prepare($sql22);
            if ( ! $stmt->execute() )
                header('location:DeleteAccount.php?dele=false');
        
            else{
                $stmt = $conn->prepare($sql222);
                if ( ! $stmt->execute() )
                    header('location:DeleteAccount.php?dele=false');   
            
                else{
                        $stmt = $conn->prepare($sql2222);
                        if ( ! $stmt->execute() )
                            header('location:DeleteAccount.php?dele=false');
                
                        else 
                            header('location:DeleteAccount.php?dele=true'); 
                    }  
                }
            }
    }

        elseif ($Type == 3)
        {
            $stmt = $conn->prepare($sql3);
            if ( ! $stmt->execute() )
                header('location:DeleteAccount.php?dele=false');
            else
            {
                $stmt = $conn->prepare($sql3333);
                if ( ! $stmt->execute() )
                    header('location:DeleteAccount.php?dele=false');
                else
                    header('location:DeleteAccount.php?dele=true');

            }
                
        }
        
*/



?>