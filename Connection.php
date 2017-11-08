<?php
session_start();
// step 1: connect to database
if (! ( $database = mysql_connect ("sql101.byethost13.com","b13_21005337o","myKidney")) )
die ("Cann't connect to database");

// setcharset to utf-8
if(mysql_set_charset('utf8',$database))  

// step 2: open database
if ( ! ( mysql_select_db ( "mykidney" ,$database )))
die ("Cann't open database ");

//  set sql encoding
mysql_query("SET NAMES 'utf-8'");  
$SqlEncoding=mysql_client_encoding($database);  
	 
?>