<html>
    <head>
	<title>PuEblALeAKs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="iso-8859-1"/>
    </head>
    <body>
	<div class="results"> 
	    <section id="content"> 
		<br/>
		<center><strong><a href="./test.php">Volver al índice de temas</a></strong></center>
		<br/>
		<br/>
		<br/>
		<br/>
		<?php 
		include "leaks.php";
		$id = $_GET['id'];
		echo renderThread($id);
		?>
		<form action="newMessagePost.php" method="POST">
		    <?php
		    $id = $_GET['id'];
		    echo "<input type=\"hidden\" name=\"id\" value=\"$id\"/>";
		    ?>
		    <center><strong>Responder:</strong></center><br/>
		    <br/>
		    <center><textarea name="message" style="width:90%;border:none;" rows="12"></textarea></center>
		    <br/><br/>
		    <center><input type="submit" style="width:30%" value="Enviar"></center>
		    <br/>
		</form> 
	    </section> 
	</div>
	<footer> 
	</footer>
	</div>
    </body>
</html>
