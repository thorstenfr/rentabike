<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

<body>




<div id="container">
			<div id="kopf">
				<p>rent-a-bike by Thorsten Freimann</p>
			</div>
			<div id ="nav">
				<?php include 'navi.php';?>
			</div>
			<div id="inhalt">
				
				<?php
				include("db_verbindung.php");
				
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				
				if (isset($_POST['kundennr']) && $_POST['kundennr'] != "" 
				 && isset($_POST['vorname']) && $_POST['vorname'] != "" 
				 && isset($_POST['zuname'])  && $_POST['zuname'] != "" 
				 && isset($_POST['strasse']) && $_POST['strasse'] != "" 
		         && isset($_POST['plz'])     && $_POST['plz'] != "" 
				 && isset($_POST['wohnort']) && $_POST['wohnort'] != "" 				 
				 && isset($_POST['geschlecht']) && $_POST['geschlecht'] != "")
				{
	
					
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
					// Suche Ort mit PLZ
					$sql = "SELECT Ortnr FROM `Wohnorte` WHERE PLZ = \"" . $_POST['plz'] ."\"";				
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// der Einfachheit halber nehme ich den ersten Ort
						while($row = $result->fetch_assoc()) {							
							$ortnr = $row["Ortnr"];
							
						}
						
						$sql = "INSERT INTO Kunden(Kundennr, Name, Vorname, Strasse, Geschlecht, Gebtag, Ortnr) 
					        VALUES ('" . $_POST['kundennr'] . "', '"
							. $_POST['zuname'] . "', '"
							. $_POST['vorname'] . "', '"
							. $_POST['strasse'] . "', '"
							. $_POST['geschlecht'] . "', '"
							. $_POST['geburtstag'] . "', "
							. $ortnr . ");";
						
						if ($conn->query($sql) === TRUE) {
							echo "<p class=\"erfolg\">Neuer Kunde " . $_POST['vorname'] . " " . 
								$_POST['zuname'] . " mit Kundennummer " . $_POST['kundennr'] . " eingetragen!</p>";
								
								echo "<br><p class=\"entwickler\">Entwicklerinfo:</p><br>";
								echo "<div class=\"sql\">" . $sql . "</div>";
								echo "<form target=\"_blank\" action=\"../php/kundenausweis_drucken.php\" method=\"post\">  ";
									echo "<input type=\"hidden\" name=\"vorname\" value=\"" . $_POST['vorname'] ."\"/>";
									echo "<input type=\"hidden\" name=\"zuname\" value=\"" . $_POST['zuname'] ."\"/>";
									echo "<input type=\"hidden\" name=\"kundennr\" value=\"" . $_POST['kundennr'] ."\"/>";
									echo "<input type=\"hidden\" name=\"sql\" value=\"" . $sql . "\"/>";								
									echo "<input type=\"Submit\" name=\"karte_drucken\" value=\"Kundenkarte drucken\"/>";
								echo "</form>";
						} else {
							echo "<p class=\"fehler\">Error: " . $sql . "<br>" . $conn->error . "</p>";
						}
						
						

						$conn->close();
						
						
						} else {
							echo "<p class=\"fehler\">Kein Ort für " . $_POST['plz'] . " gefunden!";
							
						}

					
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
