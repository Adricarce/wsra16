<?php
session_start();
$_SESSION['Zuzenak'] = 0;
$_SESSION['Okerrak'] = 0;

$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
//$link = mysqli_connect ("localhost","root","","quizz");

if ($link->connect_error) {
    printf("Connection failed: " . $link->connect_error);
} 

	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Jolastu</title>
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
	XMLHttpRequestObject = new XMLHttpRequest();
	
	XMLHttpRequestObject.onreadystatechange = function(){
		if ((XMLHttpRequestObject.readyState==4) && (XMLHttpRequestObject.status==200)){
			var obj = document.getElementById('txtHint').innerHTML = XMLHttpRequestObject.responseText;

		}
	}
	function galderakIkusi(){
				
		var nick=document.getElementById("Nick").value;
		if(nick==''){
				alert('Nick-a ezin da hutsik utzi.');
				return false;
		}else{
			document.getElementById("Anonimo").style.display="none";
			var param="nick="+nick;
			XMLHttpRequestObject.open("POST","galderak.php", true);
			XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			XMLHttpRequestObject.send(param);
		}
	}
		
	$(document).on("click", '#Konprobatu', function(event) { 
		var GalderaZbkia = document.getElementById('GalderaZbkia').value; 
		var Erantzuna = document.getElementById('Erantzuna').value;
		if(GalderaZbkia==''){
				alert('Galdera zenbakia ezin da hutsik utzi.');
				return false;
			}
			if(Erantzuna==''){
				alert('Erantzuna ezin da hutsik utzi.');
				return false;
			}
		$("#txtHint2").load("erantzunak.php",{GalderaZbkia:GalderaZbkia, Erantzuna:Erantzuna} );
	});
</script>
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='signUpBerria.html'>Sign Up</a> </span><br>
	  <span class="right"><a href='signIn.html'>Sign In</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Jolastu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='anonimoa.php'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='ShowQuestions.php'>Galderak</a></span>
	</nav>
    <section class="main" id="s1">
	
	<div align="center">
	<div align="center" id="txtHint">
	</div>
	<form id="Anonimo" onsubmit="return false;">
	  Nick-a (*) <input type="text" id="Nick" name="Nick" title="Nick"/> <br>
	  <input type="button" name="Jolastu" value="Jolastu" onclick='galderakIkusi()'/>
	</form>
	
 </div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>
</html> 