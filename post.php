<!DOCTYPE HTML>

<html>
	<head>
		<title>Naujienos</title>
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
								<button class='button' style="background:darkred" onclick="window.location.href='postdelete.php?postid=<?php echo ($row['postid']); ?>'"><i class="far fa-trash-alt"></i></button>
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


		<!-- Two -->
		<section class="wrapper style1">
			<div class="inner">
				<!-- <header class="align-center">
					<h2>Aliquam ipsum purus dolor</h2>
					<p>Cras sagittis turpis sit amet est tempus, sit amet consectetur purus tincidunt.</p>
				</header> -->
			<div class="flex flex-3">
			<!-- All Posts -->


			<?php


			$sql = "SELECT * FROM post			
			ORDER BY posttime DESC
			LIMIT 6";

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



	</body>
</html>