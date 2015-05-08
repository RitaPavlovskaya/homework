<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Форма</title>
	</head>
	<body>
		<?php
		$prices=array("margarita"=>399, "salyami"=>499, "4sezona"=>599, "gavaiskaya"=>599); 
		$_totalPrice=$_POST[kol]*$prices["$_POST[item]"];
		$csvFile = 'CSV.csv';
		$csvData = "{$_POST[name1]};{$_POST[name2]};{$_POST[item]};{$_POST[kol]};{$_POST[me]};{$_totalPrice}\r\n";
		file_put_contents( $csvFile, $csvData, FILE_APPEND );
		?>
	</body> 
</html>