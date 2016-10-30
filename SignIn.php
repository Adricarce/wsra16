<?php
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

if (isset($_POST['submit'])) { 
	if (filter_var($_POST['Eposta'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle\.ehu\.e(us|s)/")))){
		if (filter_var($_POST['Pasahitza'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z,0-9]{6,}/")))){
			$erabiltzailea = $link->query( "SELECT * FROM erabiltzaile WHERE Eposta=('$_POST[Eposta]') and Pasahitza=('$_POST[Pasahitza]')" );
			$num_rows=mysqli_num_rows($erabiltzailea);
			if($num_rows>0){
				$ordua=date('H:i:s');
				setcookie("Erabiltzaile","$_POST[Eposta]");
				$sql="INSERT INTO konexioa (Eposta, Ordua) VALUES ('$_POST[Eposta]' , '$ordua')";
				if (!$link -> query($sql)){
						die("<p>Errorea gertatu da: ".$link-> error ."</p>");
				}else{				
					/*$KonId = $link->query("SELECT Identifikazioa FROM konexioa WHERE Eposta=('$_POST[Eposta]') and Ordua=('$ordua')" );
					if ($KonId->num_rows>0){
						$_SESSION['Identifikazioa']=$KonId->fetch_object()->Identifikazioa;
					}*/
					header('Location: handlingQuizes.php');
				}
			}
			else{
				echo "<script type=\"text/javascript\">alert(\"Eposta edo pasahitza okerra da.\");</script>"; 
				echo '<p align="center"><a href = "signIn.html">Saiatu berriro</a></p>';
				echo '<p align="center"><a href = "layout.html">Hasiera orria</a></p>';
			}		
		}
		else{
			echo'Pasahitzak gutxienez 6ko luzera izan behar du.';
		}
	}
	else{
		echo'Posta elektronikoak EHUko ikasleen txantiloira doitu behar du; hots Hizkiak+3 digitu+ @ikasle.ehu. + eus/es';
	}
}
mysqli_close($link);
?>