<?php
session_start();/*
// step 1: connect to database
if (! ( $database = mysql_connect ("localhost","root","")) )
die ("Cann't connect to database");

// setcharset to utf-8
if(mysql_set_charset('utf8',$database))  

// step 2: open database
if ( ! ( mysql_select_db ( "mykidney" ,$database )))
die ("Cann't open database ");

//  set sql encoding
mysql_query("SET NAMES 'utf-8'");  
$SqlEncoding=mysql_client_encoding($database); */ 
	
$servername = "localhost";
$username = "root";
$password = "";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO("mysql:host=$servername;dbname=mykidney", $username, $password,$opt);
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>