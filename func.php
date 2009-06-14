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
			$krok["nadpis"]=$nadpis;
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
	# FIXME - nenajde elementy obsahuj�c� znak nov�ho ��dku
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

$trans = array("�" => "ez","�" => "sz","�" => "cz","�" => "rz","�" => "zz","�" => "yz","�" => "az","�" => "iz","�" => "ez","�" => "uz","�" => "uz","�" => "dz","�" => "tz","�" => "nz","�" => "Ez","�" => "Sz","�" => "Cz","�" => "Rz","�" => "Zz","�" => "Yz","�" => "Az","�" => "Iz","�" => "Ez","�" => "Uz","�" => "Uz","�" => "Dz","�" => "Tz","�" => "Nz"," " => "_z");

function mojes($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle n�zvu triku
  */
 global $trans;

  $a[1] = strtr($a[1], $trans);
  $b[1] = strtr($b[1], $trans);


  return strcmp($a[1], $b[1]);
};

function mojes2($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle po�tu m��k� a n�zvu triku
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
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle siteswaps
  */
 global $trans;

  $a[3] = strtr($a[3], $trans);
  $b[3] = strtr($b[3], $trans);


  return strcmp($a[3], $b[3]);
};

function mojes4($a, $b){
  /*
	mojes = moje + set��d�n�
	set��d� ��dky v tabulce podle obt��nosti
  */
global $trans;
$stupnice=array("snadn�","n�ro�n�","obt��n�","t�ko provediteln�","neprovediteln�");

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

?>
