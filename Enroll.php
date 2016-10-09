<?php
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

if ($_POST['Espezialitatea']!='Besterik'){
	$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[Espezialitatea]' , '$_POST[Interesa]')";
}
else{
	$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[BesteEspezialitatea]' , '$_POST[Interesa]')";
}

$ema=mysqli_query($link,$sql);

if (!$ema){
	echo "<p><a href = 'signUp.html'>Zuzendu datuak</a></p>";
	die("<p>Errorea gertatu da: ".$link-> error ."</p>");
}
else{
	echo '<div align="center">Erregistro bat gorde  da!
	<p><a href = "ShowUsers.php">Erabiltzaile guztiak ikusi</a></p>
	<p><a href = "layout.html">Hasiera orria</a></p></div>';
}
mysqli_close($link);
?>