<?php

if(eregi("index\.php\?znameni",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER["HTTP_HOST"].ereg_replace("index\.php\?znameni=(.*)$","\\1.html",$_SERVER["REQUEST_URI"]));
	exit();
}

if(eregi("horoskop-zitra\.php\?znameni",$_SERVER["REQUEST_URI"])){
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://".$_SERVER["HTTP_HOST"].ereg_replace("horoskop-zitra\.php\?znameni=(.*)$","zitra/\\1.html",$_SERVER["REQUEST_URI"]));
	exit();
}

function filtr($znameni,$zverokruh){
	$hodnoty=array();
	foreach($zverokruh as $key => $value) {
		array_push($hodnoty,$key);
	};
	if(!in_array($znameni,$hodnoty)){$znameni=$hodnoty[0];};
return $znameni;
};


function menu($soubor,$akt){
global $zverokruh;
$navrat="<div id=\"menu\"><ul>\n";

foreach ($zverokruh as $key => $value) {
  if($key==$akt)
	{
	  $navrat.="<li class=\"akt\"><strong>".$value["popis"]."</strong></li>\n";
	}else{
	  $navrat.="<li><a href=\"/horoskop/".$soubor.$key.".html\" title=\"".$value["od_den"].". ".$value["od_mesic"].". - ".$value["do_den"].". ".$value["do_mesic"]."\">".$value["popis"]."</a></li>\n";
	};
};

$navrat.="</ul></div>\n";
return $navrat;

};
function my_rand_ini($znameni,$time){
/*
	vrací pseudo náhodný řetězec čísel
	závislé na aktuálním datu a zamení zvěrokruhu
*/
	global $zverokruh;

	$now=$time;
	$out="";
	$out.=abs(crc32(date("Yj",$now).$zverokruh[$znameni]["popis"]));
	for($foo=0;$foo<20;$foo++){
		$out.=abs(crc32($out));
	};
	$navrat=array();
	for($foo=0;$foo<strlen($out);$foo++){
		array_push($navrat,substr($out,$foo,1));
	};
	return $navrat;
};

function prvni_velke($text){
	$prvni=substr($text,0,1);
	$zbytek=substr($text,1);
	$prvni=strtr($prvni,"abcdefghijklmnopqrstuvwxyz", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");
	$prvni=strtr($prvni,"ěščřžýáíéňďťúů", "ĚŠČŘŽÝÁÍÉŇĎŤÚŮ");
	$navrat=$prvni.$zbytek;
	return $navrat;
};

function prvni_male($text){
	$prvni=substr($text,0,1);
	$zbytek=substr($text,1);
	$prvni=strtr($prvni,"ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz");
	$prvni=strtr($prvni,"ĚŠČŘŽÝÁÍÉŇĎŤÚŮ", "ěščřžýáíéňďťúů");
	$navrat=$prvni.$zbytek;
	return $navrat;
};

function my_rand($min,$max){
global $nahoda;
$pole=array();

for($foo=$min;$foo<=$max;$foo++){
	array_push($pole,$foo);
};

$cislo=array_pop($nahoda);

$kolikrat=$cislo;

$baz=0;

do{
	$navrat=$pole[$baz];
	$baz++;
	if($baz==count($pole)){$baz=0;};
	$kolikrat--;
	}while($kolikrat>=0);

return $navrat;
};

function sestav_vetu($cislo){
	global $vety;
	$navrat="";

	for($foo=0;$foo<sizeof($vety[$cislo]);$foo++){
		$bar=my_rand(0,sizeof($vety[$cislo][$foo])-1);
		$navrat.=$vety[$cislo][$foo][$bar]." ";
	};

	$navrat=prvni_velke(trim($navrat)).".";
	return $navrat;
	};



function predpoved($znameni,$time){
global $zverokruh,$vety;

$GLOBALS["nahoda"]=my_rand_ini($znameni,$time);

$cisla=array();


while(count($cisla)<=4){
$cislo=my_rand(0,(count($vety)-1));
if(!in_array($cislo,$cisla)){
array_push($cisla,$cislo);
};
};


$navrat="";
for($foo=0;$foo<(sizeof($cisla)-1);$foo++){
	$navrat.=prvni_velke(sestav_vetu($cisla[$foo]))." ";
};	

$navrat=substr($navrat,0,-1);

return $navrat;
};



?>
