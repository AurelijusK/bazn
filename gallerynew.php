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

				<?php if(isUserLogged()) { ?>
                <form action="gallerynewfin.php" method="post" enctype="multipart/form-data">
                   
                    <p>Galerijos pavadinimas:
                    <input class="input" type="text"  required name="gallerytitle" value="" ></p>
                    <p><?php echo date("Y-m-d");?></p><br>
                    <button type="submit" class="button alt scrolly">Sukurti</button>       
                   
                </form>
				<?php } else {
					echo "Neprisijungta! Negalima ikelti nuotraukų";
				}
				?>
            </div>
        </section>
        </div>


		<!-- Footer -->
		<?php include 'footer.php';?>



	</body>
</html>        