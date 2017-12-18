<?php
//shamelsms sms function
//www.shamelsms.net 
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
$username="school";
$mobile="9665xxxxxx";
$password="school";
$message="йляхи гясгА". "test";
$senderName="school";

//send sms  
 send($username,$password,$mobile,$message,$senderName);
?>