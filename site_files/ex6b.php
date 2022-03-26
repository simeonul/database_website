<html>
  <head>
    <meta charset="utf-8">
    <title>6b</title>
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
   
	<h1 class="int_titlu">Exercitiul 6b</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca pentru fiecare client valoarea minima, medie si maxima a biletelor.
	</p>
	</div>
		

	<?php
	include "connect.php";
		$ex6b = "SELECT c.nume AS nume, MIN(b.valoare) AS valmin, ROUND(AVG(b.valoare), 2) AS valmed, MAX(b.valoare) AS valmax
		FROM Clienti c JOIN Bilete b ON (c.idclient = b.idclient)
		GROUP BY c.nume";
		
		$rez_ex6b = $mysqli->query($ex6b);

		if ($rez_ex6b->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Nume client</th><th>Valoare minima bilete</th><th>Valoare medie bilete</th>
			<th>Valoare maxima bilete</th></tr>";
			while($row = $rez_ex6b->fetch_assoc()) {
			echo "<tr><td>" . $row["nume"]. "</td><td>" . $row["valmin"]. "</td><td>" . $row["valmed"]. "</td><td>" . $row["valmax"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Datele necesare sunt inexistente!</p>";
		}

?>

  </body>
</html>