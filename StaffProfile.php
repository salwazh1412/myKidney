<?php 

include("HeaderStaff.php");
    
if (isset($_SESSION['usr_level']) && isset($_SESSION['usr_id']))
{
    $Level = $_SESSION['usr_level'];
    $sessionID = $_SESSION['usr_id'];

}

if (isset($_POST['update']))
{   
    $updatedName = $_POST['name'];
    $updatedEmail = $_POST['email'];

        
        
    $sql4 = "UPDATE Staff SET Name='".$updatedName."', Email ='".$updatedEmail."' WHERE User_ID='".$sessionID."'";
    
    $stmt = $conn->prepare($sql4);
        
   
    if ( ! $stmt->execute())
				die ("Error while execute query, The Error is: ".mysql_error ()); 
    
    $updated = true;
}

if ($Level == 2)
{
    $sql4 = "SELECT * FROM Staff WHERE User_ID = ".$sessionID."";
    
    $stmt = $conn->prepare($sql4);
    $stmt->execute();
    $row = $stmt->fetch();
    
}


?>

<!----- link the tabs stylesheet ---->
<link type="text/css" rel="stylesheet" href="css/TabsStyleSheet.css"></script>
        
	        
        
<!-------------------- Table Style --------------------->
<style>
.BoxBorder {
    
border: 1px solid #f1f1f1; 
border-radius: 10px;
width:85%;
text-align:left;        
        
}
    
</style>

 
<!-------------------- start tabs holder ----------------->
<div id="gtco-services">
    <div class="gtco-container" >
		
        <div class="gtco-contact-info" >
            <div class="row animate-box" align="center" >
	
                <div class="BoxBorder" Style="text-align:right; border:0px;">

                                    
                <h2 class= "text-center"; Style="color:gray; margin-top:-80px;"> <?php echo $row['Name'] ?> 
                <span Style="text-align:right;">
                    
                    <form method='POST' action="">
                        <input type="submit" value='Update' name = 'update' id='update' class='btn btn-primary'>
                    

                    
                </span>
                </h2>
                </div>
                
                <span Style="text-align:left; font-size:18px; color:#b7b7b7; margin-left:-700px;" >Personal Information             
                </span>
                

                
                <div class="BoxBorder" style="border: 0px solid #f1f1f1; ">
                    

                    <br><ul Style="margin-left:100px;">
	                    
                    <table border="0" style="padding=20px;">
                    <tr>    
                    <td>
                        <li class="icon-user" style="zoom:1.4;"> </li>
                    </td> 

                    <td> 
                        <input type='text' value='<?php echo $row['Name']; ?>' class="form-control" id='name' name='name'  >
                    </td>
                    </tr>
                      
                    <tr>
                    <td><br></td>    
                    </tr>
                        
                        
                    <tr>    
                    <td>
                        <li class="email"> </li>
                    </td> 

                    <td>
                        <input type="email" name="email" id="email" value="<?php echo $row['Email']; ?>"  class="form-control" >
                    </td>
                    </tr>             
                
                    <tr>
                    <td><br></td>    
                    </tr>    
                      
              </table>

                    
                    </ul>

				</div>
                                    </form>    

			</div>            
            
            
            <div class="row animate-box" align="center">
	            <br><br>
                <div class="BoxBorder"></div>

                <br><br>
                
                <div class="BoxBorder" style="border: 0px solid #f1f1f1; ">
                    
                                        

                        
                <span Style="text-align:left; font-size:18px; color:#b7b7b7; margin-left:50px;" >Change Password </span>

                    <form method='POST' action="" style="float:right;">
                        <input type="submit" value='Change' name = 'change' id='change' class='btn btn-primary'>

                                    
                
                </div>


                <div Style=" border: 0px solid #f1f1f1; border-radius: 10px; width:85%; text-align:left; ">
                    
                    <br><ul Style="margin-left:100px;">
				<?php 
                    
                  if (isset($_POST['change']))
                    {
                        if (!$_POST['password'] || !$_POST['newpass'] || !$_POST['confpass'])
                        {
                            echo "<span id='mess' Style='color:red; margin-left:120px;'>Please fill all the fields<br><br></span>";

                            
                            
                        }
                    
                        
                            $sql = "SELECT count(*) FROM users WHERE ID=".$sessionID." AND Password ='".md5($_POST['password'])."'";
    
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();  
                            $row = $stmt->fetchColumn();
                        
                        if ($row == 0)
                        {

                           echo "<span id='mess' Style='color:red; margin-left:120px;'>Incorrect Password<br><br></span>";
                        }
                            

                        elseif ($_POST['newpass'] != $_POST['confpass'] )

                            echo "<span id='mess' Style='color:red; margin-left:120px;'>Password not matched<br><br></span>";
                        
                        
                        elseif(strlen($_POST['newpass'])< 6)
                        
                            echo "<span id='mess' Style='color:red; margin-left:80px;'>Password must be at least 6 letters or digits<br><br></span>";
                        
                        else
                        {
                            
                            $sql2 = "UPDATE users SET Password='".md5($_POST['confpass'])."' WHERE ID=".$sessionID."";
    
                            $stmt = $conn->prepare($sql2);
        
   
                            if ( ! $stmt->execute())
				                die ("Error while execute query, The Error is: ".mysql_error ()); 
                            else
                                echo "<span id='mess' Style='color:green; margin-left:120px;'>Password updated successfully<br><br></span>";
                        
    
                        }
                    
                        
                    }
                    ?>
                    
                    <li class="password"><input type="password" name="password" id="password" Style='width:350px;' class="form-control" placeholder="Enter your current password"></li>                     
                    
                    <li class="password"><input type="password" name="newpass" id="newpass" Style='width:350px;' class="form-control" placeholder="Enter your new password"></li>                     
                    
                    <li class="password"><input type="password" name="confpass" id="confpass" Style='width:350px;' class="form-control" placeholder="Enter your new password again">
                    <span id="mess"></span>
                    </li> 
                    
                    </ul>
                    
                    
                    <br>

                    
				</div>
                </form>
			</div>
            <br>
            
        </div>
              
</div>
</div>       
              
        
        
	<!------ Footer -------->		
<?php
include ('footer.html');
?>
