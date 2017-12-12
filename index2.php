
<?php
 require ('connection.php');
session_start();


if(isset($_SESSION['usr_id'])){
$userid = $_SESSION['usr_id'];
$sql1= "SELECT * FROM Users WHERE ID =". $userid."";
 $stmt=$conn->prepare($sql1);
    $stmt->execute();
$row =  $stmt->fetch();
if ($row['Level'] == 4){
	$tableprofile = 'patient';
	$bloodtypecol = 'Donor';
}elseif($row['Level'] == 3){
	$tableprofile = 'donor';
	$bloodtypecol = 'Patient';
}
$sql2 ="SELECT * FROM ".$bloodtypecol." WHERE User_ID =".$userid."";
  $stmt2=$conn->prepare($sql2);
    $stmt2->execute();
$rowUserDet =$stmt2->fetch();
$bloodtypeUser = $rowUserDet['Blood_Type'];

$sqlgetDonorUser = "SELECT * FROM". $tableprofile"";
 $stmt3=$conn->prepare($sqlgetDonorUser);
    $stmt3->execute();
$rowDonor = $stmt3->fetch();

if ($row['Level'] == 4){
// SEND REQUEST


if($bloodtypeUser == 'A+' OR $bloodtypeUser == 'A-'){
		$getBloodTypes = array('A+','A-','AB');
}
elseif($bloodtypeUser == 'B+' OR $bloodtypeUser == 'B-'){
		$getBloodTypes = array('B+','B-','AB');
}
elseif($bloodtypeUser == 'AB+' OR $bloodtypeUser == 'AB-'){
		$getBloodTypes = array('AB+','AB-');
}
elseif($bloodtypeUser == 'O+' OR $bloodtypeUser == 'O-'){
		$getBloodTypes = array('A+','A-','B+','B-','AB+','AB-','O+','O-');
}
}elseif($row['Level'] == 3){
  // SEND REQUEST

if($bloodtypeUser == 'A+' OR $bloodtypeUser == 'A-'){
		$getBloodTypes = array('A+','A-','O+','O-');
}
elseif($bloodtypeUser == 'B+' OR $bloodtypeUser == 'B-'){
		$getBloodTypes = array('B+','B-','O+','O-');
}
elseif($bloodtypeUser == 'AB+' OR $bloodtypeUser == 'AB-'){
		$getBloodTypes = array('A+','A-','B+','B-','AB+','AB-','O+','O-');
}
elseif($bloodtypeUser == 'O+' OR $bloodtypeUser == 'O-'){
		$getBloodTypes = array('O+','O-');
}
}

if(isset($_POST['senddonreq'])){
	$reciverid	 = mysqli_real_escape_string($con, $_POST['reciverid']);
	$senderid	 = mysqli_real_escape_string($con, $_POST['senderid']); //THE SENDER IS THE DONOR
	$q = "INSERT INTO requests (Sender_ID, Receiver_ID)
	VALUES('" . $senderid . "', '" . $reciverid . "')";
	$stmt4=$conn->prepare($q);
    
	if($stmt4->execute())
	{
		$errormsg = "Your Request Has Been Sent";
	} else {
		$errormsg = "Error in registering...Please try again later! <br>".$q;
	}
}


$sql5 = "SELECT * FROM requests WHERE Sender_ID =".$userid." AND Donor_Approval = '0' ";
$stmt5=$conn->prepare($sql5 );
    $stmt5->execute();
$rowRequests = $stmt5->fetch();
	$requestArray = array();
if ($sql5->num_rows > 0) { foreach ($sql5 as $Reqkey => $getRequDetail) {
	$requestArray[] = $getRequDetail['Receiver_ID'];
}
}

}


include("templates/header.php") ?>
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<?php if(isset($_SESSION['usr_id']) == ""){ ?>
							<h1>myKidney</h1>
							<h2>Free html5 templates Made by <a href="http://gettemplates.co/" target="_blank">gettemplates.co</a></h2>
							<p><a href="#" class="btn btn-default">Get Started</a></p>
						<?php }else{ ?>
							<?php if (isset($errormsg)){ ?>
								<div class="panel panel-info">
									<?php echo $errormsg ?>
								</div>
							<?php } ?>
							<table class="table table-hover" id="datatable" style="color:#333; background:#fff">
								<thead>
									<tr>
										<th>
											Name
										</th>
										<th>
											Email
										</th>
										<th>
											City
										</th>
										<th>
											Blood Type
										</th>
										<th>
											Request
										</th>
									</tr>
								</thead>
								<tbody>

								<?php if ($getDonorUser->num_rows > 0) { foreach ($getDonorUser as $key => $getDonorDetail) {
									if (in_array($getDonorDetail['Blood_Type'], $getBloodTypes)){
									?>
									<tr <?php if (in_array($getDonorDetail['ID'],$requestArray)){ ?>style="background:#ddd;"<?php } ?>>
									<td>
										<?php echo $getDonorDetail['Name']?>
									</td>
									<td>
										<?php echo $getDonorDetail['Email']?>
									</td>
									<td>
										<?php echo $getDonorDetail['City']?>
									</td>
									<td>
										<?php echo $getDonorDetail['Blood_Type']?>
									</td>
									<td>
										<?php if (in_array($getDonorDetail['ID'],$requestArray)){ ?>
											<small>Request has been sent to this member</small>
										<?php } ?>
										<form method="post" action="">
										<input type="hidden" name="reciverid" value="<?php echo $getDonorDetail['ID']?>">
										<input type="hidden" name="senderid" value="<?php echo $row['ID']?>">
										<input type="hidden" name="senddonreq" />
										<button id="submitbtn<?php echo $key ?>" type="submit" class="btn btn-sm btn-success">SEND Request</button>
										</form>
									</td>
								</tr>

							<?php }}}else{ ?>
									<td colspan="5">
										NO DATA AVAILABLE
									</td>
								<?php } ?>

								</tbody>
							</table>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-eye"></i>
						</span>
						<h3>Retina Ready</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-command"></i>
						</span>
						<h3>Fully Responsive</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="icon-power"></i>
						</span>
						<h3>Web Starter</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-features-2">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Why Choose Us</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-check"></i>
						</span>
						<div class="feature-copy">
							<h3>Retina Ready</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-check"></i>
						</span>
						<div class="feature-copy">
							<h3>Fully Responsive</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

					<div class="feature-left animate-box" data-animate-effect="fadeInLeft">
						<span class="icon">
							<i class="icon-check"></i>
						</span>
						<div class="feature-copy">
							<h3>Ready To Use</h3>
							<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						</div>
					</div>

				</div>

				<div class="col-md-6">
					<div class="gtco-video gtco-bg" style="background-image: url(images/img_1.jpg); ">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video2"></i></a>
						<div class="overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-bg gtco-counter" style="background-image:url(images/img_bg_2.jpg);">
		<div class="gtco-container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-eye"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Creativity Fuel</span>

							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-anchor"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Happy Clients</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-briefcase"></i>
								</span>
								<span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Projects Done</span>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 animate-box">
							<div class="feature-center">
								<span class="icon">
									<i class="icon-clock"></i>
								</span>

								<span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
								<span class="counter-label">Hours Spent</span>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="gtco-testimonial">
		<div class="gtco-container">
			<!-- <div class="row"> -->
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
						<h2>Testimonial</h2>
					</div>
				</div>
				<div class="row animate-box">


					<div class="owl-carousel owl-carousel-fullwidth ">
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person_1.jpg" alt="user">
								</figure>
								<span>Jean Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person_2.jpg" alt="user">
								</figure>
								<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
						<div class="item">
							<div class="testimony-slide active text-center">
								<figure>
									<img src="images/person_3.jpg" alt="user">
								</figure>
								<span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
								<blockquote>
									<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			<!-- </div> -->
		</div>
	</div>

	<div id="gtco-services">
		<div class="gtco-container">

			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>What We Offer</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row animate-box">

				<div class="gtco-tabs">
					<ul class="gtco-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-command"></i></span><span class="hidden-xs">Web Design</span></a></li>
						<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Online Marketing</span></a></li>
						<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-bag"></i></span><span class="hidden-xs">E-Commerce</span></a></li>
						<li><a href="#" data-tab="4"><span class="icon visible-xs"><i class="icon-box"></i></span><span class="hidden-xs">Logo &amp; Branding</span></a></li>
					</ul>

					<!-- Tabs -->
					<div class="gtco-tab-content-wrap">

						<div class="gtco-tab-content tab-content active" data-tab-content="1">
							<div class="col-md-6">
								<div class="icon icon-xlg">
									<i class="icon-command"></i>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Web Design</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Keep it simple</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
									<div class="col-md-6">
										<h2 class="uppercase">Less is more</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
								</div>

							</div>
						</div>

						<div class="gtco-tab-content tab-content" data-tab-content="2">
							<div class="col-md-6">
								<div class="icon icon-xlg">
									<i class="icon-bar-graph"></i>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Online Marketing</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Ready to use</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
									<div class="col-md-6">
										<h2 class="uppercase">100% Satisfaction</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
								</div>

							</div>
						</div>

						<div class="gtco-tab-content tab-content" data-tab-content="3">
							<div class="col-md-6">
								<div class="icon icon-xlg">
									<i class="icon-bag"></i>
								</div>
							</div>
							<div class="col-md-6">
								<h2>e-Commerce</h2>
								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>
								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Easy to shop</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
									<div class="col-md-6">
										<h2 class="uppercase">No credit card required</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
								</div>

							</div>
						</div>

						<div class="gtco-tab-content tab-content" data-tab-content="4">
							<div class="col-md-6">
								<div class="icon icon-xlg">
									<i class="icon-box"></i>
								</div>
							</div>
							<div class="col-md-6">
								<h2>Logo &amp; Branding</h2>
								<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>

								<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>

								<div class="row">
									<div class="col-md-6">
										<h2 class="uppercase">Pixel perfect</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
									<div class="col-md-6">
										<h2 class="uppercase">User Interface Expert</h2>
										<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis</p>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>


	<div id="gtco-started">
		<div class="gtco-container">
			<div> <!--  class="row animate-box" -->
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 id="Signup">Get Started</h2>
				</div>
			</div>

		</div>
	</div>



	<!------ Footer -------->
<?php
include ('footer.html');
?>
<script>
$(document).ready(function(){
    $('#datatable').DataTable({
			"pageLength": 5,
			"bLengthChange" : false,
		});
});
</script>
