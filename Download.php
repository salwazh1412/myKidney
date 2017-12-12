<?php
$file_name = $_SESSION['file_name'];
header("Content-disposition: attachment; filename=\"".$file_name."\""); 

header("Content-type: application/pdf");
readfile("".$file_name."");?>