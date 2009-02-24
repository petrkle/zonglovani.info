<?php


function najdi($co,$kde){
	# FIXME - nenajde elementy obsahující znak nového øádku
	foreach($kde as $radek){
		if(ereg(".*<$co.[^>].*</$co>.*",$radek)){
			return stripslashes(ereg_replace(".*<$co.*>(.*)</$co>.*","\\1",$radek));
		}
	}
	return false;
}

function info($soubor)
{

$db = file("xml/".$soubor.".xml");
$vysledek = array();

$vysledek[0] = $soubor;

$vysledek[1] = najdi("nazev",$db);
$vysledek[5] = najdi("oblast",$db);
$vysledek[4] = najdi("obtiznost",$db);
 return $vysledek;
};

?>
