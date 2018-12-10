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
									<h2>Nam eu nisi non ante sodale</h2>
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
								<p>Curabitur venenatis lorem ut finibus finibus. Ut quis eleifend libero, nec ultricies metus. Morbi magna risus, congue sit amet pellentesque eget, malesuada ut justo. Sed ac pretium quam. Ut vel ex vitae enim sagittis posuere ac id erat. Vestibulum vel ullamcorper tellus. Donec sapien massa, venenatis ac felis vel, vestibulum sagittis enim. Maecenas ut egestas lorem, nec luctus ligula. Vestibulum neque diam, aliquet non enim a, cursus lacinia metus. Aenean fringilla luctus rhoncus. Integer vulputate massa ac suscipit venenatis. Integer luctus elit non nulla fringilla, ullamcorper maximus sem congue. Integer tristique eu nisi nec fermentum. Ut malesuada quis massa at ultricies.</p>
								<p>Donec molestie tellus eu tincidunt dignissim. Sed sollicitudin bibendum ultricies. Vivamus tristique justo lacinia dui tempus consequat. Sed hendrerit justo in nisl auctor, id rutrum tortor congue. Vivamus mattis nibh et sem rutrum, vel viverra purus viverra. Donec et justo at orci euismod hendrerit vel vel neque. Donec gravida ipsum in augue volutpat laoreet. Ut lobortis turpis sit amet sodales ultrices.</p>
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
						-- LIMIT 3 OFFSET 1";

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

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>