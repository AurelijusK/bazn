<!DOCTYPE HTML>

<html>
	<head>
		<title>Galerija</title>
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

		<!-- Galleries -->

			<section class="wrapper style1">
			<div class="inner">
						<?php
						$sql = "SELECT *
						FROM gallery
						WHERE galleryid=".$_GET['galleryid']."
						ORDER BY gallerytime DESC";
						if($result = mysqli_query($conn, $sql)){
							if(mysqli_num_rows($result) > 0){

									$row = mysqli_fetch_array($result)
						?>
						<header class="align-center">
							<h2><?php echo ($row['gallerytitle']); ?></h2>
							<p><?php echo ($row['gallerydate']); ?></p>
						</header>
						<?php
							}
						}				
						?>
						<!-- Gallery -->
						<section id="galleries">

							<!-- Photo Galleries -->
								<div class="gallery">
					
									<div class="content">
									<?php



									$sql = "SELECT *
									FROM images
									WHERE imggallery=".$_GET['galleryid']."
									ORDER BY imgtime DESC";

									if($result = mysqli_query($conn, $sql)){
										if(mysqli_num_rows($result) > 0){

												while($row = mysqli_fetch_array($result)){	
									?>				
									
										<div class="media" style="background-image: url(<?php echo ($row['imglink2']); ?>);">
										
								
											<a href="<?php echo ($row['imglink']); ?>"><img src="<?php echo ($row['imglink2']); ?>" alt="" title="<?php echo ($row['imgtitle']); ?>" /></a>
										</div>

									<?php
											}
											// Free result set
											mysqli_free_result($result);
										} else{
											echo "Galerijoje nėra įkelta jokiu fotografijų.";
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


		<!-- Footer -->
		<?php include 'footer.php';?>

	
	</body>
</html>