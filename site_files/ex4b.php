<html>
  <head>
    <meta charset="utf-8">
    <title>4b</title>
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
   
	<h1 class="int_titlu">Exercitiul 4b</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca perechi de bilete (nrbilet1, nrbilet2) cu conditia sa fie cu aceeasi sursa si
	destinatie dar clienti diferiti. O pereche este unica in rezultat.
	</p>
	</div>
  

	<?php

		include "connect.php";
		$ex4b =  "SELECT a.idclient AS id1, b.idclient AS id2, a.nrbilet AS bil1, b.nrbilet AS bil2, a.sursa AS sursa, a.destinatia AS destinatia
    FROM bilete a JOIN bilete b ON (a.sursa = b.sursa)
    WHERE (a.destinatia = b.destinatia AND a.nrbilet < b.nrbilet)";
		
		$rez_ex4b = $mysqli->query($ex4b);

		if ($rez_ex4b->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Id client 1</th><th>Id client 2</th><th>Nr bilet 1</th><th>Nr bilet 2</th><th>Sursa</th>
			<th>Destinatia</th></tr>";
			while($row = $rez_ex4b->fetch_assoc()) {
			echo "<tr><td>" . $row["id1"]. "</td><td>" . $row["id2"]. "</td><td>" . $row["bil1"]. "</td><td>" . $row["bil2"]. "</td><td>" .
			$row["sursa"]. "</td><td>" . $row["destinatia"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista o pereche de bilete cu conditiile necesare!</p>";
		}
?>

  </body>
</html>