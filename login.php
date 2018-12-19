<!DOCTYPE HTML>

<html>
	<head>
		<title>Login adm</title>
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

                <div  class="form">
                <form action="logfin.php" method="post">
                   
                <p>Įvesti slaptažodį:
                <input class="inputfield" type="password" name="pass"></p>
                <button type="submit" class="button big alt scrolly">Prisijungti</button>       
                   
                </form>
                </div>
            </div>
        </section>
        </div>


		<!-- Footer -->
		<?php include 'footer.php';?>



	</body>
</html>        

