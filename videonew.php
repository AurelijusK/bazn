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

				<?php if(isUserLogged()) { ?>
                <form action="videonewfin.php" method="post" enctype="multipart/form-data">
                   
                    <p>Video pavadinimas:
                    <input class="inputfieldh" type="text"  required name="videotitle" value="" > </p>                               
                    <p>Čia ikelkite nuorodą iš Youtube nukopijave "Copy embed code"
                    <input class="inputfieldh" type="text"  required name="videolink" value="" ></p>
                    
                    <p><?php echo date("Y-m-d");?></p><br>
                    
                    <button type="submit" class="button alt scrolly">Taip</button>       
                   
                </form>
				<?php } else {
					echo "Neprisijungta! Negalima ikelti video";
				}
				?>
            </div>
        </section>
        </div>


		<!-- Footer -->
		<?php include 'footer.php';?>



	</body>
</html>        