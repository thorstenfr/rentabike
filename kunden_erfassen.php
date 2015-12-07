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
				<form action="kunden_erfasst.php" method="post">
					<table border="0" cellpadding="0" cellspacing="4">
					<tr>
					  <td align="right">Kundennr:</td>
					  <td><input name="kundennr" type="text" size="30" maxlength="30" pattern="[0-9]{1,5}" placeholder="0-99999" 
					  		required="required" title="Bitte geben Sie eine Nummer zwischen 0 und 99999 ein." ></td>
					  <td class="beispiel">Bsp.: 4001</td>
					</tr>
					<tr>
					  <td align="right">Vorname:</td>
					  <td><input name="vorname" type="text" size="30" maxlength="30" required="required"></td>
					  <td class="beispiel">Bsp.: Bernd</td>
					</tr>
					<tr>
					  <td align="right">Zuname:</td>
					  <td><input name="zuname" type="text" size="30" maxlength="40" required="required"></td>
					  <td class="beispiel">Bsp.: Stromberg</td>
					</tr>
					<tr>
					  <td align="right">Straße Nr:</td>
					  <td><input name="strasse" type="text" size="30" maxlength="40" required="required"></td>
					  <td class="beispiel">Bsp.: Weinweg 12</td>
					</tr>
					<tr>
					  <td align="right">Postleitzahl:</td>
					  <td><input name="plz" type="text" size="30" maxlength="40" required="required"></td>
					  <td class="beispiel">Bsp.: 75249</td>
					</tr>
					<tr>
					  <td align="right">Wohnort:</td>
					  <td><input name="wohnort" type="text" size="30" maxlength="40" required="required"></td>
					  <td class="beispiel">Bsp.: Kieselbronn</td>
					</tr>
					<tr>
					  <td align="right">Geschlecht:</td>				
					  <td>
						  <select name="geschlecht" size="1"> 
							 <option value="m" selected="selected">m&auml;nnlich</option> 
							 <option value="w">weiblich</option> 							 
						  </select>  
					  </td>
					</tr>	
					<tr>
					  <td align="right">Geburtstag:</td>
					  <td><input name="geburtstag" type="text" size="30" maxlength="40" required="required"></td>
					  <td class="beispiel">Bsp.: 1972-08-30</td>
					</tr>					
				  </table>
				  <input  type="Submit" name="kunden_eintragen" value="Kunden eintragen" /> 
				</form>
			</div>


</div>

</body>
</html>
