<html>
    <head>
	<title>PuEblALeAKs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="iso-8859-1"/>
    </head>
    <body>
	<header> 
	</header>
	<nav> 
	</nav>
	<div class="results"> 
	    <section id="content"> 
		<br/>
		<center><strong><a href="./newThreadForm.php">Crear nuevo tema de discusi�n</a></strong></center>
		<br/>
		<br/>
		<br/>
		<br/>
		<?php 
		include "leaks.php";
		renderAllThreadsShort();
		?>
	    </section> 
	</div>
	<footer> 
	</footer>
	</div>
    </body>
</html>
