<html>
<head>
        <meta charset="utf-8">
        <title>rent-a-bike by Thorsten Freimann</title>
        <link rel="stylesheet" href="../css/print.css">
    </head>

<body>
	
	<?php
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		
		echo "<table class=\"center\">";
			echo "<tr><td class=\"ueberschrift\" colspan=\"2\">Kundekarte </td></tr>";
			echo "<tr><td>Kundennummer:</td><td>" . $_POST['kundennr'] . "</td></tr>";
			echo "<tr><td>Vorname:</td><td>" . $_POST['vorname'] . "</td></tr>";
			echo "<tr><td>Nachname:</td><td>" . $_POST['zuname'] . "</td></tr>";			
			echo "<tr><td colspan=\"2\"><br></td></tr>";
			echo "<tr><td class=\"entwickler\" colspan=\"2\">Entwicklerinfo (SQL):<br>" .$_POST['sql']. "</td></tr>";
			// echo "<br>";
			// echo "<p class=\"sql\">" . $_POST['sql'] . "</p>";
		echo "</table>";
	?>

</body>
</html>
