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

						
						
		$erabiltzaile = $link -> query ("SELECT * FROM erabiltzaile WHERE Eposta='$_POST[eposta]'");
		$num_rows=mysqli_num_rows($erabiltzaile);
		if ($num_rows> 0){
			$link -> query ("DELETE FROM erabiltzaile WHERE Eposta='$_POST[eposta]'");
		}
		else{
			echo "Erabiltzaile hori ez dago datu-basean";
		}
			

?>
