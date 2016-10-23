<?php
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

$galderak = $link -> query ("SELECT * FROM galdera");
echo '<h1 align="center"> Galdera guztien zerrenda </h1>';
echo '<table border=1 align="center">
<tr>
	<th> Galdera </th>
	<th> Zailtasuna </th>
</tr>';

while( $row = mysqli_fetch_array($galderak)) {
	echo '<tr>
			<td>'.$row['Galdera'].'</td> 
			<td>'.$row['Zailtasuna'].'</td> 
		  </tr>';
}
echo '</table>';
echo '<p align="center"><a href = "layout.html">Hasiera orria</a></p></div>';
mysqli_close($link);
?>