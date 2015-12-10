<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="./css/print.css">
    </head>

<body>
	
	<?php
	
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
	
		echo "<table class=\"center\">";
			echo "<tr><td class=\"ueberschrift\" colspan=\"2\">Mietvertrag </td></tr>";
			echo "<tr><td>Vertragsnummer:</td><td>" . $_POST['mietnr'] . "</td></tr>";
			echo "<tr><td>Datum:</td><td>" . $_POST['mietdatum'] . "</td></tr>";
			echo "<tr><td colspan=\"2\">zwischen Firma Rent a bike und</tr>";
			echo "<tr><td>Name:</td><td>" . $_POST['kundenname'] . "</td></tr>";
			echo "<tr><td colspan=\"2\">Mietobjekt</tr>";
			echo "<tr><td>Mietobjekt:</td><td>" . $_POST['fahrradbezeichnung'] . "</td></tr>";						
			echo "<tr><td>Ausleihdatum:</td><td>" . $_POST['von'] . "</td></tr>";			
			echo "<tr><td>Rückgabedatum:</td><td>" . $_POST['bis'] . "</td></tr>";			
			echo "<tr><td colspan=\"2\"><br></td></tr>";
			echo "<tr><td class=\"entwickler\" colspan=\"2\">Entwicklerinfo (SQL):<br>" .$_POST['sql']. "</td></tr>";
			// echo "<br>";
			// echo "<p class=\"sql\">" . $_POST['sql'] . "</p>";
		echo "</table>";
	?>

</body>
</html>
