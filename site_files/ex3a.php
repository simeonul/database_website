<html>
  <head>
    <meta charset="utf-8">
    <title>3a</title>
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
   
	<h1 class="int_titlu">Exercitiul 3a</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca clasa, sursa si destinatia biletelor cu o valoare mai mare decat cea introdusa de utilizator, ordonat crescator
	dupa valoare si descrescator dupa sursa.
	</p>
	</div>
  
	<form class="form-horizontal" action="">
	<fieldset>

	<div class="fform">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="valoare_bil">Valoarea minima a biletului</label>  
	  <div class="col-md-5">
	  <input id="valoare_bil" name="valoare_bil" type="number" min="0" placeholder="" class="form-control input-md" required="">
	  <span class="help-block">Introduceti un numar mai mare sau egal cu 0</span>  
	  </div>
	</div>

	<div class="form-group fbut">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-success">Cautare</button>
	  </div>
	</div>
	</div>

	</fieldset>
	</form>
		

	<?php

	if(isset($_GET["valoare_bil"])){
		include "connect.php";
		$val = $_GET["valoare_bil"];
		
		$ex3a = "SELECT nrbilet, valoare, clasa, sursa, destinatia
		FROM bilete
		WHERE valoare > $val
		ORDER BY valoare, sursa DESC";
		
		$rez_ex3a = $mysqli->query($ex3a);

		if ($rez_ex3a->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar bilet</th><th>Valoare</th><th>Clasa</th><th>Sursa</th><th>Destinatie</th></tr>";
			while($row = $rez_ex3a->fetch_assoc()) {
			echo "<tr><td>" . $row["nrbilet"]. "</td><td>" . $row["valoare"]. "</td><td>" . $row["clasa"]. "</td><td>" .  $row["sursa"].
			"</td><td>" . $row["destinatia"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Valoarea introdusa este mai mare decat a oricarui bilet din baza de date!</p>";
		}
	}
?>

  </body>
</html>







