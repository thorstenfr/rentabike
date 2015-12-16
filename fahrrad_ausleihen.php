<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="./css/style.css">		
    </head>

<body>
<div id="container">
			<div id="kopf">
				<p>rent-a-bike by Thorsten Freimann :: Fahrrad ausleihen</p>
			</div>
			<div id ="nav">
				<?php include 'navi.php';?>
			</div>
			<div id="inhalt">				
				<form action="vermietung_einfuegen.php" method="post">
					<table>
					<tr>
					  <td>Mietnr:</td>
					  <td>
							<?php 
					  			$value = rand(10000,99999);
								echo "<input type=\"text\" style=\"text-align:right;\" name=\"mietnr\"  size=\"30\" maxlength=\"30\" pattern=\"[0-9]{1,5}\"  
									required=\"required\" title=\"Bitte geben Sie eine Nummer zwischen 0 und 99999 ein.\" 
									value=\"".$value."\" />";					 

					  		?>						  
					  	</td>
					  <td class="beispiel">Bsp.: 4000</td>
					</tr>
					<tr>
					  <td>Vertragsdatum:</td>
					  <td><input name="mietdatum" type="text" size="30" maxlength="30"  
					  	required="required" pattern="(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" title="Datum muss in der Form JJJJ-MM-TT angegeben werden!"></td>
					  <td class="beispiel">Bsp.: 2014-11-29</td>
					</tr>
					<tr>
					  <td>von:</td>
					  <td><input name="von" type="text" size="30" maxlength="30" required="required" pattern="(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" title="Datum muss in der Form JJJJ-MM-TT angegeben werden!"></td>
					  <td class="beispiel">Bsp.: 2014-11-29</td>
					</tr>
					<tr>
					  <td>bis:</td>
					  <td><input name="bis" type="text" size="30" maxlength="40" required="required" pattern="(19|20)[0-9]{2}[-](0[1-9]|1[012])[-](0[1-9]|[12][0-9]|3[01])" title="Datum muss in der Form JJJJ-MM-TT angegeben werden!"></td>
					  <td class="beispiel">Bsp: 2014-11-30</td>
					</tr>				
					<?php
					include("db_verbindung.php");

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}					
						
						$sql = "SELECT `Fahrradnr`,`Bezeichnung` FROM `Fahrraeder` WHERE 1";						
						$result = $conn->query($sql);
						
						// Fahrräder
						echo "<tr><td>Fahrrad</td><td><select name=\"fahrradnr\">";
						if ($result->num_rows > 0) {												
							while($row = $result->fetch_assoc()) {
								echo "<option value=\"" . $row["Fahrradnr"] . "\">" . $row["Bezeichnung"] . "</option>";							
							}
							echo "</select></td></tr>";
						} else {
							echo "0 results";
						}
						$conn->close();
						
						// Kunden
						
						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}																
						$sql = "SELECT `Kundennr`, `Vorname`, `Name` FROM `Kunden` WHERE 1";						
						$result = $conn->query($sql);
						
						echo "<tr><td>Kunden</td><td><select name=\"kundennr\">";
						if ($result->num_rows > 0) {												
							while($row = $result->fetch_assoc()) {
								echo "<option value=\"" . $row["Kundennr"] . "\">" . $row["Kundennr"] . " "
								. $row["Vorname"] . " " . $row["Name"] . "</option>";							
							}
							echo "</select></td></tr>";
						} else {
							echo "0 results";
						}
						$conn->close();					
						
					?>
					
					
				  </table>
				  <input  type="Submit" name="vermietung_eintragen" value="Mietvertrag erstellen" /> 
				</form>
			</div>


</div>

</body>
</html>
