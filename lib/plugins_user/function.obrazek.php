<?php

function smarty_function_obrazek($params, &$smarty){
	extract($params);

	$link='/img/'.substr($soubor,0,1).'/'.$soubor;
	$soubor=$_SERVER['DOCUMENT_ROOT'].'/img/'.substr($soubor,0,1).'/'.$soubor;
	if(!is_file($soubor)){
		$soubor=$_SERVER['DOCUMENT_ROOT'].'/img/m/missing.png';
		$link='/img/m/missing.png';
	}
	$rozmery=getimagesize($soubor);
	if(isset($absolute)){
		$abs='http://'.$_SERVER['SERVER_NAME'];
	}else{
		$abs='';
	};
	return ('<img src="'.$abs.$link.'" '.$rozmery[3].' title="'.$popisek.'" alt="'.$popisek.'" />');

}

?>
