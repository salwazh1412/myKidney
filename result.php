 <?php require ('connection.php'); ?>
 
<html>
<body>
    
    
    
    
                            <?php   
                        echo "<table style='width:100%';>";
                        echo "<tr class='header' >
                        <th style='text-align:center;'>Patient ID</th>
                        <th style='text-align:center;'>Patient Name</th>
                        <th style='text-align:center;'>Donor ID</th>
                        <th style='text-align:center;'>Donor Name</th> 
                        <th style='text-align:center;'>SMS Confirmation</th></tr>";
                        try {
                            $stmt = $conn->prepare("SELECT Distinct patient.Name as PName, donor.Name as DName 
                            FROM patient, donor
                            WHERE ".$_POST["patients"]." = patient.User_ID AND ".$_POST["donors"]." = donor.User_ID ");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){ 
                                    echo  "<tr>"."<td style='text-align:center;'>".$row['PNAme']."</td>".
                                        "<td style='text-align:center;'>".$row['PName']."</td>".
                                        "<td style='text-align:center;'>".$row['PName']."</td>".
                                        "<td style='text-align:center;'>".$row['DName']."</td>".
                                        "<td style='text-align:center;'>".$row['DName']."</td>".
                         
                                        "</tr>"."\n";
                                        echo "<tr><td style='text-align:center;'>".$_POST["patients"]."</td>".
                                        "<td style='text-align:center;'>"."<a href='index.php'>".$row['PName']."</a>"."</td>".
                                        "<td style='text-align:center;'>".$_POST["donors"]."</td>".
                                        "<td style='text-align:center;'>"."<a href='index.php'>".$row['DName']."</a>"."</td>".
                                        "<td></td>".
                                        "</tr>"."\n";
                                      echo $row['PName']; 
                                
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }
                        echo "</table>";
                        ?>

Patient ID is:  <?php echo $_POST["patients"]; ?><br>
  
Donor ID is : <?php echo $_POST["donors"]; ?>
    
    

</body>
</html>