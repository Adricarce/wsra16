<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Pasahitza berreskuratu</title>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
<script>
	XMLHttpRequestObject = new XMLHttpRequest();

	XMLHttpRequestObject.onreadystatechange = function(){
		if ((XMLHttpRequestObject.readyState==4) && (XMLHttpRequestObject.status==200)){
			var obj = document.getElementById('txtHint').innerHTML = XMLHttpRequestObject.responseText;

		}
	}
	
	function pasahitzaBerreskuratu(){	
		var erantzuna=document.getElementById("Erantzuna2").value;
		var param= "Erantzuna2="+erantzuna;
		
		XMLHttpRequestObject.open("POST","pasahitzaBerria.php", true);
		XMLHttpRequestObject.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		XMLHttpRequestObject.send(param);	
	}
</script>
</head>   
<?php
	session_start();
	$link = mysqli_connect ("mysql.hostinger.es","u885903313_adri","Fwrzd7QxoO","u885903313_quizz");
	//$link = mysqli_connect ("localhost","root","","quizz");

	if ($link->connect_error) {
		printf("Connection failed: " . $link->connect_error);
	} 
	
	$row = $link->query("SELECT * FROM erabiltzaile WHERE Eposta='$_SESSION[Eposta]'");
	$row1 = mysqli_fetch_assoc($row);
	$galdera = $row1["Galdera"];
	$erantzuna = $row1["Erantzuna"];
	$_SESSION['erantzuna'] = $erantzuna;
?>
<body> 
<div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href='signUpBerria.html'>Sign Up</a> </span><br>
	  <span class="right"><a href='signIn.html'>Sign In</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Pashitza berreskuratu</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='anonimoa.php'>Quizzes</a></span>
		<span><a href='credits.html'>Credits</a></span>
		<span><a href='ShowQuestions.php'>Galderak</a></span>
	</nav>
    <section class="main" id="s1">
  
	<div align="center">
		<?php echo "$galdera";?><br><br>
		<form id="erregistro" name="erregistro" method="post" >
			Erantzuna: <input type="text" id="Erantzuna2" name="Erantzuna2" title="Erantzuna2"><br><br>
			<input type="button" id="Bidali" value="Bidali" onclick='pasahitzaBerreskuratu()'/><br><br>
		</form>
	</div>
	<div align="center" id="txtHint">
	</div>
  </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
	<br>
</body>  



</html> 