<!DOCTYPE HTML>

<html>
	<head>
		<title>Galerijos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.min.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
		<!-- Nav -->	
		<?php include 'menuru.php';?>
		<?php include 'config.php';?>
		<!-- Main -->
		<div id="main">

		<!-- One -->


		<!-- Galleries -->

		<section class="wrapper style1">
			<div class="inner">
				<!-- <header class="align-center">
					<h2>Galerijos</h2>
					<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
				</header> -->
		


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

					
						<div class="gallery">	
						<header class="align-center">
						<h3><?php echo ($row['gallerytitle']); ?></h3>
						<p><?php echo "<a href='galleryru.php?galleryid=".$row['galleryid']."' class='button alt scrolly'><span>Смотреть</span></a>"; ?>
						</p>
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
									<div class="media" style="background-image: url(<?php echo ($row2['imglink2']); ?>);">									
										<a href="<?php echo ($row2['imglink']); ?>"><img src="<?php echo ($row2['imglink2']); ?>" alt="" title="<?php echo ($row2['imgtitle']); ?>" /></a>
									</div>
							<?php
										}
									// Free result set
									mysqli_free_result($result2);
								} else{
									echo "Нет фото галереи";
								}
							} else{
								echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
							}
							?>
							</div>	
																	
						</div>	
					
			
<!-------------------------------------------------------------------------------------------------------------------------->

			
				<?php
						}
						// Free result set
						mysqli_free_result($result);
					} else{
						echo "Нет фото галереи";
					}
				} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
				?>

				</section>

			</div>
		</section>				
		<!-- Footer -->
		<?php include 'footerru.php';?>


	</body>
</html>