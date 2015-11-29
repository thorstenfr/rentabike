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
			<?php
					include("db_verbindung.php");

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
				    
					$sql = "SELECT `Kundennr`, `Name`, `Vorname` FROM `Kunden` WHERE Vorname like \"". $_POST['vorname'] ."\"";
					
					
					echo "<div id=\"sql\">" . $sql . "</div>";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						echo "<table><tr><th>Kundennr</th><th>Name</th></tr>";
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row["Kundennr"]."</td><td>".$row["Vorname"]." ".$row["Name"]."</td></tr>";
						}
						echo "</table>";
					} else {
						echo "0 results";
					}
					$conn->close();
					?> 
				</div>
</div>




</body>
</html>
