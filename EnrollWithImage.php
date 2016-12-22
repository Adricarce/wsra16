<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Erregistratu</title>
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
	<h2>Erregistratu</h2>
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

$Pasahitza = crypt($_POST['Pasahitza'], 'rd');

/*if($_FILES['image']['error']==0){
	$file= $_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
}else{
	$image=null;
	$image_name="";
}
*/
if (filter_var($_POST['Izena'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
	if (filter_var($_POST['Abizena1'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
		if (filter_var($_POST['Abizena2'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/([A-ZÑÁÉÍÓÚ]{1}[a-zñáéíóú]+(\s){0,1})+/")))){
			if (filter_var($_POST['Eposta'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@ikasle\.ehu\.e(us|s)/")))){
				if (filter_var($Pasahitza,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z,0-9]{6,}/")))){
					if (filter_var($_POST['Telefonoa'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[0-9]{9}/")))){
						if ($_POST['Espezialitatea']!='Besterik'){
							$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Galdera, Erantzuna, Saiakera) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$Pasahitza' , '$_POST[Telefonoa]' , '$_POST[Espezialitatea]' , '$_POST[Interesa]' ,  '$_POST[Galdera]' , '$_POST[Erantzuna]', 0)";
						}
						else{
							$sql="INSERT INTO erabiltzaile (Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Interesa, Galdera, Erantzuna, Saiakera) VALUES ('$_POST[Izena]' , '$_POST[Abizena1]' , '$_POST[Abizena2]' , '$_POST[Eposta]' , '$Pasahitza' , '$_POST[Telefonoa]' , '$_POST[BesteEspezialitatea]' , '$_POST[Interesa]' ,  '$_POST[Galdera]' , '$_POST[Erantzuna]', 0)";	
						}
						if (!$link -> query($sql)){
								echo "<p><a href = 'signUpBerria.html'>Zuzendu datuak</a></p>";
								die("<p>Errorea gertatu da: ".$link -> error ."</p>");
						}
						else{
							echo '<div align="center">Erregistro bat gorde  da!';
						}
					}
					else{
						echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
						echo 'Telefonoak 9 digitu izan behar ditu.';
					}
				}
				else{
					echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
					echo'Pasahitzak gutxienez 6ko luzera izan behar du.';
				}
			}
			else{
				echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
				echo'Posta elektronikoak EHUko ikasleen txantiloira doitu behar du; hots Hizkiak+3 digitu+ @ikasle.ehu. + eus/es';
			}
		}
		else{
			echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
			echo'2. abizena: Lehenengo hizkiak letra larria izan behar du.';
		}
	}
	else{
		echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
		echo'1. abizena: Lehenengo hizkiak letra larria izan behar du.';
	}
}	
else{
	echo '<p align="center"><a href = "signUpBerria.html">Zuzendu datuak</a></p>';
	echo'Izena: Lehenengo hizkiak letra larria izan behar du.';
}

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
