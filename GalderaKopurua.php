<?php
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 
$galderak = $link -> query ("SELECT * FROM galdera");
$zuregalderak = $link -> query ("SELECT * FROM galdera WHERE Eposta='$_COOKIE[Erabiltzaile]'");

$num_rows=mysqli_num_rows($galderak);
$num_rows2=mysqli_num_rows($zuregalderak);

echo 'Nire galderak/Galderak guztira DB: '.$num_rows. '/'.$num_rows2.'.';

mysqli_close($link);
?>