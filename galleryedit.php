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

        <form action="galleryeditfin.php" method="post" enctype="multipart/form-data">
            <div class="inputblockh"> 
            <p>Antraštė: </p><br>
            <input class="inputfieldh" type="text"  required name="title" value="" ><br>
            </div>
            <p>Tekstas: </p><br>
            <textarea rows="30" name="content" id="content" cols="111" class="inputfieldp"></textarea><br>
            <div class="inputblockpost">
            <p>Pasirinkti foto: </p><br>
                <label class="cabinetpost">
                   
                <input type="file" name="img" class="filepost" /><br>
                </label>
            </div>
            <p><?php echo $_SESSION['name'].' '.$_SESSION['surname'];?></p><br>
            <p><?php echo date("Y-m-d");?></p><br>
            <div class="submitblockpost">
                <button type="submit" class="submitbtnpost">Taip</button>       
            </div>
        </form>
 

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