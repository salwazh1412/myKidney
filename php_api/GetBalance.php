<?php
header("Content-Type: text/html; charset=utf-8");


function GetBalance($username,$password)


{
$url = "http://www.shamelsms.net/api/users.aspx?code=7&username=$username&password=$password";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$content = curl_exec($ch);
echo $content;
}

GetBalance('api_test','api123test');
