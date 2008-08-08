<?php

require("trideni.inc");


function trik($show,$soubor,$title=""){
  /*
	Vykreslí jeden trik.
  */

$pocet=0;
		$info=info(basename($show));

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
		echo "\n<h2>".$krok["nadpis"]."</h2>\n";
	}

	if(isset($krok["popisek"]) or isset($krok["obrazek"])){
		echo "\n<p>\n";
		if(isset($krok["obrazek"])){echo img("/zonglovani/img/".$krok["obrazek"].".png",$titulek);$pocet++;};
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


function vypis_seznam($jake){
  /*
	Vypí¹e seznam trikù.
  */
  $ls="xml";
	$kde=explode("-",basename($jake,".php"));

  if(is_dir($ls) and opendir($ls)){
	$vypis=array();
	$adr=opendir($ls);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".xml")
		{
		  $file = substr($file, 0, -4);
		  array_push($vypis,info($file));
		};
	};
	closedir($adr); 
	sort($vypis);
     
	
  };

  usort($vypis, "mojes"); 

  echo "\n<p>\n

<ul>
";
  foreach ($vypis as $soubor){
	if(($soubor[5].".php")==basename($jake)){
		$alias=str_replace(basename($jake,".php")."-","",$soubor[0]);
	  echo "<li><a href=\"/zonglovani/".$kde[0]."/".$kde[1]."/".$alias.".html\" title=\"".$soubor[4]."\">".$soubor[1]."</a></li>\n";
	};
  };
  echo "\n</ul>\n</p>\n";
  
};

function get_news(){
	$newsdir="news";
	$now=time();

	if(is_dir($newsdir) and opendir($newsdir)){
	$vypis=array();
	$adr=opendir($newsdir);
	while (false!==($file = readdir($adr))) {
		if(ereg("^[0-9]{8}\.[0-9]{4}\-[0-9]{8}\.[0-9]{4}\.txt$",$file)){
			$zrok=substr($file,14,4);
			$zmesic=substr($file,18,2);
			$zden=substr($file,20,2);
			$zhod=substr($file,23,2);
			$zmin=substr($file,25,2);

			$krok=substr($file,0,4);
			$kmesic=substr($file,4,2);
			$kden=substr($file,6,2);
			$khod=substr($file,9,2);
			$kmin=substr($file,11,2);

			$zacatek=strtotime("$zrok/$zmesic/$zden $zhod:$zmin:00");
			$konec=strtotime("$krok/$kmesic/$kden $khod:$kmin:00");
			if($now>$zacatek and $now<$konec){
				$vypis["$konec$zacatek"]=file_get_contents("$newsdir/$file");
			}
		}
		};
	};
	sort($vypis);
	return $vypis;
}


?>
