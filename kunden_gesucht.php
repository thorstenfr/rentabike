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
				<div id ="nav">
					<?php include 'navi.php';?>
				</div>
					
				<div id="inhalt">

						<?php
						
					include("db_verbindung.php");
					
					// Sollte später raus 
					error_log("username: [$username]" , 0);
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}					
		

					if (isset($_POST['vorname']) && $_POST['vorname'] != "") 
					{					
						$sql = "SELECT `Kundennr`, `Name`, `Vorname` FROM `Kunden` WHERE Vorname like \"". $_POST['vorname'];
						if (isset($_POST['zuname']) && $_POST['zuname'] != "")
						{
							$sql = $sql . "\" AND Name like \"" . $_POST['zuname'];
						}
						
						$sql = $sql . "\";";
						
						
					}
					else 
					{
						$sql = "SELECT `Kundennr`, `Name`, `Vorname` FROM `Kunden`";
					}
					if (isset($_POST['plz']) && $_POST['plz'] != "") 
					{	
						
						// Ortnr besorgen
						$sql2 = "select ortnr from Wohnorte where plz = \"" . $_POST['plz'] . "\"";
					
						
						$result = $conn->query($sql2);										
						if ($result->num_rows > 0) {
							// der Einfachheit halber nehme ich den ersten Ort
							while($row = $result->fetch_assoc()) {							
								$ortnr = $row["ortnr"];					
							}
						}
						
						$sql = "select Kundennr, Name, Vorname FROM Kunden where Ortnr=" . $ortnr;
						
					}  
					
					
					
					
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo $result->num_rows . " Datensätze gefunden!";
						echo "<table><tr><th>Kundennr</th><th>Name</th><th>Vorname</th></tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["Kundennr"]."</td><td>".$row["Name"]."</td><td> ".$row["Vorname"]."</td></tr>";
						}
						echo "</table>";				
						
					} else {
						echo "0 results";
					}
					
					echo "<br>Entwicklerinfo:<br>";
					echo "<div class=\"sql\">" . $sql . "</div>";
					
					
					$conn->close();
					?> 
				</div>
</div>




</body>
</html>
