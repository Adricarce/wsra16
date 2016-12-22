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

$erantzuna = $link -> query ("SELECT * FROM erabiltzaile WHERE Eposta='$_SESSION[Eposta]'");
$row1 = mysqli_fetch_assoc($erantzuna);
$erantzuna2 = $row1["Erantzuna"];
$er2 = $_POST['Erantzuna2'];


	if ($erantzuna2 == "$er2"){
		echo '<form id="erregistro" name="erregistro" method="post" action="eguneratuPasahitza.php">';
		echo 'Sartu pasahitz berria hemen: <br><br>';
		echo '<input type="password" name="pasahitzberria" id="pasahitzberria" value=""  /><br><br>';
		echo '<button name="submit" id="submit" type="submit" value="submit" >Eguneratu</button>';
		echo '</form>';
	}
	else{
		echo 'Erantzun okerra, saiatu berriro <br><br>';
	}


?>