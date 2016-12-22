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
	<title>Erabiltzaileak</title>
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
	  XMLHttpRequestObject= new XMLHttpRequest();
		
		XMLHttpRequestObject.onreadystatechange= function(){
			if ((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){ 	 
				document.getElementById('txtHint').innerHTML= XMLHttpRequestObject.responseText;
			}
		}
	
		function ezabatu(){
			var eposta=document.getElementById("Eposta").value;
			if (eposta==''){
				alert ("Erabiltzailearen eposta sartu behar duzu");
				return false;
			}
			
				var param= "eposta="+eposta;
				XMLHttpRequestObject.open("POST","ErabiltzaileaEzabatu.php", true);
				XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				XMLHttpRequestObject.send(param);	
		}
		
			</script>
   </head>
  <body>
   <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='signUpBerria.html'>Sign Up</a> </span><br>
	  <span class="right"><a href='signIn.html'>Sign In</a> </span>
	<h2>Erabiltzaileak ikusi/ezabatu</h2>
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
$erabiltzaileak = $link -> query ("SELECT * FROM erabiltzaile");


echo '<h1 align="center"> Erabiltzaile guztien zerrenda </h1>';
echo '<div style="text:align:center;" id="taula">';
echo '<table style="margin:0px auto" border="1" align="center">
<tr>
	<th> Izena </th>
	<th> Abizena1 </th>
	<th> Abizena2 </th>
	<th> Eposta </th>
	<th> Pasahitza </th>
	<th> Telefonoa </th>
	<th> Espezialitatea </th>
	<th> Interesa </th>
</tr>';

while( $row = mysqli_fetch_array($erabiltzaileak)) {
	echo '<tr>
			<td>'.$row['Izena'].'</td> 
			<td>'.$row['Abizena1'].'</td> 
			<td>'.$row['Abizena2'].'</td>
			<td>'.$row['Eposta'].'</td>
			<td>'.$row['Pasahitza'].'</td>
			<td>'.$row['Telefonoa'].'</td>
			<td>'.$row['Espezialitatea'].'</td>
			<td>'.$row['Interesa'].'</td>
		  </tr>';
}
echo '</table></div>';
$link->close();
?>
<form id="editatu" onsubmit="return false;">
			<br>Ezabatu nahi duzun erabiltzailearen eposta: <input type="text" title="Eposta" name="Eposta" id="Eposta" value="" /> <br><br>
			<input type="button" name="erabiltzaileaEzabatu" value="Erabiltzailea ezabatu" onclick="ezabatu()"/><br><br>
</form>
<div id="txtHint" style="text-align:center;"></div>
<br><a href='irakaslea.html'>Atzera</a>
	</section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>
</html>

