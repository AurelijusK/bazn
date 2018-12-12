<!DOCTYPE HTML>

<html>
	<head>
		<title>Naujienos</title>
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

		<!-- Last Post -->


		<?php

		if (!empty($_GET['postid'])){
		$sql = "SELECT * FROM post
		WHERE postid=".$_GET['postid']." LIMIT 1";
		}
		else{
		$sql = "SELECT * FROM post
		ORDER BY posttime DESC
		LIMIT 1";
		}

		if($result = mysqli_query($conn, $sql)){
			if(mysqli_num_rows($result) > 0){
				$row = mysqli_fetch_assoc($result);

		?>
						<section class="wrapper style1">
							<div class="inner">
							<header class="align-center">
								<h2><?php echo $row['posttitle']; ?></h2>
								<p><?php echo $row['postautor'].'  '.$row['postdate']; ?></p>
							</header>
				
								<p><?php echo $row['postcontent']; ?></p>
						
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
						LIMIT 3";

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
			<!-- All Posts -->


			<?php


			$sql = "SELECT * FROM post
			ORDER BY posttime DESC";

			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){

						while($row = mysqli_fetch_array($result)){	
			?>				
						<div class="col">	
						<header class="align-center">
							<h3><?php echo $row['posttitle']; ?></h3>
							<p><?php echo $row['postautor'].'  '.$row['postdate']; ?></p>
						</header>
							<div  class="shorttext">
							<p><?php echo $row['postcontent']; ?></p>
							</div>
						<header class="align-center">
						<?php echo "<a href='post.php?postid=".$row['postid']."' class='button alt scrolly'><span>Skaityti</span></a>"; ?>
						</header>
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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>