<html>
  <head>
    <meta charset="utf-8">
    <title>6a</title>
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
   
	<h1 class="int_titlu">Exercitiul 6a</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca pentru fiecare zbor cu plecare in anul introdus de catre utilizator numarul de bilete.
	</p>
	</div>
  
	<form class="form-horizontal" action="">
	<fieldset>

	<div class="fform">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nr_locuri">Anul plecarii</label>  
	  <div class="col-md-5">
	  <input id="an" name="an" type="number" min="0" placeholder="" class="form-control input-md" required="">
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

	if(isset($_GET["an"])){
		include "connect.php";
		$anul = $_GET["an"];
		
	$ex6a = "SELECT nrzbor, EXTRACT(YEAR FROM plecare) AS year, COUNT(nrbilet) AS numbil
		FROM Cupoane
		WHERE (EXTRACT(YEAR FROM plecare) = $anul)
		GROUP BY nrzbor";
		
		$rez_ex6a = $mysqli->query($ex6a);

		if ($rez_ex6a->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar zbor</th><th>An plecare</th><th>Numar de bilete</th></tr>";
			while($row = $rez_ex6a->fetch_assoc()) {
			echo "<tr><td>" . $row["nrzbor"]. "</td><td>" . $row["year"]. "</td><td>" . $row["numbil"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista zboruri cu acest an de plecare!</p>";
		}
	}

?>

  </body>
</html>