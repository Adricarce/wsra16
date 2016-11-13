<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>XML Galderak</title>
  </head>
<body>
	<div align="center">
		<?php
			session_start();
			$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
			//$link = mysqli_connect ("localhost","root","","quizz");
			
			if ($link->connect_error) {
				printf("Connection failed: " . $link->connect_error);
			} 
			
			echo '<h1 align="center"> Galdera guztien zerrenda </h1>';
			echo '<table border=1 align="center">
			<tr>
				<th> Galdera </th>
				<th> Zailtasuna </th>	
				<th> Gaia </th>
			</tr>';

			$xml = simplexml_load_file("galderak.xml");
			foreach($xml ->children() as $child){		
				echo '<tr><td>'.$child[0] -> itemBody -> p.'</td>';
				echo '<td>'. $child[0]['complexity'].'</td>';
				echo '<td>'. $child[0]['subject']. '</td></tr>';
			}
				
			echo '<a href="layout.html">Hasiera orria</a>';
			echo '<br>';
			echo '<br>';
			echo '</table>';
		?>
		<br/> 
	</div>
	<div align="center">
		<a href='InsertQuestion.php'>Beste galdera bat sartu</a>
	</div>
</body> 
</html> 
