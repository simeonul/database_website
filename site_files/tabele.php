<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tabele</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
	</style>
	</head>
	<body class="select_tabs">

	<p style="font-family: georgia; color: #183a1d; font-size: 40px; text-align: center;">Tabele</p>
	<p style="margin-left: 50px; font-family: georgia; color: #183a1d; font-size: 30px;">Alegeti tabelul dorit din baza de date:</p>

	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'ex3')">Clienti</button>
	  <button class="tablinks" onclick="openCity(event, 'ex4')">Bilete</button>
	  <button class="tablinks" onclick="openCity(event, 'ex5')">Zboruri</button>
	  <button class="tablinks" onclick="openCity(event, 'ex6')">Cupoane</button>
	  <button class="tablinks" onclick="openCity(event, 'ex7')">Reduceri</button>
	</div>

	<div id="ex3" class="tabcontent">
	<?php
		include "connect.php";
		$clienti = "SELECT idclient, nume, statut, adresa, telefon
		FROM Clienti";
		
		$rez_clienti = $mysqli->query($clienti);

		if ($rez_clienti->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Id client</th><th>Nume</th><th>Statut</th><th>Adresa</th><th>Telefon</th></tr>";
			while($row = $rez_clienti->fetch_assoc()) {
			echo "<tr><td>" . $row["idclient"]. "</td><td>" . $row["nume"]. "</td><td>" . $row["statut"]. "</td><td>" . $row["adresa"]. "</td>
			<td>" . $row["telefon"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Eroare</p>";
		}
		$mysqli -> close();
		?>
	</div>

	<div id="ex4" class="tabcontent">
	  <?php
		include "connect.php";
		$bilete = "SELECT nrbilet, clasa, valoare, sursa, destinatia, idclient
		FROM Bilete";
		
		$rez_bilete = $mysqli->query($bilete);

		if ($rez_bilete->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar bilet</th><th>Clasa</th><th>Valoare</th><th>Sursa</th>
			<th>Destinatie</th><th>Id client</th></tr>";
			while($row = $rez_bilete->fetch_assoc()) {
			echo "<tr><td>" . $row["nrbilet"]. "</td><td>" . $row["clasa"]. "</td><td>" . $row["valoare"]. "</td>
			<td>" .$row["sursa"]. "</td><td>" .$row["destinatia"]. "</td><td>" .$row["idclient"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Eroare</p>";
		}
		$mysqli -> close();
		?>
	</div>

	<div id="ex5" class="tabcontent">
	   <?php
		include "connect.php";
		$zboruri = "SELECT nrzbor, DATE_FORMAT(plecare, '%d-%b-%Y %H:%i') AS plecare,
		DATE_FORMAT(sosire, '%d-%b-%Y %H:%i') AS sosire, de_la, la, aparat_zbor, nr_locuri AS nrloc
		FROM Zboruri";
		
		$rez_zboruri = $mysqli->query($zboruri);

		if ($rez_zboruri->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar zbor</th><th>Plecare</th><th>Sosire</th>
			<th>De la</th><th>La</th><th>Aparat de zbor</th><th>Numar locuri</th></tr>";
			while($row = $rez_zboruri->fetch_assoc()) {
			echo "<tr><td>" . $row["nrzbor"]. "</td><td>" . $row["plecare"]. "</td><td>" . $row["sosire"]. "</td>
			<td>" .$row["de_la"]. "</td><td>" .$row["la"]. "</td><td>" .$row["aparat_zbor"]. "</td><td>" .$row["nrloc"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Eroare</p>";
		}
		$mysqli -> close();
		?>
	</div>
	
	<div id="ex6" class="tabcontent">
		<?php
		include "connect.php";
		$cupoane = "SELECT nrbilet, nrzbor, DATE_FORMAT(plecare, '%d-%b-%Y %H:%i') AS plecare,
		clasa_efectiva, loc
		FROM Cupoane";
		
		$rez_cupoane = $mysqli->query($cupoane);

		if ($rez_cupoane->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Numar biler</th><th>Numar zbor</th><th>Plecare</th>
			<th>Clasa efectiva</th><th>Loc</th></tr>";
			while($row = $rez_cupoane->fetch_assoc()) {
			echo "<tr><td>" . $row["nrbilet"]. "</td><td>" . $row["nrzbor"]. "</td><td>" . $row["plecare"]. "</td>
			<td>" .$row["clasa_efectiva"]. "</td><td>" .$row["loc"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Eroare</p>";
		}
		$mysqli -> close();
		?>
	</div>
	
	<div id="ex7" class="tabcontent">
	<p style="margin-left: 50px; font-family: georgia; color: #183a1d; font-size: 30px;">
	Preturile biletelor inainte si dupa reducerea de 5% aplicata clientilor VIP:</p>
		<?php
		include "connect.php";
		$functie = "SELECT c.nume AS nume, b.nrbilet AS nrb, c.statut AS statut, b.valoare AS val, test(b.valoare, b.idclient) AS redus
		FROM Clienti c JOIN Bilete b ON (c.idclient = b.idclient)
		ORDER BY c.idclient";
		
		$rez_functie = $mysqli->query($functie);

		if ($rez_functie->num_rows > 0) {
			echo "<table id = \"gTable\"><tr><th>Nume client</th><th>Statut</th><th>Numar bilet</th><th>Valoare inainte de reducere</th>
			<th>Valoare dupa reducere</th></tr>";
			while($row = $rez_functie->fetch_assoc()) {
			echo "<tr><td>" . $row["nume"]. "</td><td>" . $row["statut"]. "</td><td>". $row["nrb"]. "</td><td>" . $row["val"]. "</td>
			<td>" .$row["redus"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p style=\"color:red; font-size:20px; font-family:georgia; text-align: center;\">
			Eroare</p>";
		}
		$mysqli -> close();
		?>
	</div>
	

	<script>
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
   
</body>
</html> 
