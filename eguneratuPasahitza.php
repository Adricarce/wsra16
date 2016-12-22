<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Pasahitza berreskuratu</title>
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
	<h2>Pashitza berreskuratu</h2>
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

if(!isset($_SESSION["Eposta"])){
	header("Location: errorea.php");
}
$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 
require_once('lib/lib/nusoap.php');
require_once('lib/lib/class.wsdlcache.php');

//$bezeroa = new nusoap_client('http://localhost:1234/myquizz-master/myquizz-master/myquizz-master/egiaztatuPasahitza.php?wdsl/egiaztatuPasahitza.php?wsdl', false);
$bezeroa = new nusoap_client('http://ws16adri.esy.es/myquizz-master/egiaztatuPasahitza.php?wdsl/egiaztatuPasahitza.php?wsdl/egiaztatuPasahitza.php?wsdl', false);

if (isset($_POST['pasahitzberria'])){
	if ($bezeroa->call('egiaztatuPasahitza',array('x'=>$_POST['pasahitzberria']))=='BALIOGABEA'){
		echo 'BALIOGABEA <br>';
		echo "<a href='berreskurapena.php'>Atzera</a>";
	}elseif ($bezeroa->call('egiaztatuPasahitza',array('x'=>$_POST['pasahitzberria']))=='BALIOZKOA'){	
		$Pasahitza = crypt($_POST['pasahitzberria'], 'rd');
		$eguneratu = "UPDATE erabiltzaile SET Pasahitza = '$Pasahitza' WHERE Eposta = '$_SESSION[Eposta]'";
		if (!$link -> query($eguneratu)){
					die("<p>Errorea gertatu da: ".$link -> error ."</p>");
		}else{
			echo "Pasahitza zuzen eguneratu da. <br>";
		}
	}else{
		echo 'Errorea.';
	}
}
?>
	

  </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>  



</html> 
