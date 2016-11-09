<?php

require_once('lib/lib/nusoap.php');
require_once('lib/lib/class.wsdlcache.php');

//$bezeroa = new nusoap_client('http://localhost:1234/myquizz-master/myquizz-master/myquizz-master/egiaztatuPasahitza.php?wdsl', false);
$bezeroa = new nusoap_client('http://ws16adri.esy.es/myquizz-master/egiaztatuPasahitza.php?wdsl', false);

if (isset($_POST['pasahitza'])){
	if ($bezeroa->call('egiaztatuPasahitza',array('x'=>$_POST['pasahitza']))=='BALIOGABEA'){
		echo 'BALIOGABEA';
	}elseif ($bezeroa->call('egiaztatuPasahitza',array('x'=>$_POST['pasahitza']))=='BALIOZKOA'){
		echo 'BALIOZKOA';
	}else{
		echo 'Errorea.';
	}
}
?>