 <form action="" method="post" enctype="multipart/form-data">
 <input type="hidden" name="MAX_FILE_SIZE" value="5632000">
 <label for='file'>Filename:</label> <input type="file" name="file" id="file" style="cursor: pointer;">
 <input class="button" style="margin-top: 12px;" type="submit" name="submit" value="Upload" title="Upload">
 </form>
<?php
     require ('connection.php');
    
    if (isset($_POST['submit'])) {
        $temp = explode('.', $_FILES['file']['name']);
        $extn = strtolower(end($temp));
        if(($extn == "doc") || ($extn == "docx") || ($extn == "pdf")) {
            // Filetype is correct. Check size
            if($_FILES['file']['size'] < 5632000) {
                // Filesize is below maximum permitted. Add to the DB.
                $mime = $_FILES['file']['type'];
                $size = $_FILES['file']['size'];
                $name = $_FILES['file']['name'];
                $tmpf = $_FILES['file']['tmp_name'];
                $file = fopen($_FILES['file']['tmp_name'], "rb");

                try {
               $stmt = $conn->prepare("UPDATE donor SET Test='".$_FILES['file']['name']."' WHERE User_ID=".$_SESSION['usr_id']."");

                    
                     
  $target='./Tests/';
                     
                     
                    // Bind Values
                    $stmt->bindParam(1, $appID, PDO::PARAM_INT, 11);
                    $stmt->bindParam(2, $uaID, PDO::PARAM_INT, 11);
                    $stmt->bindParam(3, $uID, PDO::PARAM_INT, 11);
                   
                    $stmt->bindParam(5, $applicationKey, PDO::PARAM_STR, 8);
                    $stmt->bindParam(6, $name, PDO::PARAM_STR, 256);
                    $stmt->bindParam(7, $mime, PDO::PARAM_STR, 128);
                    $stmt->bindParam(8, $size, PDO::PARAM_INT, 20);
                    $stmt->bindParam(9, $file, PDO::PARAM_LOB);

                    // Execute the query
                    $stmt->execute();
                } catch(PDOException $e) {    echo "Error: " . $e->getMessage(); }

            } else {
                // Filesize is over our limit. Send error message
                $error = "Your file is too large.";
            }
        } else {
            $error = "Your file was the incorrect type.";
        }
        //move_uploaded_file($_FILES['file']['name'], $target);
        move_uploaded_file($_FILES["file"]["tmp_name"], $target.$_FILES["file"]["name"]);
    }
?>