<?php

function nacti_trik($soubor){
	$trik["info"]=nacti_trik_info(basename($soubor));

	$kroky=array();
	$db = file_get_contents("xml/".basename($soubor).".xml");
	$db=split("<krok",$db);
	unset ($db[0]);
	foreach($db as $foo){
		unset($krok);
		$krok=array();
		$foo=split("</krok>",$foo);
		$foo=split("\n",$foo[0]);
		
		$nadpis=najdi("nadpis",$foo);
		if($nadpis){
			$nadpis=split("\n",$nadpis);
			 if(count($nadpis==2) and isset($nadpis[1]) and strlen(trim($nadpis[1]))>0){
			$krok["nadpis"]=$nadpis[0];
			$krok["kotva"]=$nadpis[1];
				}else{
			$krok["nadpis"]=$nadpis[0];
			 }

		}

		$obrazek=najdi("obrazek",$foo);
		if($obrazek){
			$krok["obrazek"]=$obrazek.".png";
		}
		$popisek=najdi("popisek",$foo);
		if($popisek){
			$krok["popisek"]=html_entity_decode($popisek);
		}
		array_push($kroky,$krok);
	}

	$trik["kroky"]=$kroky;
	return $trik;
}


function najdi($co,$kde){
	# FIXME - nenajde elementy obsahující znak nového øádku
	foreach($kde as $radek){
		if(ereg(".*<$co.[^>].*</$co>.*",$radek)){
			if(ereg(".*<$co name=\".*>.*</$co>.*",$radek)){
				return stripslashes(ereg_replace(".*<$co name=\"(.*)\".*>(.*)</$co>.*","\\2\n\\1",$radek));
			}else{
				return stripslashes(ereg_replace(".*<$co.*>(.*)</$co>.*","\\1",$radek));
			}
		}
	}
	return false;
}

function nacti_trik_info($soubor){

$db = file("xml/".$soubor.".xml");
$vysledek = array();
$url=explode("-",$soubor);
unset($url[0],$url[1]);
$url=join("-",$url);

$vysledek[0] = $soubor;
$vysledek[1] = najdi("nazev",$db);
$vysledek[2] = $url.".html";
$vysledek[5] = najdi("oblast",$db);
$vysledek[4] = najdi("obtiznost",$db);
 return $vysledek;
};

function get_seznam_triku($jake){
  $ls="xml";
  if(is_dir($ls) and opendir($ls)){
	$vypis=array();
	$adr=opendir($ls);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".xml" and ereg(basename($jake,".php"),$file))
		{
		  $file = substr($file, 0, -4);
		  array_push($vypis,nacti_trik_info($file));
		};
	};
	closedir($adr); 
	sort($vypis);
  };

  usort($vypis, "mojes"); 
	return $vypis;
}

$trans = array("ì" => "ez","¹" => "sz","è" => "cz","ø" => "rz","¾" => "zz","ý" => "yz","á" => "az","í" => "iz","é" => "ez","ú" => "uz","ù" => "uz","ï" => "dz","»" => "tz","ò" => "nz","Ì" => "Ez","©" => "Sz","È" => "Cz","Ø" => "Rz","®" => "Zz","Ý" => "Yz","Á" => "Az","Í" => "Iz","É" => "Ez","Ú" => "Uz","Ù" => "Uz","Ï" => "Dz","«" => "Tz","Ò" => "Nz"," " => "_z");

function mojes($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle názvu triku
  */
 global $trans;

  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);


  return strcmp($a[1], $b[1]);
};

function mojes2($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle poètu míèkù a názvu triku
  */
 global $trans;

  $a[2] = strtr($a[2], $trans);
  $b[2] = strtr($b[2], $trans);

 $navrat = strcmp($a[2],$b[2]);
  if(!$navrat){
  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);
	$navrat=strcmp($a[1],$b[1]);
	};
return $navrat;
}

function mojes3($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle siteswaps
  */
 global $trans;

  $a[3] = strtr($a[3], $trans);
  $b[3] = strtr($b[3], $trans);


  return strcmp($a[3], $b[3]);
};

function mojes4($a, $b){
  /*
	mojes = moje + setøídìní
	setøídí øádky v tabulce podle obtí¾nosti
  */
global $trans;
$stupnice=array("snadné","nároèné","obtí¾né","tì¾ko proveditelné","neproveditelné");

	$foo = array_search($a[4],$stupnice);
  $bar = array_search($b[4],$stupnice);

  $navrat=strcmp($foo,$bar);

	if($navrat==0){
  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);
	$navrat=strcmp($a[1],$b[1]);
	};

return $navrat;
};

function get_videa($db){
	$allvideos=file("$db");
	$navrat=array();

	foreach($allvideos as $video){
		$video=explode("*",$video);
		$id=$video[0];
		$url=$video[1];
		$title=$video[2];
		$description=$video[3];
		if(ereg("^http://www\.youtube\.com/watch\?v=",$url) or ereg("^http://juggling\.tv:",$url)){
			$link=$url;	
			$url="$id.html";	
			$druh="flash";

			if(ereg("^http://juggling\.tv:",$link)){
				$fid=explode(".tv:",$link);
				$fid=$fid[1];
				$server="juggling.tv";
			}else{
				$fid=explode("watch?v=",$link);
				$fid=$fid[1];
				$server="youtube.com";
			}

		}else{
			$druh="file";
			$fid="";
			$server="";
		}
		array_push($navrat,array("id"=>$id,"url"=>$url,"title"=>$title,"desc"=>$description,"druh"=>$druh,"fid"=>$fid,"server"=>$server));
	}

	return $navrat;
}

function get_video_info($videa,$id){
	$navrat=false;
	foreach($videa as $video){
		if($video["id"]==$id){
			$navrat=$video;
		}
	}
	return $navrat;
}

# code from http://www.zend.com/zend/trick/html-email.php?article=html-email&kind=tr&id=634&open=1&anc=0&view=1
function quoted_printable_encode($sString) {
   /*instead of replace_callback i used e modifier for regex rule, which works as eval php function*/
   $sString = preg_replace( '/[^\x21-\x3C\x3E-\x7E\x09\x20]/e', 'sprintf( "=%02X", ord ( "$0" ) ) ;',  $sString);
   /*now added to this rule one or more chars which lets last line to be matched and included in results*/
   preg_match_all( '/.{1,73}([^=]{0,3})?/', $sString, $aMatch );

   return implode("=\r\n", $aMatch[0]);

}

?>
