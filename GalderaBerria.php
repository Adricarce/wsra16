<?php
	$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
	//$link = mysqli_connect ("localhost","root","","quizz");
	if ($link->connect_error) {
		printf("Connection failed: " . $link->connect_error);
	} 
	else{
		$sql="INSERT INTO galdera (Eposta, Galdera, Erantzuna, Zailtasuna, Gaia) VALUES ('$_COOKIE[Erabiltzaile]' , '$_POST[Galdera]' , '$_POST[Erantzuna]' , '$_POST[Zailtasuna]', '$_POST[Gaia]')";
		if (!$link -> query($sql)){
		die("<p>Errorea gertatu da: ".$link-> error ."</p>");
		}else{
			echo "Galdera zuzen sartu da";
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
	}
	mysqli_close($link);
?>

