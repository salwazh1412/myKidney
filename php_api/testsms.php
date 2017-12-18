<?php
//shamelsms sms function
//www.shamelsms.net 

include ("../connection.php");


$PID = $_GET['PID'];
$DID = $_GET['DID'];



$sql = "INSERT INTO matches(Patient_ID,Donor_ID) VALUES (".$PID.",".$DID.")";
$stmt = $conn->prepare($sql);
     
if ( ! $stmt->execute() ){ die ("Error while execute query, The Error is: ".mysql_error ()); }


$sql = "Delete From requests where Patients_ID = ".$PID." AND Donor_ID=".$DID."";
$stmt = $conn->prepare($sql);
if ( ! $stmt->execute() )  die ("Error while execute query, The Error is: ".mysql_error ()); 



$sql="SELECT * from patient WHERE User_ID=".$PID."";            
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();

$pNumber = $row['Phone'];

$sql="SELECT * from donor WHERE User_ID=".$DID."";            
$stmt = $conn->prepare($sql);
$stmt->execute();
$row2 = $stmt->fetch();    

$dNumber = $row2['Phone'];

//echo "".$pNumber."";
//echo "<br>".$dNumber."<br>";


function send($username,$password,$mobile,$message,$senderName)
{

//$url = "http://www.shamelsms.net/api/httpSms.aspx?username=$username&password=$password&mobile=$mobile&message=$message&sender=$senderName&unicodetype=U";
$url = 'http://www.shamelsms.net/api/httpSms.aspx?' . http_build_query(array(
    'username' => $username,
    'password' => $password,
 	'mobile' => $mobile,
 	'message' => $message,
 	'sender' => $senderName,
 	'unicodetype' => 'U'
));

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$content = curl_exec($ch);
echo $content;

}

$username="maryam_ghamdi";
$dMobile = "966".$dNumber;
$pMobile = "966".$pNumber;
$password="meme3695464";
$message="This is a confirmation message from Medical Staff, Please ckeck your account in www.MyKidney.com.sa";
$senderName="MyKidney";

//send sms  
 
//if (isset($_POST['send']))
//{
    send($username,$password,$dMobile,$message,$senderName);
    send($username,$password,$pMobile,$message,$senderName);
    
    //echo "<br>SENT<br>";


//}

header("Location:../StaffHome.php");

?>
