<html>
    <head>
	<title>PuEblAchAn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="iso-8859-1"/>
    </head>
    <body>
	<div class="results"> 
	    <section id="content"> 
		<br/>
		<center><strong><a href="./newThreadForm.php">Crear nuevo tema</a></strong></center>
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
