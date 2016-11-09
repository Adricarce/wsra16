<?php

require_once('lib/lib/nusoap.php');
require_once('lib/lib/class.wsdlcache.php');

$bezeroa = new nusoap_client('http://wsjiparsar.esy.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', false);

if (isset($_POST['email'])){
	if ($bezeroa->call('egiaztatuE',array('x'=>$_POST['email']))=='EZ'){
		echo 'EZ';
	}elseif ($bezeroa->call('egiaztatuE',array('x'=>$_POST['email']))=='BAI'){
		echo 'BAI';
	}else{
		echo 'Errorea.';
	}
}
?>