<?php
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");
$erabiltzaileak = $link -> query ("SELECT * FROM erabiltzaile");
echo '<h1 align="center"> Erabiltzaile guztien zerrenda </h1>';
echo '<table border=1 align="center">
<tr>
	<th> Izena </th>
	<th> Abizena1 </th>
	<th> Abizena2 </th>
	<th> Eposta </th>
	<th> Pasahitza </th>
	<th> Telefonoa </th>
	<th> Espezialitatea </th>
	<th> Interesa </th>
</tr>';

while( $row = mysqli_fetch_array($erabiltzaileak)) {
	echo '<tr>
			<td>'.$row['Izena'].'</td> 
			<td>'.$row['Abizena1'].'</td> 
			<td>'.$row['Abizena2'].'</td>
			<td>'.$row['Eposta'].'</td>
			<td>'.$row['Pasahitza'].'</td>
			<td>'.$row['Telefonoa'].'</td>
			<td>'.$row['Espezialitatea'].'</td>
			<td>'.$row['Interesa'].'</td>
		  </tr>';
}
echo '</table>';
echo '<p align="center"><a href = "layout.html">Hasiera orria</a></p></div>';
mysqli_close($link);
?>
