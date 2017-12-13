<?php
session_start();

if(isset($_SESSION['usr_id'])) {
	    
	unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
    unset($_SESSION['usr_level']);
    
    session_destroy();

    
	header("Location: login.php");
    
} else {
	header("Location: login.php");
}
?>