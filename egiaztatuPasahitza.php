<?php

require_once('lib/lib/nusoap.php');
require_once('lib/lib/class.wsdlcache.php');

//$ns="http://localhost:1234/myquizz-master/myquizz-master/myquizz-master/";
$ns="http://ws16adri.esy.es/myquizz-master/"; 
$server = new soap_server;
$server->configureWSDL('egiaztatuPasahitza',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('egiaztatuPasahitza', array('x'=>'xsd:string'), array('z'=>'xsd:string'),$ns);

function egiaztatuPasahitza($x){
	$fitx= fopen("toppasswords.txt","r");
	if($fitx){
		while(($buffer= fgets($fitx))!==false){
			$ir=trim(utf8_encode($buffer));
			if($x==$ir){
				return "BALIOGABEA";
			}
		}
		if(!feof($fitx)){
			echo "Errorea";			
		}else{
			return "BALIOZKOA";
		}
		$fclose($fitx);
	}else{
		echo "Errorea fitxategia irekitzerakoan.";
	}
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);

?>