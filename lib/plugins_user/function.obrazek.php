<?php

function smarty_function_obrazek($params, &$smarty){
	extract($params);

	$link="/img/".substr($soubor,0,1)."/$soubor";
	$soubor=$_SERVER["DOCUMENT_ROOT"]."/img/".substr($soubor,0,1)."/$soubor";
	if(!is_file($soubor)){
		$soubor="/img/m/missing.png";
	}
	$rozmery=getimagesize($soubor);
	return ("<img src=\"".$link."\" ".$rozmery[3]." title=\"".$popisek."\" alt=\"".$popisek."\" />");

}

?>
