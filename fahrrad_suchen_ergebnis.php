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
		
					$sql = "SELECT Fahrradnr, Bezeichnung, Tagesmietpreis, Wert FROM Fahrraeder WHERE 1";					
				
					if (isset($_POST['Herstellernr']) && $_POST['Herstellernr'] != "")
					{
						$sql = $sql . " AND Herstellernr = \"" . $_POST['Herstellernr'] . "\"";						 
					}

				
					// SQL - Stmt vervollständigen
					$sql = $sql . ";";

					
					
					
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo $result->num_rows . " Datensätze gefunden!";
						echo "<table><tr><th>Fahrradnr</th><th>Bezeichnung</th><th>Tagesmietpreis</th></tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["Fahrradnr"]."</td><td>".$row["Bezeichnung"]."</td><td> ".$row["Tagesmietpreis"]."</td></tr>";
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
