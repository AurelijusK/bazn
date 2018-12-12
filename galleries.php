<!DOCTYPE HTML>

<html>
	<head>
		<title>Galerijos</title>
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
					<header class="align-center">
						<h2>Galerijos</h2>
						<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
					</header>
				</div>
			</section>

					<!-- Gallery -->
					<section id="galleries">
					<?php

					$sql = "SELECT * FROM gallery
					ORDER BY gallerytime DESC";
					if($result = mysqli_query($conn, $sql)){
						if(mysqli_num_rows($result) > 0){

								while($row = mysqli_fetch_array($result)){	
					?>	

<!-------------------------------------------------------------------------------------------------------------------------->
							<!-- Photo Galleries -->
					<section class="wrapper style1">
						<div class="inner">		
							<div class="gallery">	
							<header class="align-center">
							<h3><?php echo ($row['gallerytitle']); ?></h3>
							<p><?php echo "<a href='gallery.php?galleryid=".$row['galleryid']."' class='button alt scrolly'><span>Žirūėti</span></a>"; ?>
							<?php echo "<a href='galleries.php' class='button alt scrolly'><span>Redaguoti</span></a>"; ?></p>
							</header>									
								<div class="content">	
								<?php			
								$sql2 = "SELECT *
								FROM images
								WHERE images.imggallery='" . $row['galleryid'] . "'
								
								ORDER BY images.imgtime DESC
								LIMIT 4";
								if($result2 = mysqli_query($conn, $sql2)){
									if(mysqli_num_rows($result2) > 0){
			
										while($row2 = mysqli_fetch_array($result2)){	
								?>							
										<div class="media" style="background-image: url(<?php echo ($row2['imglink']); ?>);">									
											<a href="<?php echo ($row2['imglink']); ?>"><img src="<?php echo ($row2['imglink']); ?>" alt="" title="<?php echo ($row2['imgtitle']); ?>" /></a>
										</div>
								<?php
											}
										// Free result set
										mysqli_free_result($result2);
									} else{
										echo "Galerijoje nėra įkelta jokiu fotografijų.";
									}
								} else{
									echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
								}
								?>
								</div>	
																		
							</div>	
						</div>
					</section>
<!-------------------------------------------------------------------------------------------------------------------------->

				
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

					</section>




			<section class="wrapper style1">
				<div class="inner">
					<header class="align-center">
						<p>Sukurti naują nuotraukų galeriją</p>
						<?php echo "<a href='gallerynew.php' class='button big alt scrolly'><span>Kurti</span></a>"; ?>
					</header>
				</div>
			</section>			
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