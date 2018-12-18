<!DOCTYPE HTML>

<html>
	<head>
		<title>Galerijos</title>
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
		<section class="wrapper style1">
		<div class="inner">
			
			<!-- Gallery -->
			<section id="galleries">

			<!-- Photo Galleries -->
				<div class="gallery">
				<?php
			$sql = "SELECT * FROM gallery
			WHERE galleryid=".$_GET['galleryid']." LIMIT 1";
			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){				
					$row = mysqli_fetch_assoc($result); ?>
						<header class="align-center">
						<h3><?php echo ($row['gallerytitle']); ?></h3>
						<p><?php echo ($row['gallerydate']); ?></p>
						</header>		
					<form action="galleryeditfin.php?galleryid=<?php echo $_GET['galleryid'] ?>" method="post" enctype="multipart/form-data">	
					Nuotraukos aprasymas:
					<input type="text"   name="imgtitle" value=" ">
					Pasirinkti foto:
					<label class="cabinetpost">
					<input type="file" name="img" class="filepost" />
					</label>
					<button type="submit" class="button alt">Įkelti</button>       
					</form>					
					
 				<?php
				mysqli_free_result($result);
				} else{
				echo "No records matching your query were found.";
				} 
			} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn); }
			?>

					<div class="content">
					<?php


					$sql2 = "SELECT * FROM images
					WHERE imggallery='" . $_GET['galleryid'] . "'
					ORDER BY imgtime DESC";
					// $sql = "SELECT images.imgid, images.imggallery, images.imglink, images.imglink2, images.imgtitle, gallery.galleryid, gallery.gallerytitle, gallery.gallerydate
					// FROM images
					// JOIN gallery ON images.imggallery = gallery.galleryid
					// ORDER BY images.imgtime DESC
					// LIMIT 8";

					if($result2 = mysqli_query($conn, $sql2)){
						if(mysqli_num_rows($result2) > 0){

								while($row2 = mysqli_fetch_array($result2)){	
					?>				
					
						<div class="media" style="background-image: url(<?php echo ($row2['imglink2']); ?>);">
						<button class='button' style="background:darkred" onclick="window.location.href='imagedelete.php?imgid=<?php echo ($row2['imgid']); ?>'"><i class="far fa-trash-alt"></i></button>
						<a href="<?php echo ($row2['imglink']); ?>"><img src="<?php echo ($row2['imglink2']); ?>" alt="" title="<?php echo ($row2['imgtitle']); ?>" /></a>
						</div>
						
				

					<?php
							}
							// Free result set
							mysqli_free_result($result2);
						} else{
							echo "No records matching your query were found.";
						}
					} else{
						echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
					}


					?>
					</div>
				<br>
				<p>Ištrinti galeriją "<?php echo ($row['gallerytitle']); ?>" su visomis joje esančiomis nuotraukomis</p>
				<?php echo "<a  href='gallerydelete.php?galleryid=".$row['galleryid']."' class='button alt scrolly'><span>Trinti</span></a>"; ?>														
				</div>
		
				<header class="align-center">
				<?php echo "<a href='galleries.php' class='button big alt scrolly'><span>Visos galerijos</span></a>"; ?>
				</header>

			</section>

		</div>
		</section>
		</div>		
		<!-- Footer -->
		<?php include 'footer.php';?>


	</body>
</html>   