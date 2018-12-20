<!DOCTYPE HTML>

<html>
	<head>
		<title>Login adm</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.min.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
		<!-- Nav -->	
		<?php include 'menu.php';?>
		
		<!-- Main -->
		<div id="main">

        <section class="wrapper style1">
            <div class="inner">
            <?php 
            if(isUserLogged()) {
                if(isset($_SESSION["id"])){
                    unset($_SESSION["id"]);
                    unset($_SESSION["name"]);
                }
                session_destroy();
                session_start();
            }
            
                $_POST['pass']=md5($_POST['pass']);
                
                $pass="0d4437ac32d5db067466cd96e7e086c9";
                

                    if ($pass==$_POST['pass']){

                        $_SESSION['id']=1;
                        $_SESSION['name']="Admin";

                    header("Location:index.php");
                    

                    } else {
                        echo "<br>Prisijungimas nepavyko, neteisingas slaptažodis!<br><a href='index.php'>Vartotojo zona</a>";
                    }
            ?>
            </div>
        </section>
        </div>


		<!-- Footer -->
		<?php include 'footer.php';?>



	</body>
</html>        