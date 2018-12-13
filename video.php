<!DOCTYPE HTML>

<html>
	<head>
		<title>Video</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
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
		WHERE videoid=".$_GET['videoid']." LIMIT 1";
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
								<header class="align-center">
									<h2>Video įrašai</h2>
									<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
								</header>
								<div class="video">
									<div class="video-wrapper">
									<?php echo $row['videolink']; ?>
									</div>
									<p class="caption">
									<?php echo $row['videotitle'] . "<br>" . $row['videodate']; ?>
									</p>
								</div>
								
								<header class="align-center">
								<p>Įkelti naują video įrašą</p>
								<?php echo "<a href='videonew.php' class='button big alt scrolly'><span>Įkelti</span></a>"; ?>
								</header>
								</div>
						</section>
		<?php
				// Free result set
				mysqli_free_result($result);
			} else{
				echo "No records matching your query were found.";
			}
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}


		?>
		<!-- Three -->
			<section class="wrapper ">
				<div class="inner">
					<header class="align-center">
						<h2>Aliquam ipsum purus dolor</h2>
						<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
					</header>

					<!-- 3 Column Video Section -->
						<div class="flex flex-3">
						<!-- All Video -->


						<?php


						$sql = "SELECT * FROM video
						ORDER BY videotime DESC
						LIMIT 6";

						if($result = mysqli_query($conn, $sql)){
							if(mysqli_num_rows($result) > 0){

									while($row = mysqli_fetch_array($result)){	
						?>				
										<div class="video col">
											<div class="video-wrapper">
											<?php echo $row['videolink']; ?>
											</div>
											<p class="caption">
											<?php echo $row['videotitle'] . "<br>" . $row['videodate']; ?>
											</p>
											<?php echo "<a href='video.php?videoid=".$row['videoid']."' class='link'><span>Click Me</span></a>"; ?>
										</div>
						<?php
									}
								// Free result set
								mysqli_free_result($result);
							} else{
								echo "No records matching your query were found.";
							}
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
						}


						?>
						</div>
				</div>
			</section>

		</div>


		<!-- Four -->
		<section class="wrapper ">
			<div class="inner">
			<header class="align-center">
							<h2>Aliquam ipsum purus dolor</h2>
							<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
						</header>
			<div class="flex flex-2">
			<!-- All Video -->


			<?php


			$sql = "SELECT * FROM video
			ORDER BY videotime DESC";

			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){

						while($row = mysqli_fetch_array($result)){	
			?>				
							<div class="video col">
								<div class="video-wrapper">
								<?php echo $row['videolink']; ?>
								</div>
								<p class="caption">
								<?php echo $row['videotitle'] . "<br>" . $row['videodate']; ?>
								</p>
								<?php echo "<a href='video.php?videoid=".$row['videoid']."' class='link'><span>Click Me</span></a>"; ?>
							</div>
			<?php
						}
					// Free result set
					mysqli_free_result($result);
				} else{
					echo "No records matching your query were found.";
				}
			} else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}


			?>

			</div>
			</div>
		</section>

		<!-- Footer -->
		<?php include 'footer.php';?>


	</body>
</html>