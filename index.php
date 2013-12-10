<?php
require_once 'init.php';
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<meta name="author" content="Florian Bucher">
		<title>Never ending Beer - AITEC HS13</title>
		
		<link rel="stylesheet" href="css/structure.css" media="screen and (min-width:1300px)">
		<link rel="stylesheet" href="css/structure_small.css" media="screen and (max-width:1299px)">
		<!--<link rel="stylesheet" href="css/structure.css" media="not screen and (min-width:1300px)">-->
		<link id="designCSS" rel="stylesheet" href="css/design_sun.css" media="screen">
		
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.flot.min.js"></script>		
		<script type="text/javascript" src="js/jquery.flot.time.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<script type="text/javascript" src="js/moisture_graph.js"></script>
	</head>
	<body>	
		<div id="wrapper">
			<header>
				<h1>Never ending Beer</h1>
			</header>
			<nav>
				<h3>Navigation</h3>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?<?php echo Config::$PAGE_KEY; ?>=<?php echo Config::$PAGE_CONFIG; ?>">Konfiguration</a></li>
					<li><a href="index.php?<?php echo Config::$PAGE_KEY; ?>=<?php echo Config::$PAGE_FUNCTIONS; ?>">Weiteres</a></li>
				</ul>
				<br>
				<h3>Compliance</h3>
				<p class="validator">
				    <a href="http://validator.w3.org/check?uri=referer">
				        <img  style="border:0;width:88px;height:34px"
				         	src="http://www.w3.org/html/logo/badge/html5-badge-h-css3-graphics-semantics.png"
				         	alt="Valides HTML5!">
				    </a>
				</p>
				<p class="validator">
				    <a href="http://jigsaw.w3.org/css-validator/check/referer">
				        <img style="border:0;width:88px;height:31px"
				            src="http://jigsaw.w3.org/css-validator/images/vcss"
				            alt="CSS ist valide!">
				    </a>
				</p>

			</nav>
			<section>
				<h2>Welcome to the page</h2>
				<p>
					Diese Seite wurde im Ramed des AITEC Moduls im HS13 erstellt.
				</p>
				<?php 
					$page_folder = 'page/';
					$page_suffix = '.php';
					if(isset($_GET[Config::$PAGE_KEY])) {
						include_once($page_folder.$_GET[Config::$PAGE_KEY].$page_suffix);
					} else {
				?>
						<div id="graph" style="width:700px;height:200px;"></div>
				<?php 
						include_once($page_folder.Config::$PAGE_HOME.$page_suffix);
					}
				?>
			</section>
			<footer>
				<span>Copyright &copy; <time datetime="2013-02-28">2013</time> by Florian Bucher</span>
				<span id="currentTime">loading clock...</span>
			</footer>	
		</div>
	</body>
</html>
