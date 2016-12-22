<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>LogIn</title>
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
	<h2>Saiakera kopurua</h2>
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
	$_SESSION['Eposta'] = $_POST['Eposta'];
	$Pasahitza = $_POST["Pasahitza"];
	$Pasahitza=crypt($Pasahitza,'rd');

if (isset($_POST['submit'])) { 
	if (filter_var($_POST['Eposta'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9]{3}@(ikasle\.)?ehu\.e(us|s)/")))){
		if (filter_var($_POST['Pasahitza'],FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z,0-9]{6,}/")))){
			$saiakera = $link->query( "SELECT * FROM erabiltzaile WHERE Eposta=('$_POST[Eposta]')" );
			$row = mysqli_fetch_array($saiakera);
			$_SESSION['Saiakera']=$row['Saiakera'];
			if ($_SESSION['Saiakera']==3){
				header('Location: kontuaBlokeatu.php');
			}
			else{	
				$erabiltzailea = $link->query( "SELECT * FROM erabiltzaile WHERE Eposta=('$_POST[Eposta]') and Pasahitza='$Pasahitza'" );
				$num_rows=mysqli_num_rows($erabiltzailea);
				if($num_rows>0){
					$ordua=date('H:i:s');
					setcookie("Erabiltzaile","$_POST[Eposta]");
					$sql="INSERT INTO konexioa (Eposta, Ordua) VALUES ('$_POST[Eposta]' , '$ordua')";
					if (!$link -> query($sql)){
							die("<p>Errorea gertatu da: ".$link-> error ."</p>");
					}else{				
						/*$KonId = $link->query("SELECT Identifikazioa FROM konexioa WHERE Eposta=('$_POST[Eposta]') and Ordua=('$ordua')" );
						if ($KonId->num_rows>0){
							$_SESSION['Identifikazioa']=$KonId->fetch_object()->Identifikazioa;
						}*/
						if($_POST['Eposta']=='web000@ehu.es'){
							header('Location: irakaslea.html');
						}
						else{
							header('Location: handlingQuizes.php');
						}
					}
					$eguneratua = "UPDATE erabiltzaile SET Saiakera = '0' WHERE Eposta = '$_POST[Eposta]'";
					if (!$link -> query($eguneratua)){
								die("<p>Errorea gertatu da: ".$link -> error ."</p>");
					}
				}
				else{
					$erab = $link->query( "SELECT * FROM erabiltzaile WHERE Eposta=('$_POST[Eposta]')" );
					$num_rows2=mysqli_num_rows($erab);
					if ($num_rows2> 0){
						echo '<p  align="center"> <br> Datuak ez dira zuzenak</p>';
						$_SESSION['Saiakera']=$_SESSION['Saiakera']+1;
						echo '<p  align="center"> Saiakera kopurua:  ' .$_SESSION['Saiakera'];'</p>';
						$eguneratu = "UPDATE erabiltzaile SET Saiakera = '$_SESSION[Saiakera]' WHERE Eposta = '$_POST[Eposta]'";
						if (!$link -> query($eguneratu)){
									die("<p>Errorea gertatu da: ".$link -> error ."</p>");
						}
						if ($_SESSION['Saiakera']==3){
							header('Location: kontuaBlokeatu.php');
						}
						else{
							echo '<br><br><p align="center"><a href = "signIn.html">Saiatu berriro</a></p>';
							
						}	
					}else{
						echo "<p>Emaila ez da zuzena</p>";
					}
				}		
			}
		}
			else{
				echo'<p align="center">Pasahitzak gutxienez 6ko luzera izan behar du.</p>';
				echo '<p align="center"><a href = "signIn.html">Saiatu berriro</a></p>';
			}
		
	}
	else{
		echo'<p align="center">Posta elektronikoak EHUko ikasleen txantiloira doitu behar du; hots Hizkiak+3 digitu+ @ikasle.ehu. + eus/es</p>';
		echo '<p align="center"><a href = "signIn.html">Saiatu berriro</a></p>';
	}
}
if (isset($_POST['ahaztu'])) { 
	$erabiltzaileak = $link -> query ("SELECT * FROM erabiltzaile WHERE Eposta=('$_POST[Eposta]')");
	$num_rows=mysqli_num_rows($erabiltzaileak);
	if ($num_rows> 0){
		header('Location: berreskurapena.php');
	}else{
		echo "<p>Emaila ez da zuzena</p>";
	}
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
