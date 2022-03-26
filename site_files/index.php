<html>
  <head>
    <meta charset="utf-8">
    <title>Colocviu final Turcu Cezar</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
	*{
		margin: 0; padding: 0; border:0; box-sizing: border-box;
	}
	</style>
  </head>
  
  <body>
  
<?php
  include "connect.php";
?>
	<div id = "containerI">
		<div class = "top">
			  <h1 class = "theTitle">Colocviu final de laborator</h1>
		</div>
		
		<a href="tabele.php">
		<div class = "mid">
			<div class = "image">
				<img class="tabeleImg" src="images/tabeles.png" alt="Tabele">
				<div class = "tabeleOverlay tabeleOverlay_change">
					<div class = "tabeleTitle">Tabele</div>
					<p class = "tabeleDesc">
					Afiseaza datele din interiorul tabelelor Clienti, Bilete, Zboruri, Cupoane sau Reduceri.
					</p>
				</div>
			</div>
		</div>
		</a>
		
		
		<a href="interogari.php">
		<div class = "bot">
			<div class = "image">
				<img class="queryImg" src="images/interogarix.png" alt="Interogari">
				<div class = "queryOverlay queryOverlay_change">
					<div class = "queryTitle">Interogari</div>
					<p class = "queryDesc">
					Redirectioneaza utilizatorul catre pagina in care va selecta una dintre interogarile de la exercitiile 3-6 din colocviul partial de laborator.
					</p>
				</div>
			</div>
		</div>
	</div>
	</a>
  
 
  
  
  
<?php
  $mysqli->close();
  
?>
  
    
  
  </body>
</html>
