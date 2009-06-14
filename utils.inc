<?php

require("trideni.inc");


function trik($show,$soubor,$title=""){
  /*
	Vykreslí jeden trik.
  */

$pocet=0;
		$info=nacti_trik_info(basename($show));

		$titulek=$info[1];

	  hlavicka($title." - ".$titulek);
		require("titulek.inc");
		titulek($soubor);
	  
	  echo "<div id=\"stranka\">\n<div id=\"ramecek\">\n<div id=\"obsah\">\n<h1>".$titulek."</h1>\n";
$kroky=array();
$db = file_get_contents("xml/".basename($show).".xml");
$db=split("<krok",$db);
unset ($db[0]);
foreach($db as $foo){
	unset($krok);
	$krok=array();
	$foo=split("</krok>",$foo);
	$foo=split("\n",$foo[0]);
	
	$nadpis=najdi("nadpis",$foo);
	if($nadpis){
		$krok["nadpis"]=$nadpis;
	}

	$obrazek=najdi("obrazek",$foo);
	if($obrazek){
		$krok["obrazek"]=$obrazek;
	}
	$popisek=najdi("popisek",$foo);
	if($popisek){
		$krok["popisek"]=$popisek;
	}
	array_push($kroky,$krok);
}

foreach($kroky as $krok){
	if(isset($krok["nadpis"])){
		$nadpis=split("\n",$krok["nadpis"]);
		if(count($nadpis==2) and isset($nadpis[1]) and strlen(trim($nadpis[1]))>0){
			echo "\n<a name=\"".$nadpis[1]."\"></a><h2>".$nadpis[0]."</h2>\n";
		}else{
			echo "\n<h2>".$krok["nadpis"]."</h2>\n";
		}
	}

	if(isset($krok["popisek"]) or isset($krok["obrazek"])){
		echo "\n<p>\n";
		if(isset($krok["obrazek"])){echo img("".$krok["obrazek"].".png",$titulek);$pocet++;};
		if(isset($krok["popisek"])){echo html_entity_decode($krok["popisek"]);};
		echo "\n<p>\n";
	}
}

if($pocet>3){
	echo "<a href=\"#nahore\" title=\"Pøesun na zaèátek stránky.\" class=\"nahoru\">nahoru&nbsp;^^</a>";
};

echo "</div><div id=\"menu\">";

require("menu.inc");
menu($soubor);
echo "</div>";



echo "</div>
<div class=\"spacer\"></div>
</div>
";

require("paticka.inc");
paticka($titulek);
};




function indexhlavicka($titulek,$popis="",$slova=""){
  /*	
		Vypisuje hlavièku stránky.
  */

if(strlen($popis)==0){
	$popis=$titulek;
}

if(strlen($slova)==0){
	$slova=strtolower($titulek);
	$slova=explode(" ",$slova);
	$foo="";
	foreach($slova as $slovo){
		if(strlen($slovo)>2){
			$foo.=$slovo.",";
		}
	}
	if(strlen($foo)==0){
		$slova=$titulek;
	}else{
		$slova=substr($foo,0,-1);
	}
}

return "<?xml version=\"1.0\" encoding=\"iso-8859-2\"?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"cs\" lang=\"cs\">
<head>
	<meta http-equiv=\"content-type\" content=\"text/html; charset=iso-8859-2\" />
	<title>".$titulek."</title>
	<meta name=\"description\" content=\"$popis\" />
	<meta name=\"keywords\" content=\"$slova\" />
	<style type=\"text/css\" media=\"screen\">@import url(/zonglovani.css);</style>
	<link rel=\"shortcut icon\" href=\"/favicon.ico\">
</head>
<body>

<div id=\"hlavicka\">
<h1>".$titulek."</h1>
</div>
<div id=\"stranka\">\n<div id=\"ramecek\">\n
<div id=\"obsah\">
";

};

function indexpaticka($soubor,$titulek,$titulek2=""){
require("pocitadlo.inc");
$soubor=basename($soubor);

if(strlen($titulek2)==0){
	$titulek2=$titulek;
}

$navrat="<p class=\"spacer\">&nbsp;</p><!-- obsah konec -->";

if(strlen($titulek)!=0){
$navrat.="
<p class=\"navline\"><strong>Jste zde:</strong> <a href=\"/\" title=\"Úvodní stránka.\">http://petrkle.wz.cz</a> &raquo; $titulek2</p>
";
}

$navrat.="</div><div id=\"paticka\"><p>";

if($soubor=="index.php"){$navrat.="<strong>Úvodní stránka</strong>";}else{$navrat.="<a href=\"/\" title=\"Úvodní stránka\">Úvodní stránka</a>";}
$navrat.=" ~ ";
if($soubor=="mapa-stranek.php"){$navrat.="<strong>Mapa stránek</strong>";}else{$navrat.="<a href=\"/mapa-stranek.html\" title=\"Mapa stránek petrkle.wz.cz\">Mapa stránek</a>";}
$navrat.=" ~ ";
if($soubor=="kontakt.php"){$navrat.="<strong>Kontakt</strong>";}else{$navrat.="<a href=\"/kontakt.html\" title=\"Kontakt\">Kontakt</a>";}
$navrat.=" ~ ";
if($soubor=="pristupnost.php"){$navrat.="<strong>Prohlá¹ení o pøístupnosti</strong>";}else{$navrat.="<a href=\"/pristupnost.html\" title=\"Prohlá¹ení o pøístupnosti.\">Prohlá¹ení o pøístupnosti</a>";}


$navrat.="</p><div><p>&nbsp;</p>";


return $navrat.pocitadlo();
};

?>
