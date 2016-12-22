<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Erabiltzaileak</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='signUpBerria.html'>Sign Up</a> </span><br>
	  <span class="right"><a href='signIn.html'>Sign In</a> </span>
	<h2>Erabiltzaileak ikusi</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='anonimoa.php'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='ShowQuestions.php'>Galderak</a></span>
		<span><a href='logOut.php'>Saioa itxi</a></span>
	</nav>
    <section class="main" id="s1">
<?php

session_start();
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

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
mysqli_close($link);
?>
<br><a href='irakaslea.html'>Atzera</a>
	</section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>
</html>
