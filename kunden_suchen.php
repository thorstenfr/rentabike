<html>
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
				<form action="kunden_gesucht.php" method="post">
					<table border="0" cellpadding="0" cellspacing="4">
					<tr>
					  <td align="right">Vorname:</td>
					  <td><input name="vorname" type="text" size="30" maxlength="30"></td>
					</tr>
					<tr>
					  <td align="right">Zuname:</td>
					  <td><input name="zuname" type="text" size="30" maxlength="40"></td>
					</tr>
					<tr>
					  <td align="right">PLZ:</td>
					  <td><input name="plz" type="text" size="30" maxlength="40"></td>
					</tr>
				  </table>
				  <input  type="Submit" name="kunden_suchen" value="Kunden suchen" /> 
				</form>
			</div>

<pre>

</pre>
</div>

</body>
</html>
