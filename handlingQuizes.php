<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galderak kudeatu</title>
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
	function galderaTxertatu(){
		document.getElementById("galdera").style.display="inline";
		document.getElementById("txertatu").style.display="none";
		document.getElementById("taula").style.display="none";
		document.getElementById("izenburua").style.display="none";
	}
	
	xhttp= new XMLHttpRequest();
	XMLHttpRequestObject2 = new XMLHttpRequest();
	
	xhttp.onreadystatechange= function(){
		if ((xhttp.readyState==4)&&(xhttp.status==200)){ 	 
			document.getElementById('txtHint').innerHTML= xhttp.responseText;
		}
	}

	
	function galderakBistaratu(){
		xhttp.open("POST",'GalderakBistaratu.php', true);
		xhttp.send(null);
	}
	
	
	XMLHttpRequestObject2.onreadystatechange = function(){
		if ((XMLHttpRequestObject2.readyState==4) && (XMLHttpRequestObject2.status==200)){
			var obj = document.getElementById('txtHint2').innerHTML = XMLHttpRequestObject2.responseText;
		}
	}	
	
	function galderaBerria(){
		var gald=document.getElementById("Galdera").value;
		var eran=document.getElementById("Erantzuna").value;
		var gaia=document.getElementById("Gaia").value;
		var zail=document.getElementById("Zailtasuna").value;
		var param= "Galdera="+gald+"&Erantzuna="+eran+"&Gaia="+gaia+"&Zailtasuna="+zail;
		
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
		XMLHttpRequestObject2.open("POST","GalderaBerria.php", true);
		XMLHttpRequestObject2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		XMLHttpRequestObject2.send(param);

	}
	
	function garbitu(){
		document.getElementById("Galdera").value="";
		document.getElementById("Erantzuna").value="";
		document.getElementById("Gaia").value="";
	}
	
	

	</script> 
  </head>
  <body>
	<header class='main' id='h1'>
		<span class="right"><a href='layout.html'>Hasiera orria</a> </span>
		<h2>Galderak gehitu</h2>
    </header><br>
	<div style="text-align:center;">
		<form id="galdera" name="galdera" method="post" action="" style="display:none;">
			Galdera (*)<br><textarea rows="3" cols="40" name="Galdera" id="Galdera"></textarea><br><br><br>
			Erantzuna (*)<br> <textarea rows="2" cols="40" name="Erantzuna" id="Erantzuna"></textarea><br><br><br>
			Gaia (*)<br> <textarea rows="2" cols="40" name="Gaia" id="Gaia"></textarea><br><br><br>
			Zailtasuna <select id="Zailtasuna" name="Zailtasuna" onchange="besteEsp()">
				<option value=""></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select><br><br>
			<input type="button" name="Bidali" value="Bidali" onClick="return galderaBerria(); garbitu();"></input><br>
		</form>
			<input type="button" id="txertatu" name="txertatu" value="Galdera txertatu" onClick="galderaTxertatu()"></input><br><br>
			<input type="button" name="ikusi" value="Sortutako galderak bistaratu" onClick="galderakBistaratu()"></input><br><br>
		
	</div>
	<div id="txtHint" style="text-align:center;"></div>
	<div id="txtHint2" style="text-align:center;"></div>
   </body>
  </html>
