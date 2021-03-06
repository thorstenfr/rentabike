<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="./css/style.css">		
    </head>

<body>
<div id="container">
			<div id="kopf">
				<p>rent-a-bike by Thorsten Freimann :: Fahrrad erfassen</p>
			</div>
			<div id ="nav">
				<?php include 'navi.php';?>
			</div>
			<div id="inhalt">
				<form action="fahrrad_einfuegen_komplett.php" method="post">
					<table>
					<tr>
					  <td>Fahrradnr:</td>
					  <td>
							<?php 
					  			$value = rand(10000,99999);
								echo "<input type=\"text\" style=\"text-align:right;\" name=\"Fahrradnr\"  size=\"30\" maxlength=\"30\" pattern=\"[0-9]{1,5}\"  
									required=\"required\" title=\"Bitte geben Sie eine Nummer zwischen 0 und 99999 ein.\" 
									value=\"".$value."\" />";					 

					  		?>			  
					  </td>
					  <td class="beispiel">Bsp.: 100</td>
					</tr>
					<tr>
					  <td>Bezeichnung:</td>
					  <td><input name="Bezeichnung" type="text" size="30" maxlength="30" required="required"></td>
					  <td class="beispiel">Bsp.: CUBE Cross Race Disc</td>
					</tr>
					<tr>
					  <td>Wert:</td>
					  <td>							
						<input name="Wert" type="text" size="30" maxlength="30"
							required="required" pattern="[0-9.]{1,8}" title="Erlaubt sind nur Zahlen und '.' als Dezimalpunkt.">
					</td>
					  <td class="beispiel">Bsp.: 899.00</td>
					</tr>
					<tr>
					  <td>Kaufdatum:</td>
					  <td>
					  	<input name="Kaufdatum" type="text" size="30" maxlength="40" required="required" pattern="(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" title="Datum muss in der Form JJJJ-MM-TT angegeben werden!">
					  </td>
					  <td class="beispiel">Format: JJJJ-MM-TT</td>
					</tr>
					<tr>
					  <td align="right">Tagesmietpreis:</td>
					  <td>											
						<input name="Tagesmietpreis" type="text" size="30" maxlength="30" required="required" pattern="[0-9.]{1,6}" title="Erlaubt sind nur Zahlen und '.' als Dezimalpunkt.">
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
