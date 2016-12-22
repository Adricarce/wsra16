<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Erantzunak</title>
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

<?php
session_start();
	$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
	//$link = mysqli_connect ("localhost","root","","quizz");

	if ($link->connect_error) {
		printf("Connection failed: " . $link->connect_error);
	} else{
		$id = $link->query( "SELECT * FROM galdera WHERE GalderaZbkia='$_POST[GalderaZbkia]'" );
		$num_rows=mysqli_num_rows($id);
			if ($num_rows> 0){
				$erantzuna = $link->query( "SELECT * FROM galdera WHERE GalderaZbkia='$_POST[GalderaZbkia]' and Erantzuna='$_POST[Erantzuna]'" );
				$num_rows2=mysqli_num_rows($erantzuna);
				if ($num_rows2> 0){
					$_SESSION['Zuzenak'] = $_SESSION['Zuzenak']+1;
					echo "<p>Erantzuna zuzena da. <br> Zuzenak: ".$_SESSION['Zuzenak']."<br> Okerrak: ".$_SESSION['Okerrak']."</p><br>";
				}else{
					$_SESSION['Okerrak'] = $_SESSION['Okerrak']+1;
					echo "<p>Erantzuna okerra da. <br> Zuzenak: ".$_SESSION['Zuzenak']."<br> Okerrak: ".$_SESSION['Okerrak']."</p><br>";
				}
			}else{
				echo "Galdera zenbaki hori ez da existitzen.<br>";
			}	
	}
?>

</body> 
</html>