<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

<body>




<div id="container">
			<div id="kopf">
				<p>rent-a-bike by Thorsten Freimann</p>
			</div>
			<div id ="nav">
				<ul>
					<li class = "cat1">
						<a href="../index.html">Rent-a-Bike</a>
					</li>
					<li class = "cat2">
						<a href="#">Anmeldung</a>
						<ul>
							<li><a href="../html/kunden_erfassen.html">Kunden erfassen</a></li>
							<li><a href="kunden_suchen.html">Kunden suchen/&auml;ndern</a></li>
							
						</ul>
					</li>
					<li class = "cat3">
						 <a href="#">Einkauf</a>
						 <ul>
							 <li><a href="#">Hersteller erfassen</a></li>
							 <li><a href="../html/fahrrad_erfassen.html">Fahrrad erfassen</a></li>
							 <li><a href="#">Fahrrad suchen</a></li>                         
						 </ul>
					</li>
					<li class = "cat4">
						<a href="#">Ausgaben</a>
						<ul>
							<li><a href="#">Fahrrad suchen</a></li>
							<li><a href="#">Fahrrad ausleihen</a></li>
							<li><a href="#">Fahrrad zur&uuml;cknehmen</a></li>
						</ul>
					</li>
					<li class = "cat5">
						<a href="#">Impressum</a>                    
					</li>
				</ul>
			</div>
			<div id="inhalt">
			
				
				<?php
				/*
				echo "here we are";
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				*/
				
					if (isset($_POST['Fahrradnr']) && $_POST['Fahrradnr'] != "" 
					    && isset($_POST['Bezeichnung']) && $_POST['Bezeichnung'] != "" 
					    && isset($_POST['Wert']) && $_POST['Wert'] != "" 
						&& isset($_POST['Kaufdatum']) && $_POST['Kaufdatum'] != "" 
						&& isset($_POST['Tagesmietpreis']) && $_POST['Tagesmietpreis'] != "")
					{
	
						include("db_verbindung.php");
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						$sql = "INSERT INTO Fahrraeder_1 (Fahrradnr, 
							Bezeichnung, Tagesmietpreis, Wert, Kaufdatum) 
							VALUES (" . $_POST['Fahrradnr'] . ", \"" .$_POST['Bezeichnung'] . "\", 
							" . $_POST['Tagesmietpreis'] . "," . $_POST['Wert'] . "," . $_POST['Kaufdatum'] . ")";
							
							echo "<div class=\"sql\">SQL: " . $sql . "</div>";
							
							if ($conn->query($sql) === TRUE) {
							echo "Das Fahrrad " . $_POST['Bezeichnung'] . " wurde erfolgreich mit der Fahrradnummer "
							. $_POST['Fahrradnr'] . " in die Artikeldatei aufgenommen.";
							
							} else {
								echo "<div class=\"error\">Error: " . $sql . "</div>" . $conn->error;
							}
							$conn->close();
							

					}
				else
				{
					echo "Bitte alle Felder ausfüllen!";
				}
		?>
				
			</div>


</div>

</body>
</html>
