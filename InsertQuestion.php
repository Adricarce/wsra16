<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak gehitu</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	<script type="text/javascript">
	function hutsaEz() {
			var gald=document.getElementById("Galdera").value;
			var eran=document.getElementById("Erantzuna").value;
			var gaia=document.getElementById("Gaia").value;
			if(gald==''){
				alert('Galdera eremua ezin da hutsik utzi.');
				return false;
			}
			if(eran==''){
				alert('Erantzuna eremua ezin da hutsik utzi.');
				return false;
			}
			if(gaia==''){
				alert('Gaia eremua ezin da hutsik utzi.');
				return false;
			}
			return true;
		}
	</script>
  </head>
  <body>
	<header class='main' id='h1'>
		<span class="right"><a href='layout.html'>Hasiera orria</a> </span>
		<h2>Galderak gehitu</h2>
    </header><br>
	<div style="text-align:center;">
		<form id="galdera" name="galdera" method="post" onSubmit=" return hutsaEz()" action="InsertQuestion.php">
			Galdera (*)<br><textarea rows="3" cols="40" name="Galdera" id="Galdera"></textarea><br><br><br>
			Erantzuna (*)<br> <textarea rows="2" cols="40" name="Erantzuna" id="Erantzuna"></textarea><br><br><br>
			Gaia (*)<br> <textarea rows="2" cols="40" name="Gaia" id="Gaia"></textarea><br><br><br>
			Zailtasuna <select id="Zailtasuna" name="Zailtasuna">
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br><br>
			<input name="submit" type="submit" value="Bidali"><br><br>
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
				else{
					session_start();
					if (isset($_POST['submit'])) { 
						$sql="INSERT INTO galdera (Eposta, Galdera, Erantzuna, Zailtasuna, Gaia) VALUES ('$_COOKIE[Erabiltzaile]' , '$_POST[Galdera]' , '$_POST[Erantzuna]' , '$_POST[Zailtasuna]', '$_POST[Gaia]')";
						if (!$link -> query($sql)){
							die("<p>Errorea gertatu da: ".$link-> error ."</p>");
						}else{
							/*$Ekintza='GalderaTxertatu';
							$Identifikazioa=$_SESSION['Identifikazioa'];
							$ordua=date('H:i:s');
							if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
								$ip = $_SERVER['HTTP_CLIENT_IP'];
							} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
								$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
							} else {
								$ip = $_SERVER['REMOTE_ADDR'];
							}
							$txertatu="INSERT INTO ekintza (KonexioId, Eposta, EkintzaMota, EkintzaOrdua, IP) VALUES ('$Identifikazioa','$_COOKIE[Erabiltzaile]','$Ekintza','$ordua', '$ip')"; 
							if (!$link -> query($txertatu)){
								die("<p>Errorea gertatu da: ".$link -> error ."</p>");
							}*/
							echo "Galdera zuzen sartu da!";
							echo '<br>';
						}
						$xml = simplexml_load_file('galderak.xml');
						$assessmentItem = $xml->addChild('assessmentItem');
						$assessmentItem ->addAttribute('complexity', "$_POST[Zailtasuna]");
						$assessmentItem -> addAttribute('subject',"$_POST[Gaia]");
						$itemBody= $assessmentItem ->addChild('itemBody');
						$itemBody->addChild('p',"$_POST[Galdera]");
						$correctResponse= $assessmentItem ->addChild('correctResponse');
						$correctResponse->addChild('value',"$_POST[Erantzuna]");
						$xml->asXML('galderak.xml');
						echo "<a href ='seeXMLQuestions.php'>Ikusi galderak</a><br>";
					}
				}
				mysqli_close($link);
			?>
		</form>
	</div>
   </body>
   </html>
