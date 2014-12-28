<html>
    <head>
	<title>Crear nuevo tema - PuEblAchAn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="iso-8859-1"/>
    </head>
    <body>
	<div class="results"> 
	    <section id="content"> 
		<br/>
		<form action="newThreadPost.php" enctype="multipart/form-data" method="POST">
		    <center><strong>Título del tema:</strong></center><br/>
		    <center><input type="text" style="width:90%;border:none;" name="title" value=""></center>
		    <br/><br/>
		    <center><strong>Mensaje:</strong></center><br/>
		    <center><textarea name="message" style="width:90%;border:none;" rows="12"></textarea></center>
		    <center>
			<input id="file" type="file" name="file" style="width:90%;""></input>
		    </center>
		    <br/><br/>
		    <center><input type="submit" style="width:70%;height:40px;" value="Enviar"></center>
		    <br/>
		</form> 
	    </section>
	</div>
	<footer> 
	</footer>
	</div>
    </body>
</html>
