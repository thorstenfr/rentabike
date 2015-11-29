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
				<?php include 'navi.php';?>
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
