<html>
  <head>
    <meta charset="utf-8">
    <title>3b</title>
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
   
	<h1 class="int_titlu">Exercitiul 3b</h1>
    <div class="cerinta_wrap">
	<p class="cerinta">
	Cerinta: Sa se gaseasca aparatele de zbor cu numarul de locuri mai mic decat numarul introdus de utilizator,
	ordonate crescator dupa nr_locuri.
	</p>
	</div>
  
	<form class="form-horizontal" action="">
	<fieldset>

	<div class="fform">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nr_locuri">Numarul maxim de locuri</label>  
	  <div class="col-md-5">
	  <input id="nr_locuri" name="nr_locuri" type="number" min="0" placeholder="" class="form-control input-md" required="">
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

	if(isset($_GET["nr_locuri"])){
		include "connect.php";
		$loc = $_GET["nr_locuri"];
		
	$ex3b = "SELECT aparat_zbor, nr_locuri
    FROM zboruri
    WHERE nr_locuri < $loc
    ORDER BY nr_locuri";
		
		$rez_ex3b = $mysqli->query($ex3b);

		if ($rez_ex3b->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Aparat zbor</th><th>Numar locuri</th></tr>";
			while($row = $rez_ex3b->fetch_assoc()) {
			echo "<tr><td>" . $row["aparat_zbor"]. "</td><td>" . $row["nr_locuri"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Nu exista zboruri cu un numar de locuri mai mic decat valoarea introdusa!</p>";
		}
	}

?>

  </body>
</html>