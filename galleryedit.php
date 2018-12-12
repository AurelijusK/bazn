<!DOCTYPE HTML>

<html>
	<head>
		<title>Galerijos kūrimas</title>
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

<section class="wrapper style1">
<div class="inner">
	<?php
	$sql = "SELECT * FROM gallery
	WHERE galleryid=".$_GET['galleryid']." LIMIT 1";


	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
							
			$row = mysqli_fetch_assoc($result);
	?>
				<header class="align-center">
				<h2><?php echo ($row['gallerytitle']); ?></h2>
				<p><?php echo ($row['gallerydate']); ?></p>
				</header>
			<form action="galleryeditfin.php?galleryid=<?php echo $_GET['galleryid'] ?>" method="post" enctype="multipart/form-data">
					
				<p>Nuotraukos aprasymas: </p>
				<input class="inputfieldh" type="text"   name="imgtitle" value="" required><br>
				
				<p>Pasirinkti foto: </p><br>
					<label class="cabinetpost">
					<input type="file" name="img" class="filepost" /><br>
					</label>
					<button type="submit" class="button big alt scrolly">Taip</button>       
			</form>
    <?php

			mysqli_free_result($result);
		} else{
			echo "No records matching your query were found.";
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	}


	?>
</div>
</section>
<section class="wrapper style1">
<div class="inner">
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
									
										<div class="media" style="background-image: url(<?php echo ($row['imglink']); ?>);">
										
								
											<a href="<?php echo ($row['imglink']); ?>"><img src="<?php echo ($row['imglink']); ?>" alt="" title="<?php echo ($row['imgtitle']); ?>" /></a>
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

		<!-- Scripts -->
			<!-- <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script> -->

	</body>
</html>           