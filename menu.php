<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.min.css" />

<!-- Header -->
<header id="header">
<div class='logo'><a href="indexru.php"><img src="images/language/russia.svg" height="25px"></a></div>
    <?php session_start(); require_once 'session.php';?>
    <?php if(isUserLogged()) { echo "Prisijungta ".$_SESSION['name']."  "; }?>
    <a href="#menu">Meniu</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
    <?php if(isUserLogged()) {  ?>
        <li><a href="index.php">Pradžia</a></li>
        <li><a href="about.php">Mes tikime</a></li>
        <li><a href="videoadm.php">Video</a></li>
        <li><a href="galleriesadm.php">Galerijos</a></li>
        <li><a href="postadm.php">Naujienos</a></li>
        <li><a href="logout.php">Logout admin</a></li>
        
    <?php } 
    else { ?>
        <li><a href="index.php">Pradžia</a></li>
        <li><a href="about.php">Mes tikime</a></li>
        <li><a href="video.php">Video</a></li>
        <li><a href="galleries.php">Galerijos</a></li>
        <li><a href="post.php">Naujienos</a></li>
        <li><a href="login.php">Login admin</a></li>
    <?php } ?>
    </ul>
</nav>