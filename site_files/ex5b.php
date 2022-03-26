<html>
  <head>
    <meta charset="utf-8">
    <title>5b</title>
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
   
	<h1 class="int_titlu">Exercitiul 5b</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca zborurile cu aceeasi sosire ca si zborul cu plecarea ’15-SEP-2021 14:15’ de la ’Cluj-Napoca’.
	</p>
	</div>
  

	<?php

		include "connect.php";
		$ex5a =  "SELECT nrzbor, DATE_FORMAT(plecare, '%d-%b-%Y %H:%i') AS plecare, 
		DATE_FORMAT(sosire, '%d-%b-%Y %H:%i') AS sosire, de_la, la, aparat_zbor, nr_locuri
		FROM Zboruri
		WHERE sosire IN 
		(SELECT sosire 
		FROM Zboruri
		WHERE(plecare = str_to_date('15-SEP-2021 14:15', '%d-%b-%Y %H:%i') AND de_la = 'Cluj-Napoca'))";
		
		$rez_ex5a = $mysqli->query($ex5a);

		if ($rez_ex5a->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar zbor</th><th>Plecare</th><th>Sosire</th><th>De la</th>
			<th>La</th><th>Aparat zbor</th><th>Numar locuri</th></tr>";
			while($row = $rez_ex5a->fetch_assoc()) {
			echo "<tr><td>" . $row["nrzbor"]. "</td><td>" . $row["plecare"]. "</td><td>" . $row["sosire"]. "</td>
			<td>" . $row["de_la"]. "</td><td>" . $row["la"]. "</td><td>" . $row["aparat_zbor"]. "</td><td>" . $row["nr_locuri"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista asemenea zboruri!</p>";
		}
?>

  </body>
</html>