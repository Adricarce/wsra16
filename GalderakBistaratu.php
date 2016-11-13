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


$galderak = $link -> query ("SELECT * FROM galdera WHERE Eposta='$_COOKIE[Erabiltzaile]'");
echo '<h1 align="center" id="izenburua"> Zure galderen zerrenda </h1>';
echo '<div style="text:align:center;" id="taula">';
echo '<table style="margin:0px auto" border="1" align="center">
<tr>
	<th> Galdera </th>
</tr>';

while( $row = mysqli_fetch_array($galderak)) {
	echo '<tr>
			<td>'.$row['Galdera'].'</td> 
		  </tr>';
}
echo '</table>';
echo '</div>';
mysqli_close($link);
?>