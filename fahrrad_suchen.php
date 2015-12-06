<html>
<head>
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
	<div id="nav">
		<?php include 'navi.php';?>
	</div>
	<div id="inhalt">
		<h1>Fahrrad suchen</h1>
		<form method="post" action="fahrrad_suchen_ergebnis.php">
			<table>
				<tr>
					<td>Bezeichnung</td><td><input type="text" id="fd_bezeichnung" placeholder="Scott Scale 70"></td>
				</tr>
				<tr>
					<td>Rahmennummer</td><td><input type="text" id="fd_Rahmennummer" placeholder="88/07"></td>
				</tr>
				<tr><td>Hersteller</td><td><select name="Herstellernr">
				<option value="" >beliebig</option>
				<option value="—————————" disabled="disabled">——————————</option>

							


				<?php
						include("db_verbindung.php");

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}					
							$sql = "SELECT `Herstellernr`,`Herstellername` FROM hersteller";						
							$result = $conn->query($sql);

							
							if ($result->num_rows > 0) {												
								while($row = $result->fetch_assoc()) {
									echo "<option value=\"" . $row["Herstellernr"] . "\">" . $row["Herstellername"] . "</option>";							
								}
								echo "</select></td></tr>";
							} else {
								echo "0 results";
							}
							$conn->close();
						?>
					</table>
					<hr>
					<table>
						<tr>
							<td><input style="text-align: right; width:50px;" type="text" placeholder="10.00" id="fn_tagesmietpreis_min"></td><td style="width: 30px;text-align: center;"><</td><td>Tagesmietpreis</td><td style="width: 30px;text-align: center;"><</td><td><input style="text-align: right; width:50px;" type="text" placeholder="20.00" id="fn_tagesmietpreis_max"></td>
						</tr>
						<tr>
							<td><input style="text-align: right; width:50px;" type="text" placeholder="450.00" id="fn_wert_min"></td><td style="width: 30px;text-align: center;"><</td><td>Wert</td><td style="width: 30px;text-align: center;"><</td><td><input style="text-align: right; width:50px;" type="text" placeholder="990.00" id="fn_wert_max"></td>
						</tr>
						<tr><td colspan="5"><input type="submit" value="Suchen!" style="width:100%; margin-top:5px;"></tr>
					</table>
				</form>

		
				
	
	</div> <!-- Inhalt -->
</div>




</body>
</html>
