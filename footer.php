<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />

<!-- Footer -->
<footer id="footer">
				<div class="inner">
					<div class="flex flex-3">
						<div class="col">
							<h3>Kontaktai</h3>
							<ul class="alt">
								<li><a href="#">Nascetur nunc varius commodo.</a></li>
								<li><a href="#">Vis id faucibus montes tempor</a></li>
								<li><a href="#">Massa amet lobortis vel.</a></li>
								<li><a href="#">Nascetur nunc varius commodo.</a></li>
							</ul>
						</div>
						<div class="col">
							<h3>Tarnavimai</h3>
							<ul class="alt">
								<li><a href="#">Nascetur nunc varius commodo.</a></li>
								<li><a href="#">Vis id faucibus montes tempor</a></li>
								<li><a href="#">Massa amet lobortis vel.</a></li>
								<li><a href="#">Nascetur nunc varius commodo.</a></li>
							</ul>
						</div>
						<div class="col">
						<?php if(isUserLogged()) {  ?>
								
							<h3><a href="index.php">Pradžia</a></h3>
							<ul class="alt">
				
								<li><a href="about.php">Mes tikime</a></li>
								<li><a href="videoadm.php">Video</a></li>
								<li><a href="galleriesadm.php">Galerijos</a></li>
								<li><a href="postadm.php">Naujienos</a></li>

							<?php } 
							else { ?>
							<h3><a href="index.php">Pradžia</a></h3>
							<ul class="alt">
								
								<li><a href="about.php">Mes tikime</a></li>
								<li><a href="video.php">Video</a></li>
								<li><a href="galleries.php">Galerijos</a></li>
								<li><a href="post.php">Naujienos</a></li>
								
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="copyright">
					<!-- <ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-snapchat"><span class="label">Snapchat</span></a></li>
					</ul> -->
					Copyright &copy; 2018 by <a href="https://www.facebook.com/aurelijanas" target="_blank">AK</a>.
				</div>
			</footer>
			<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>