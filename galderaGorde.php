<?php
session_start();
if(!isset($_SESSION["Eposta"])){
		header("Location: errorea.php");
}
	$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
	//$link = mysqli_connect ("localhost","root","","quizz");
	if ($link->connect_error) {
		printf("Connection failed: " . $link->connect_error);
	} 
	else{
		if(!$_POST['Galdera']=="" && !$_POST['Erantzuna']=="" && !$_POST['Zailtasuna']=="" && $_POST['Zailtasuna']>0 && $_POST['Zailtasuna']<6 && !$_POST['Gaia']==""){
			$txertatu="UPDATE galdera SET Galdera='$_POST[Galdera]', Erantzuna='$_POST[Erantzuna]', Zailtasuna='$_POST[Zailtasuna]', Gaia='$_POST[Gaia]' WHERE GalderaZbkia='$_POST[GalderaZbkia]'"; 
			if (!$link -> query($txertatu)){
				die("<p>Errorea gertatu da: ".$link -> error ."</p>");
			}else{
				echo 'Galdera zuzen sartu da';	
				header('Location: reviewingQuizzes.php');
			}
		}else{
			echo'Ez da hutsunerik onartuko.';
			header('Location: signUp.php');
		}
	}
?>