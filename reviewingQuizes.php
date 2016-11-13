<?php
session_start();
if(!isset($_SESSION["Eposta"])){
		header("Location: errorea.php");
}
if($_SESSION["Eposta"]!="web000@ehu.es"){
	header("Location: erroreaikaslea.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak editatu</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
	<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
		XMLHttpRequestObject= new XMLHttpRequest();
		
		XMLHttpRequestObject.onreadystatechange= function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){ 	 
				document.getElementById('txtHint').innerHTML= XMLHttpRequestObject.responseText;
			}
		}
	
		function galderakEditatu(){
			var galderazbkia=document.getElementById("Id").value;
			if (galderazbkia==''){
				alert ("Galderaren zenbakia sartu behar duzu");
				return false;
			}
			else{
				var param= "GalderaZbkia="+galderazbkia;

				XMLHttpRequestObject.open("POST",'GalderaEditatu.php', true);
				XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				XMLHttpRequestObject.send(param);
			}
		}
		
		$(document).on("click", '#gorde', function(event) { 
			var GalderaZbkia = document.getElementById('GalderaZbkia').value; 
			var Galdera = document.getElementById('Galdera').value;
			var Erantzuna = document.getElementById('Erantzuna').value;
			var Zailtasuna = document.getElementById('Zailtasuna').value;
			var Gaia = document.getElementById('Gaia').value;
			$("#txtHint2").load("galderaGorde.php",{GalderaZbkia:GalderaZbkia, Galdera:Galdera, Erantzuna:Erantzuna, Zailtasuna:Zailtasuna, Gaia:Gaia} );
			location.reload();
		});
	
	</script>
  </head>
  <body>
	<header class='main' id='h1'>
		<span class="right"><a href='layout.html'>Hasiera orria</a> </span>
		<h2>Galderak ikusi/editatu</h2>
    </header><br>

		<?php
		$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
		//$link = mysqli_connect ("localhost","root","","quizz");

		if ($link->connect_error) {
			printf("Connection failed: " . $link->connect_error);
		} 


		$galderak = $link -> query ("SELECT * FROM galdera");
		echo '<div style="text:align:center;" id="taula">';
		echo '<table style="margin:0px auto" border="1" align="center">
		<tr>
			<th> Id </th>
			<th> Eposta </th>
			<th> Galdera </th>
			<th> Erantzuna </th>
			<th> Zailtasuna </th>
			<th> Gaia </th>
		</tr>';

		

		while($row = mysqli_fetch_array($galderak)) {
			echo '<tr>
					<td>'.$row['GalderaZbkia'].'</td> 
					<td>'.$row['Eposta'].'</td> 
					<td><div contenteditable>'.$row['Galdera'].'</div></td>
					<td><div contenteditable>'.$row['Erantzuna'].'</div></td>
					<td><div contenteditable>'.$row['Zailtasuna'].'</div></td>
					<td><div contenteditable>'.$row['Gaia'].'</div></td>
				  </tr>';
		}
		echo '</table>';
		echo '</div><br><br>';
		
		mysqli_close($link);
		?>
		
	<div align="center">
		<form id="editatu" onsubmit="return false;">
			Editatu nahi duzun galderaren id-a: <input type='text' title='Id' name='Id' id='Id' value='' /> <br><br>
			<input type="button" name="galderaEditatu" value="Galdera Editatu" onclick='galderakEditatu()'/><br><br>
		</form>
		<input type="button" id="saioaitxi" name="saioaitxi" value="Saioa Itxi" onclick="location.href = 'logOut.php';"></input><br><br>
	</div>
	<div id="txtHint" style="text-align:center;"></div>
   </body>
   </html>