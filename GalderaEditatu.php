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
		$galderak = $link -> query ("SELECT * FROM galdera WHERE GalderaZbkia='$_POST[GalderaZbkia]'");
		$row = mysqli_fetch_array($galderak);	
	}
	mysqli_close($link);
?>
<html>
<head><title>Galderak editatu</title>
</head>
<body>
<div align="center">
	<form id="editatu2" onSubmit="return false;" >
	  Galdera <input type='text' title='Galdera' name='Galdera' id='Galdera' value='<?php echo $row['Galdera'];?>' /> <br>
	  Erantzuna <input type='text' name='Erantzuna' id='Erantzuna' value="<?php echo $row['Erantzuna'];?>" /> <br>
	  Zailtasuna <input type='number' name='Zailtasuna' id='Zailtasuna' value="<?php echo $row['Zailtasuna'];?>" /><br>
	  Gaia <input type='text' name='Gaia' id='Gaia' value="<?php echo $row['Gaia'];?>" /><br/>	  
	  <input type='hidden' name='GalderaZbkia' id='GalderaZbkia' value="<?php echo $row['GalderaZbkia'];?>" />
	 <input type='button' name='gorde' id='gorde' value='Gorde'/> 
	 <div id="txtHint2"> </div>
	</form>
 </div>
</body>
</html> 