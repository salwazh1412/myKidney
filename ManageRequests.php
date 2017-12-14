
<?php
    include("HeaderStaff.php");
?>

<style>
table, th, td {
    border: 1px solid gray;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: center;
}
    
</style>
        
        
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row" Style="margin-top:-150px;">
                
				<div>
                    <div class="feature-center animate-box" data-animate-effect="fadeIn">
                           
                        
	<div id="gtco-services">
		<div class="gtco-container">
			
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Manage Requests</h2>
				<!--	<p>Select user to delete</p> -->
				</div>
			</div>
 <!-- 
			<div class="row animate-box">
				
				<div class="gtco-tabs">
					<ul class="gtco-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-command"></i></span>
                            <span class="hidden-xs">Web Design</span></a></li>
						<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span>
                            <span class="hidden-xs">Online Marketing</span></a></li>
						<li><a href="#" data-tab="3">
                            <span class="icon visible-xs"><i class="icon-bag"></i></span><span class="hidden-xs">E-Commerce</span></a></li>
					</ul>

					
					<div class="gtco-tab-content-wrap">
						
                    
                        
                      <div class="gtco-tab-content tab-content active" data-tab-content="1">
							<div class="col-md-12">
								<h2>Web Design</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

							</div>
						</div>
                        
                        
                     
                        
                        <div class="gtco-tab-content tab-content active" data-tab-content="2">
							<div class="col-md-12">
								<h2>Web Design</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

							</div>
						</div>
                        
                          
                        
                        <div class="gtco-tab-content tab-content active" data-tab-content="3">
							<div class="col-md-12">
								<h2>Web Design</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

							</div>
						</div> 
					</div>

				</div>
			</div> -->
		</div>
	</div>
                        <?php   
                      
                      //  $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND status=?');
                      //  $stmt->execute([$email, $status]);
                     //   $user = $stmt->fetch();
                        $target='./Tests/';
                        echo "<table style='width:100%';>";
                        echo "<tr><th>Patient Name</th><th>Patient Tests</th><th>Donor Name</th><th>Donor Tests</th><th>Mach</th></tr>";  
                        try {
                            $stmt = $conn->prepare("SELECT patient.Name as PName, patient.Test as PTest, donor.Name as DName, donor.Test as DTest 
                                FROM requests 
                                INNER JOIN patient ON patient.User_ID=requests.Patients_ID
                                INNER JOIN donor ON donor.User_ID=requests.Donor_ID
                                where requests.Donor_Approval=1 ORDER BY requests.Request_Date;");
                            $stmt->execute();
                            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);                            
                                foreach ($stmt as $row){
                                    echo "<tr>"."<td>".$row['PName']."</td>".
                                        "<td>". "<a href=" .$target.basename($row['PTest']).">Download</a>"."</td>".
                                        "<td>".$row['DName']."</td>".
                                        "<td>". "<a href=" .$target.basename($row['DTest']).">Download</a>"."</td>".
                                        "<td>". "" ."</td>".           
                                        "</tr>"."\n";
                                }
                        }catch(PDOException $e) {
                         echo "Error: " . $e->getMessage();
                        }
                        echo "</table>";
                        ?>
                    </div>
                </div>
            </div> <!-- end of row div -->
		</div>
	</div>


	
	<!------ Footer -------->		
<?php
        $conn = null;
include ('footer.html');
?>
