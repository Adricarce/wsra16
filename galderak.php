<!DOCTYPE html>
<html>
<head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Jolastu</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
</head>
<body>
	<form id="galdera" onsubmit="return false;">
		  Galderaren id-a: <input type="text" id="GalderaZbkia" name="GalderaZbkia" title="GalderaZbkia"><br>
		  Erantzuna: <input type="text" id="Erantzuna" name="Erantzuna" title="Erantzuna"><br><br>
		  <input type="button" name="Konprobatu" id="Konprobatu" value="Konprobatu" /><br><br>
	</form>
<div align="center">
	<?php
	session_start();
	$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
	//$link = mysqli_connect ("localhost","root","","quizz");

	if ($link->connect_error) {
		printf("Connection failed: " . $link->connect_error);
	} 
		
	$erabiltzaileak = mysqli_query($link, "SELECT * FROM galdera" );
	echo '<table border=1>
	<tr>
		<th> Id </th>
		<th> Galdera </th>
		<th> Zailtasuna </th>
	</tr>';

	while( $row = mysqli_fetch_array( $erabiltzaileak )) {
		echo '<tr> 
			<td>'.$row['GalderaZbkia'].'</td> 
			<td>'.$row['Galdera'].'</td> 
			<td>'.$row['Zailtasuna'].'</td>
		</tr>';
	}
	echo '</table><br>';
	?>
	<div id="txtHint2"> </div>
	<?php
	echo "Erabiltzailearen nick-a: ";
	echo $_POST["nick"];
	echo '<br><a href="anonimoa.php">Irten</a>';
	?>

	
</div>
</body> 
</html>