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
				<?php include "navi.php"?>
				
				
			</div>
			<div id="inhalt">
				
				<?php
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				
				if (isset($_POST['mietnr'])    && $_POST['mietnr'] != "" 
				 && isset($_POST['mietdatum']) && $_POST['mietdatum'] != "" 
				 && isset($_POST['von'])       && $_POST['von'] != "" 
				 && isset($_POST['bis'])       && $_POST['bis'] != "" 
		         && isset($_POST['fahrradnr']) && $_POST['fahrradnr'] != "" 				 
				 && isset($_POST['kundennr'])  && $_POST['kundennr'] != "")
				{
					include("db_verbindung.php");
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
					// Kundenname für Ausgabe ermitteln
					$sql = "SELECT `Vorname`, `Name` FROM `Kunden` WHERE `Kundennr` = '" .$_POST['kundennr'] . "'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						    $kundenname = $row["Vorname"] . " " . $row["Name"];						
						}
					} else {
						$kundenname = "unbekannter Kunde";
					}
					
					// Fahrradbezeichnung für Ausgabe ermitteln
					$sql = "SELECT `Bezeichnung`  FROM `Fahrraeder` WHERE `Fahrradnr` = \"" . $_POST['fahrradnr'] . "\"";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
						    $fahrradbezeichnung = $row["Bezeichnung"] . " (" . $_POST['fahrradnr'] . ")";						
						}
					} else {
						$fahrradbezeichnung = "unbekanntes Fahrrad";
					}
					
					
					$sql = "INSERT INTO Vermietungen 
					            (Mietnr, Mietdatum, von , bis , Fahrradnr , Kundennr) VALUES ('" 
								. $_POST['mietnr']    . "', '" 
								. $_POST['mietdatum'] . "', '"
								. $_POST['von']       . "', '" 
								. $_POST['bis']       . "', '"
								. $_POST['fahrradnr'] . "', '"
								. $_POST['kundennr']  . "')";
								
					if ($conn->query($sql) === TRUE) {
						echo "<p class=\"erfolg\">Folgende Vermietung wurde verbucht:<br>";
						echo "<b>" . $kundenname . "</b> hat das Fahrrad \"<b>" . $fahrradbezeichnung . "</b>\" am " 
						. $_POST['mietdatum'] . " f&uuml; den Zeitraum " .  $_POST['von'] . " bis " . $_POST['bis'] . " ausgeliehen</p>";								
						echo "Vertragsnummer: " . $_POST['mietnr'];
						echo "<br><p class=\"entwickler\">Entwicklerinfo:<br></p>";
						echo "<p class=\"sql\">" . $sql . "</p>";
						echo "<form target=\"_blank\" action=\"mitvertrag_drucken.php\" method=\"post\">  ";
									echo "<input type=\"hidden\" name=\"kundenname\" value=\"" . $kundenname ."\"/>";
									echo "<input type=\"hidden\" name=\"fahrradbezeichnung\" value=\"" . $fahrradbezeichnung ."\"/>";
									echo "<input type=\"hidden\" name=\"mietdatum\" value=\"" . $_POST['mietdatum'] ."\"/>";
									echo "<input type=\"hidden\" name=\"von\" value=\"" . $_POST['von'] ."\"/>";
									echo "<input type=\"hidden\" name=\"bis\" value=\"" . $_POST['bis'] ."\"/>";
									echo "<input type=\"hidden\" name=\"mietnr\" value=\"" . $_POST['mietnr'] ."\"/>";
									echo "<input type=\"hidden\" name=\"sql\" value=\"" . $sql . "\"/>";								
									echo "<input type=\"Submit\" name=\"karte_drucken\" value=\"Mitvertrag drucken\"/>";
						echo "</form>";
						
						
						} else {
							echo "<p class=\"fehler\">Error: " . $sql . "<br>" . $conn->error . "</p>";
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
