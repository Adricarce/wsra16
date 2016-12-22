<?php
session_start();
if($_SESSION["Eposta"]!="web000@ehu.es"){
	header("Location: erroreairakaslea.php");
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
			
				var param= "GalderaZbkia="+galderazbkia;
				XMLHttpRequestObject.open("POST","GalderaEditatu.php", true);
				XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				XMLHttpRequestObject.send(param);	
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
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='signUpBerria.html'>Sign Up</a> </span><br>
	  <span class="right"><a href='signIn.html'>Sign In</a> </span>
	<h2>Galderak ikusi/editatu</h2>
	<p align="right"><?php echo "$_SESSION[Eposta]";?></p>
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
					<td>'.$row['Galdera'].'</td>
					<td>'.$row['Erantzuna'].'</td>
					<td>'.$row['Zailtasuna'].'</td>
					<td>'.$row['Gaia'].'</td>
				  </tr>';
		}
		echo '</table>';
		echo '</div><br><br>';
		
		mysqli_close($link);
		?>
		<div align="center">
		<form id="editatu" onsubmit="return false;">
			Editatu nahi duzun galderaren id-a: <input type="text" title="Id" name="Id" id="Id" value="" /> <br><br>
			<input type="button" name="galderaEditatu" value="Galdera Editatu" onclick="galderakEditatu()"/><br><br>
		</form>
	</div>
	<div id="txtHint" style="text-align:center;"></div>
	<a href='irakaslea.html'>Atzera</a>

	</section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>
</html>
