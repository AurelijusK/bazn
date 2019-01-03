<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.min.css" />

<!-- Header -->
<header id="header">
<div class='logo'><a href="index.php"><img src="images/language/lithuania.svg" height="25px">  </a></div>
    <?php session_start(); require_once 'session.php';?>
    <?php if(isUserLogged()) { echo "Prisijungta ".$_SESSION['name']."  "; }?>
    <a href="#menu">Меню</a>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
   
        <li><a href="indexru.php">Начало</a></li>
        <li><a href="aboutru.php">Мы верим</a></li>
        <li><a href="videoru.php">Видео</a></li>
        <li><a href="galleriesru.php">Фото галерея</a></li>
        <li><a href="postru.php">Новости</a></li>
        

    </ul>
</nav>