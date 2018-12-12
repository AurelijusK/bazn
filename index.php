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
									<?php


									// $sql = "SELECT * FROM images
									// ORDER BY imgtime DESC";
									$sql = "SELECT images.imgid, images.imggallery, images.imglink, images.imgtitle, gallery.galleryid, gallery.gallerytitle, gallery.gallerydate
									FROM images
									JOIN gallery ON images.imggallery = gallery.galleryid
									ORDER BY images.imgtime DESC
									LIMIT 8";

									if($result = mysqli_query($conn, $sql)){
										if(mysqli_num_rows($result) > 0){

												while($row = mysqli_fetch_array($result)){	
									?>				
									
										<div class="media" style="background-image: url(<?php echo ($row['imglink']); ?>);">

											<a href="<?php echo ($row['imglink']); ?>"><img src="<?php echo ($row['imglink']); ?>" alt="" title="<?php echo ($row['imgtitle']); ?>. Galerija: <?php echo ($row['gallerytitle']); ?> <?php echo($row['gallerydate']); ?>" /></a>
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
								<header class="align-center">
								<?php echo "<a href='galleries.php' class='button big alt scrolly'><span>Galerijos</span></a>"; ?>
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