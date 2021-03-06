<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak</title>
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
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Galderak</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='anonimoa.php'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='ShowQuestions.php'>Galderak</a></span>
	</nav>
    <section class="main" id="s1">
	<?php
		session_start();
		$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
		//$link = mysqli_connect ("localhost","root","","quizz");

		if ($link->connect_error) {
			printf("Connection failed: " . $link->connect_error);
		} 

		$galderak = $link -> query ("SELECT * FROM galdera");
		echo '<h1 align="center"> Galdera guztien zerrenda </h1>';
		echo '<div style="text:align:center;" id="taula">';
		echo '<table style="margin:0px auto" border="1" align="center">
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
		echo '</table></div>';
		mysqli_close($link);
	?>

    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>
</html> 
