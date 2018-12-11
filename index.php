<!DOCTYPE HTML>

<html>
	<head>
		<title>Bažnyčia</title>
		<meta charset="UTF-8">
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	</head>
	<body>


			
		<!-- Nav -->
		<?php include 'menu.php';?>
		<?php include 'config.php';?>
			<!-- Banner -->
			<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly.
			-->
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h1>This is Broadcast</h1>
							<p>Morbi eu purus eget urna interdum dignissim sed consectetur augue<br />
							vivamus vitae libero in nulla iaculis eleifend non sit amet nulla.</p>
						</header>
						<a href="#main" class="button big alt scrolly"><i class="fas fa-chevron-down"></i></a>
					</div>

				</section>

		<!-- Main -->
			<div id="main">

			<!-- One -->
				<section class="wrapper style1">
					<div class="inner">
						<header class="align-center">
							<h2>Nam eu nisi non ante sodale</h2>
							<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
						</header>
						<!-- 2 Column Video Section -->
							
							<div class="flex flex-2">
							<?php


							$sql = "SELECT * FROM video
							ORDER BY videotime DESC
							LIMIT 2";

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

			<!-- Two -->
				<!-- Last Post -->


			<?php


			$sql = "SELECT * FROM post
			ORDER BY posttime DESC
			LIMIT 2";

			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){	

			?>
							<section class="wrapper style1">
								<div class="inner">
									<header class="align-center">
										<h2><?php echo $row['posttitle']; ?></h2>
										<p><?php echo $row['postautor'].'  '.$row['postdate']; ?></p>
									</header>
				
									<p><?php echo $row['postcontent']; ?></p>
									<header class="align-center">
									<?php echo "<a href='post.php?postid=".$row['postid']."' class='button big alt scrolly'><span>Daugiau naujienų</span></a>"; ?>
									</header>
								</div>
							</section>
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

			<!-- Three -->
				<section class="wrapper ">
					<div class="inner">
						<header class="align-center">
							<h2>Aliquam ipsum purus dolor</h2>
							<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
						</header>

						<!-- Gallery -->
						<section id="galleries">

							<!-- Photo Galleries -->
								<div class="gallery">
						
									<div class="content">
										<div class="media">
											<a href="images/fulls2/01.jpg"><img src="images/fulls2/01.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/05.jpg"><img src="images/fulls2/05.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/08.jpg"><img src="images/fulls2/08.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/02.jpg"><img src="images/fulls2/02.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/06.jpg"><img src="images/fulls2/06.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/04.jpg"><img src="images/fulls2/04.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/03.jpg"><img src="images/fulls2/03.jpg" alt="" title="This right here is a caption." /></a>
										</div>
										<div class="media">
											<a href="images/fulls2/07.jpg"><img src="images/fulls2/07.jpg" alt="" title="This right here is a caption." /></a>
										</div>
									</div>
																								
								</div>
								<header class="align-center">
								<?php echo "<a href='gallery.php' class='button big alt scrolly'><span>Galerija</span></a>"; ?>
								</header>

						</section>


					</div>
				</section>

			</div>

		<!-- Footer -->
		<?php include 'footer.php';?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>