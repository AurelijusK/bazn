<!DOCTYPE HTML>

<html>
	<head>
		<title>Video įkėlimas</title>
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


                <form action="videonewfin.php" method="post" enctype="multipart/form-data">
                   
                    <p>Video pavadinimas: </p>
                    <input class="inputfieldh" type="text"  required name="videotitle" value="" ><br>
                  
                                    
                    <p>Čia ikelkite nuorodą iš Youtube nukopijave "Copy embed code"</p>
                    <input class="inputfieldh" type="text"  required name="videolink" value="" ><br>
                    
                    <p><?php echo date("Y-m-d");?></p><br>
                    
                    <button type="submit" class="button big alt scrolly">Taip</button>       
                   
                </form>
            </div>
        </section>
        </div>


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