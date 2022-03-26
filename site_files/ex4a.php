<html>
  <head>
    <meta charset="utf-8">
    <title>4a</title>
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
   
	<h1 class="int_titlu">Exercitiul 4a</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca pentru clientul al carui nume este introdus in primul camp detaliile calatoriilor efectuate cu escala la 
	aeroportul al carui nume este introdus in al doilea camp.
	</p>
	</div>
  
	<form class="form-horizontal" action="">
	<fieldset>

	<div class="fform">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nume">Numele clientului</label>  
	  <div class="col-md-5">
	  <input id="nume" name="nume" type="text" placeholder="" class="form-control input-md" required="">
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="aeroport">Numele aeroportului</label>  
	  <div class="col-md-5">
	  <input id="aeroport" name="aeroport" type="text" placeholder="" class="form-control input-md" required="">
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-success">Cautare</button>
	  </div>
	</div>
	</div>

	</fieldset>
	</form>
		

	<?php

	if(isset($_GET["nume"]) && isset($_GET["aeroport"])){
		include "connect.php";
		$nume_c = $_GET["nume"];
		$nume_a = $_GET["aeroport"];
		
		$ex4a = "SELECT DISTINCT b.sursa AS sursa, b.destinatia AS destinatia, DATE_FORMAT(cup.plecare, '%d-%b-%Y %H:%i') AS plecare, 
	DATE_FORMAT(zbor1.sosire, '%d-%b-%Y %H:%i') AS sosire,DATE_FORMAT(zbor2.plecare, '%d-%b-%Y %H:%i') AS plecare,
	DATE_FORMAT(zbor2.sosire, '%d-%b-%Y %H:%i') AS sosire_fin
    FROM Clienti cli JOIN Bilete b ON (cli.idclient = b.idclient) JOIN Cupoane cup ON (b.nrbilet = cup.nrbilet)
	JOIN Zboruri zbor1 ON (cup.nrzbor = zbor1.nrzbor) JOIN Zboruri zbor2 ON (zbor1.la = zbor2.de_la)
    WHERE (b.destinatia = zbor2.la AND cli.nume = '$nume_c' AND zbor1.la = '$nume_a')";
		
		$rez_ex4a = $mysqli->query($ex4a);

		if ($rez_ex4a->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Sursa</th><th>Destinatie</th><th>Plecare din aeroport</th><th>Sosire in Amsterdam</th>
			<th>Plecare din Amsterdam</th><th>Sosire destinatie</th></tr>";
			while($row = $rez_ex4a->fetch_assoc()) {
			echo "<tr><td>" . $row["sursa"]. "</td><td>" . $row["destinatia"]. "</td><td>" . $row["plecare"]. "</td><td>" .
			$row["sosire"]. "</td><td>" . $row["plecare"]. "</td><td>" . $row["sosire_fin"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista calatorii efectuate de acest client cu escala la aeroportul selectat!</p>";
		}
	}
?>

  </body>
</html>







