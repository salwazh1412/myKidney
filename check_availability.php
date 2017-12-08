<?php
require ('connection.php'); 
require_once("dbcontroller.php");

$db_handle = new DBController();

if(!empty($_POST["username"])) {
    
    $sql = "SELECT count(*) FROM users WHERE User_Name= '" . $_POST['username'] . "'";

    $stmt = $conn->prepare($sql);
    
    $stmt->execute(); 
    
    $row = $stmt->fetchColumn();
    
    if($row > 0) 
        echo "<span class='status-not-available'> Username Not Available.</span>";
    else 
        echo "<span class='status-available'> Username Available.</span>";
}
?>