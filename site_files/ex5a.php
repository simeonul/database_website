<html>
  <head>
    <meta charset="utf-8">
    <title>5a</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
	*{
		margin: 0; padding: 0; border:0; box-sizing: border-box;
	}
	</style>
  </head>
   <body style="background-color:#fefbe9;">
   
	<h1 class="int_titlu">Exercitiul 5a</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca numele clientilor al caror bilet are valoarea cea mai mare intre biletele din clasa ’Economic’.
	</p>
	</div>
  

	<?php

		include "connect.php";
		$ex5a =  "SELECT c.nume AS nume, b.valoare AS valoare
		FROM clienti c JOIN bilete b ON (c.idclient = b.idclient)
		WHERE b.clasa = 'Economic' AND b.valoare >= ALL 
		(SELECT valoare
		FROM bilete
		WHERE clasa = 'Economic')";
		
		$rez_ex5a = $mysqli->query($ex5a);

		if ($rez_ex5a->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Nume client</th><th>Valoare bilet</th></tr>";
			while($row = $rez_ex5a->fetch_assoc()) {
			echo "<tr><td>" . $row["nume"]. "</td><td>" . $row["valoare"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista bilete cu conditiile necesare!</p>";
		}
?>

  </body>
</html>