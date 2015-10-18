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
				<form action="../php/fahrrad_einfuegen_komplett.php" method="post">
					<table>
					<tr>
					  <td>Fahrradnr:</td>
					  <td><input name="Fahrradnr" type="text" size="30" maxlength="30"></td>
					  <td class="beispiel">Bsp.: 100</td>
					</tr>
					<tr>
					  <td>Bezeichnung:</td>
					  <td><input name="Bezeichnung" type="text" size="30" maxlength="30"></td>
					  <td class="beispiel">Bsp.: CUBE Cross Race Disc</td>
					</tr>
					<tr>
					  <td>Wert:</td>
					  <td>							
						<input name="Wert" type="text" size="30" maxlength="30">
					</td>
					  <td class="beispiel">Bsp.: 899.00</td>
					</tr>
					<tr>
					  <td>Kaufdatum:</td>
					  <td><input name="Kaufdatum" type="text" size="30" maxlength="40"></td>
					  <td class="beispiel">Format: JJJJ-MM-TT</td>
					</tr>
					<tr>
					  <td align="right">Tagesmietpreis:</td>
					  <td>											
						<input name="Tagesmietpreis" type="text" size="30" maxlength="30">
					  </td>						
					  <td class="beispiel">Bsp.: 19.99</td>
					</tr>	
					
					<?php
						include("db_verbindung.php");

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}					
						
						$sql = "SELECT `Herstellernr`, `Herstellername` FROM `Hersteller` WHERE 1";
						$result = $conn->query($sql);
						
						echo "<tr><td>Hersteller</td><td><select name=\"Hersteller\">";
						

						if ($result->num_rows > 0) {					
							
							while($row = $result->fetch_assoc()) {
								echo "<option value=\"" . $row["Herstellernr"] . "\">" . $row["Herstellername"] . "</option>";							
							}
							echo "</select></td></tr>";
						} else {
							echo "0 results";
						}
						$conn->close();
						
						// Fahrradtypen
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}					
											
						$sql = "SELECT `Typnr`, `Typbezeichnung` FROM `Fahrradtypen` WHERE 1";
						$result = $conn->query($sql);
						
						echo "<tr><td>Fahrradtyp</td><td><select name=\"Fahrradtypen\">";
						
						if ($result->num_rows > 0) {					
							
							while($row = $result->fetch_assoc()) {
								echo "<option value=\"" . $row["Typnr"] . "\">" . $row["Typbezeichnung"] . "</option>";							
							}
							echo "</select></td></tr>";
						} else {
							echo "0 results";
						}
						$conn->close();					
						
					?>
					
					
				  </table>
				  <input  type="Submit" name="fahrrad_eintragen" value="Fahrrad eintragen" /> 
				</form>
			</div>


</div>

</body>
</html>
