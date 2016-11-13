<?php
	session_start();

$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

if (!isset($_FILES['Irudia']['tmp_name'])) {
	if ($_POST['Espezialitatea']!='Besterik'){
		$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Irudia, IrudiIzena) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[Espezialitatea]' , '$_POST[Interesa]' , null, '')";
	}
	else{
		$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Irudia, IrudiIzena) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[BesteEspezialitatea]' , '$_POST[Interesa]' , null,'')";
	}
}
else{
    //$image=$_FILES['Irudia']['tmp_name']; // temporary name
    //$image_name= $_FILES['Irudia']['name']; // original file name
	$file= $_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	
	if ($_POST['Espezialitatea']!='Besterik'){
		$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Irudia, IrudiIzena) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[Espezialitatea]' , '$_POST[Interesa]' , '$image','$image_name')";
	}
	else{
		$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Irudia, IrudiIzena) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[BesteEspezialitatea]' , '$_POST[Interesa]' , '$image', '$image_name')";
	}
}	
	
$ema=mysqli_query($link,$sql);

if (!$ema){
	echo "<p><a href = 'signUp.html'>Zuzendu datuak</a></p>";
	die("<p>Errorea gertatu da: ".$link-> error ."</p>");
}
else{
	echo '<div align="center">Erregistro bat gorde  da!
	<p><a href = "ShowUsersWithImage.php">Erabiltzaile guztiak ikusi</a></p>
	<p><a href = "layout.html">Hasiera orria</a></p></div>';
}
mysqli_close($link);
?>