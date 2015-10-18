<html>
<head>
<head>
 <meta charset="utf-8">
<title>jQuery UI Spinner - Overflow</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="/resources/demos/external/jquery.mousewheel.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#spinner" ).spinner({
spin: function( event, ui ) {
if ( ui.value > 40 ) {
$( this ).spinner( "value", 1 );
return false;
} else if ( ui.value < 1 ) {
$( this ).spinner( "value", 40 );
return false;
}
}
});
});

$(function() {
$( "#from" ).datepicker({
defaultDate: "+1w",
dateFormat: "yy-mm-dd",
changeMonth: true,
showWeek: true,
numberOfMonths: 1,
firstDay: 1,
onClose: function( selectedDate ) {
$( "#to" ).datepicker( "option", "minDate", selectedDate );

}
});
$( "#to" ).datepicker({
defaultDate: "+1w",	
dateFormat: "yy-mm-dd",
changeMonth: true,
showWeek: true,
numberOfMonths: 1,
firstDay: 1,
onClose: function( selectedDate ) {
$( "#from" ).datepicker( "option", "maxDate", selectedDate );
}
});
});

</script>
</head>
</head>
<body>



<table>

<!--<form action="schulwochen_einpflegen.php" method="post"> -->
<!-- <form action="test.php" method="post"> -->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">

<p>Schuljahr:
<select name="schuljahr">
<option value="1415">2014/15</option>
<option value="1516">2015/16</option>
<option value="1617">2016/17</option>
<option value="1718">2017/18</option>
</select>
</p>
<p>
 Schulwoche (zwischen 1 und 40): <input type="number" name="schulwoche" min="1" max="40" required>
</p>


<p>von: <input type="date" name="von" required></p>
<p>bis: <input type="date" name="bis" required></p>
<p>Bemerkung: <input type="text" name="bemerkung"></p>



<?php

	if (!$link = mysql_connect('localhost', 'root', '')) {
		echo 'Keine Verbindung zu mysql';
		exit;
	}
	if (!mysql_select_db('bbtf', $link)) {
		echo 'Konnte Schema nicht selektieren';
		exit;
	}
	
	
	


?>


<input type="submit" name="absenden" value="speichern"/>
</form>




</table>

<pre>
<?php
$status = isset($_POST['absenden']);

if ($status)
{


$sql    = 'REPLACE INTO schulwochen (sw, von, bis, schuljahr, bemerkung) VALUES(' . $_POST['schulwoche'] . ',"' . $_POST['von'] . '","' . $_POST['bis'] . '","' . $_POST['schuljahr'] . '","' . $_POST['bemerkung'] . '")';		
		$result = mysql_query($sql, $link);	
		echo "Datensatz gespeichert";

}
elseif (!$status)
{
echo "Sie haben den Absendenknopf nicht betätigt.";
}
   
   
	
?>

</pre>

</body>
</html>
