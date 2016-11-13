<?php
session_start();
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 


if (filter_var($_POST['Izena'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
	if (filter_var($_POST['Abizena1'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
		if (filter_var($_POST['Abizena2'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
			if (filter_var($_POST['Eposta'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle\.ehu\.e(us|s)/")))){
				if (filter_var($_POST['Pasahitza'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z,0-9]{6,}/")))){
					if (filter_var($_POST['Telefonoa'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[0-9]{9}/")))){
						if ($_POST['Espezialitatea']!='Besterik'){
							$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[Espezialitatea]' , '$_POST[Interesa]')";
						}
						else{
							$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$_POST[Pasahitza]' , '$_POST[Telefonoa]' , '$_POST[BesteEspezialitatea]' , '$_POST[Interesa]')";	
						}
						if (!$link -> query($sql)){
								echo "<p><a href = 'signUpBerria.html'>Zuzendu datuak</a></p>";
								die("<p>Errorea gertatu da: ".$link -> error ."</p>");
						}
						else{
							echo '<div align="center">Erregistro bat gorde  da!
							<p><a href = "ShowUsers.php">Erabiltzaile guztiak ikusi</a></p>
							<p><a href = "layout.html">Hasiera orria</a></p></div>';
						}
					}
					else{
						echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
						echo 'Telefonoak 9 digitu izan behar ditu.';
					}
				}
				else{
					echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
					echo'Pasahitzak gutxienez 6ko luzera izan behar du.';
				}
			}
			else{
				echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
				echo'Posta elektronikoak EHUko ikasleen txantiloira doitu behar du; hots Hizkiak+3 digitu+ @ikasle.ehu. + eus/es';
			}
		}
		else{
			echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
			echo'2. abizena: Lehenengo hizkiak letra larria izan behar du.';
		}
	}
	else{
		echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
		echo'1. abizena: Lehenengo hizkiak letra larria izan behar du.';
	}
}	
else{
	echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
	echo'Izena: Lehenengo hizkiak letra larria izan behar du.';
}
mysqli_close($link);
?>