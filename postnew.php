<!DOCTYPE HTML>

<html>
	<head>
		<title>Naujienos įkėlimas</title>
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
                <form action="postnewfin.php" method="post" enctype="multipart/form-data">
                   
                    <p>Naujienos pavadinimas:
                    <input class="inputfieldh" type="text"  required name="posttitle" value="" ></p>   
                    <p>Naujienos autorius:
                    <input class="inputfieldh" type="text"   name="postautor" value="" ></p>
					<p>Naujienos tekstas:
                    <textarea rows="10" name="postcontent" id="postcontent" cols="111" class="inputfieldp" required></textarea></p>
                    <p><?php echo date("Y-m-d");?></p><br>
                    
                    <button type="submit" class="button alt scrolly">Įkelti</button>       
                   
                </form>
				<?php } else {
					echo "Neprisijungta! Negalima ikelti naujienų.";
				}
				?>
            </div>
        </section>
        </div>


		<!-- Footer -->
		<?php include 'footer.php';?>



	</body>
</html>        