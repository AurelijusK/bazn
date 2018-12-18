<!DOCTYPE HTML>

<html>
	<head>
		<title>Video</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	</head>
	<body class="subpage">

		<!-- Header -->
		<!-- Nav -->	
		<?php include 'menu.php';?>
		<?php include 'config.php';?>
		<!-- Main -->
		<div id="main">

		<!-- One -->

		<!-- Last Video -->


		<?php

		if (!empty($_GET['videoid'])){
		$sql = "SELECT * FROM video
		WHERE videoid=".$_GET['videoid']." ";
		}
		else{
		$sql = "SELECT * FROM video
		ORDER BY videotime DESC
		LIMIT 1";
		}

		if($result = mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);

		?>
						<section class="wrapper style1">
							<div class="inner">
								<!-- <header class="align-center">
									<h2>Video įrašai</h2>
									<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
								</header> -->
								<div class="video">
									<div class="video-wrapper">
									<iframe width="640" height="360" src="https://www.youtube.com/embed/live_stream?channel=UCblKJJFWw9hnifb7A6P3Dww" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
									<p class="caption">
									Tiesioginė transliacija
									</p>
									
								</div>
								
								<header class="align-center">
							
								</header>
								</div>
						</section>
		<?php
				// Free result set
				mysqli_free_result($result);
			} else{
				echo "Video įrašas ištrintas";
			}
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}


		?>
		<!-- Two -->
			<section class="wrapper style1" id="Two" >
				<div class="inner" >
					<!-- <header class="align-center">
						<h2>Aliquam ipsum purus dolor</h2>
						<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
					</header> -->
					<form method="post" >
							
							<p>Video pagal data:&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="inputfield" type="date" name="day" value="<?php echo date("Y-m-d");?>">
							<button type="submit" class="button alt"><span><b>Taip</b></span></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Įkelti naują video įrašą&nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo "<a href='videonew.php' class='button alt'><span>Įkelti</span></a>"; ?></p>
						
					</form>
					
					<!-- 3 Column Video Section -->
						<div class="flex flex-3">
						<!-- All Video -->


						<?php
						
						if (!isset($_POST['day'] )){
							
						$sql2 = "SELECT * FROM video
						ORDER BY videotime DESC						
						LIMIT 9";

							if($result2 = mysqli_query($conn, $sql2)){
								if(mysqli_num_rows($result2) > 0){

										while($row2 = mysqli_fetch_array($result2)){	
											
							?>				
											<div class="video col">
												<div class="video-wrapper">
												<?php echo $row2['videolink']; ?>
												</div>
												<p class="caption">
												<?php echo $row2['videotitle'] . "<br>" . $row2['videodate']; ?>
												</p>
												<?php echo "<a href='video.php?videoid=".$row2['videoid']."' class='link'><span>Click Me</span></a>"; 
												?>
												
											</div>
							<?php
											
										}
									// Free result set
									mysqli_free_result($result2);
								} else{
									echo "Tokia diena nebuvo video įrašų.";
								}
							} else{
								echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
							}

						} else {

						$sql3 = "SELECT * FROM video
						ORDER BY videotime DESC";

							if($result3 = mysqli_query($conn, $sql3)){
								if(mysqli_num_rows($result3) > 0){

										while($row3 = mysqli_fetch_array($result3)){	
											if ( (isset($_POST['day']))and(($_POST['day'])==($row3['videodate'])) ){   
							?>				
											<div class="video col">
												<div class="video-wrapper">
												<?php echo $row3['videolink']; ?>
												</div>
												<p class="caption">											
												<?php echo $row3['videotitle'] . "<br>" . $row3['videodate']; ?>
												</p>
												<?php echo "<a href='video.php?videoid=".$row3['videoid']."' class='link'><span>Click Me</span></a>"; 
												 ?>
												
											</div>
							<?php
											}
										}
									// Free result set
									mysqli_free_result($result3);
								} else{
									echo "Tokia diena nebuvo video įrašų.";
								}
							} else{
								echo "ERROR: Could not able to execute $sql3. " . mysqli_error($conn);
							}
						}		

						?>
						</div>
				</div>
			</section>

		</div>



		<!-- Footer -->
		<?php include 'footer.php';?>


	</body>
</html>