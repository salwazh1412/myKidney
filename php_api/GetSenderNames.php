<?php
header("Content-Type: text/html; charset=utf-8");


function GetSenderNames($username,$password)


{
$url = "http://www.shamelsms.net/api/users.aspx?code=8&username=$username&password=$password";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$content = curl_exec($ch);
echo $content;
}

GetSenderNames('api_test','api123test');
