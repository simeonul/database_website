<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interogari</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
	</style>
	</head>
	<body class="select_tabs">

	<p style="font-family: georgia; color: #183a1d; font-size: 40px; text-align: center;">Interogari</p>
	<p style="margin-left: 50px; font-family: georgia; color: #183a1d; font-size: 30px;">Alegeti exercitiul dorit din meniu:</p>

	<div class="tab">
	  <button class="tablinks" onclick="openCity(event, 'ex3')">Exercitiul 3</button>
	  <button class="tablinks" onclick="openCity(event, 'ex4')">Exercitiul 4</button>
	  <button class="tablinks" onclick="openCity(event, 'ex5')">Exercitiul 5</button>
	  <button class="tablinks" onclick="openCity(event, 'ex6')">Exercitiul 6</button>
	</div>

	<div id="ex3" class="tabcontent">
	  <a href="ex3a.php"><p>Exercitiul 3 - Subpunctul (a</p></a>
	  <a href="ex3b.php"><p>Exercitiul 3 - Subpunctul (b</p></a>
	</div>

	<div id="ex4" class="tabcontent">
	  <a href="ex4a.php"><p>Exercitiul 4 - Subpunctul (a</p></a>
	  <a href="ex4b.php"><p>Exercitiul 4 - Subpunctul (b</p></a>
	</div>

	<div id="ex5" class="tabcontent">
	  <a href="ex5a.php"><p>Exercitiul 5 - Subpunctul (a</p></a>
	  <a href="ex5b.php"><p>Exercitiul 5 - Subpunctul (b</p></a>
	</div>
	
	<div id="ex6" class="tabcontent">
	  <a href="ex6a.php"><p>Exercitiul 6 - Subpunctul (a</p></a>
	  <a href="ex6b.php"><p>Exercitiul 6 - Subpunctul (b</p></a>
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
