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
			$obrazek=split("\n",$obrazek);
			 if(count($obrazek==2) and isset($obrazek[1]) and strlen(trim($obrazek[1]))>0){
			$krok["obrazek"]=$obrazek[0].'.png';
			$krok["kotva"]=$obrazek[1];
				}else{
			$krok["obrazek"]=$obrazek[0].'.png';
			 }

			#$krok["obrazek"]=$obrazek.".png";

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
$vysledek[6] = iconv('iso-8859-2','utf8',$vysledek[1]);
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

# code from http://www.zend.com/zend/trick/html-email.php?article=html-email&kind=tr&id=634&open=1&anc=0&view=1
function quoted_printable_encode($sString) {
   /*instead of replace_callback i used e modifier for regex rule, which works as eval php function*/
   $sString = preg_replace( '/[^\x21-\x3C\x3E-\x7E\x09\x20]/e', 'sprintf( "=%02X", ord ( "$0" ) ) ;',  $sString);
   /*now added to this rule one or more chars which lets last line to be matched and included in results*/
   preg_match_all( '/.{1,73}([^=]{0,3})?/', $sString, $aMatch );

   return implode("=\r\n", $aMatch[0]);

}

function get_antispam(){
	$cislice=array("1"=>"jedna","2"=>"dva","3"=>"t�i","5"=>"p�t","7"=>"sedm","8"=>"osm","9"=>"dev�t");
	$znamenka=array("+"=>"plus","-"=>"m�nus","*"=>"kr�t");

	$prvni=array_rand($cislice);
	$druha=array_rand($cislice);
	$znamenko=array_rand($znamenka);

	$otazka=ucfirst($cislice[$prvni]." ".$znamenka[$znamenko]." ".$cislice[$druha]);
	eval("\$odpoved = $prvni $znamenko $druha;");

	return array($otazka,$odpoved);
}

function is_zs_account($login){
	if(in_array($login,get_loginy())){
		return true;
	}else{
		return false;
	}
}

function is_zs_email($email){
	$ucty=get_loginy();
	$navrat=false;
	foreach($ucty as $ucet){
		if(is_file(LIDE_DATA."/$ucet/$email.mail")){
			$navrat=true;
		}
	}
	return $navrat;
}

function email2login($email){
	$ucty=get_loginy();
	$navrat=false;
	foreach($ucty as $ucet){
		if(is_file(LIDE_DATA."/$ucet/$email.mail")){
			$navrat=$ucet;
		}
	}
	return $navrat;
}


function is_zs_jmeno($jmeno){
	$ucty=get_loginy();
	$navrat=false;
	foreach($ucty as $ucet){
		if(trim(array_pop(file(LIDE_DATA."/$ucet/jmeno.txt")))==$jmeno){
			$navrat=true;
		}
	}
	return $navrat;
}

function get_loginy(){
	$dir = opendir(LIDE_DATA);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!ereg("^\.",$filename) and is_dir(LIDE_DATA."/$filename")) {
				      array_push($navrat,$filename);
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
}

function get_user_props($login){
	if(is_dir(LIDE_DATA."/$login") and strlen($login)>0){
		$navrat=array();
		$navrat["login"]=$login;
		if(is_file(LIDE_DATA."/$login/jmeno.txt")){
			$navrat["jmeno"]=trim(array_pop(file(LIDE_DATA."/$login/jmeno.txt")));
		}

		if(is_file(LIDE_DATA."/$login/passwd.sha1")){
			$navrat["passwd_sha1"]=trim(array_pop(file(LIDE_DATA."/$login/passwd.sha1")));
		}

		if(is_file(LIDE_DATA."/$login/soukromi.txt")){
			$navrat["soukromi"]=trim(array_pop(file(LIDE_DATA."/$login/soukromi.txt")));
		}

		if(is_file(LIDE_DATA."/$login/vzkaz.txt")){
			$navrat["vzkaz"]=file_get_contents(LIDE_DATA."/$login/vzkaz.txt");
		}

		if(is_file(LIDE_DATA."/$login/registrace.txt")){
			$navrat["registrace"]=trim(array_pop(file(LIDE_DATA."/$login/registrace.txt")));
			$navrat["registrace_hr"]=date("j. n. Y",$navrat["registrace"]);
			$navrat["registrace_mr"]=date("c",$navrat["registrace"]);
		}

		if(is_file(LIDE_DATA."/$login/LOCKED")){
			$navrat["status"]="locked";
		}else{
			$navrat["status"]="ok";
		}

		$dir = opendir(LIDE_DATA."/$login");
				if ($dir) {
					 while (($filename = readdir($dir)) !== false) {
							if (ereg('\.mail$',$filename)) {
								$navrat["email"]=eregi_replace('\.mail$','',$filename);
						 }
					 }
				 }
		closedir($dir);
	
	}else{
		$navrat=false;
	}
return $navrat;
}

function is_logged(){
	$navrat=false;
	if(isset($_SESSION['logged']) and $_SESSION['logged']==true and $_SESSION['ip']==$_SERVER['REMOTE_ADDR']){
		$navrat=true;
	}
	return $navrat;
}

function make_keywords($text){
	$navrat=array();
	$text=preg_replace("/,/"," ",$text);
	$text=preg_replace("/-/"," ",$text);
	$text=strtolower(preg_replace("/  /"," ",$text));
	$text=preg_split("/ /",$text);
	foreach($text as $foo){
		if(strlen($foo)>=3){
			array_push($navrat,$foo);
		}
	}
	if(count($navrat)<2){
		array_push($navrat,"�onglov�n�","m��ky","kruhy","ku�ely");
	}

	$navrat=preg_replace("/ /",", ",join(" ",$navrat));
	return $navrat;
}

function get_changelog(){
	if(is_readable("ChangeLog")){
	$zmeny=array();
	$changelog=file_get_contents("ChangeLog");
	$changelog=preg_split("/------------------------------------------------------------------------/",$changelog);
	foreach($changelog as $foo){
		if(strlen(trim($foo))>0){
			array_push($zmeny,array('text'=>$foo));
		}
	}

	$pocet=count($zmeny);
	$bar=0;
	foreach($zmeny as $zmena){
		$foo=preg_split("/\n/",$zmena['text']);
		$zmeny[$bar]["description"]=$foo[3];
		$foo=preg_split("/ \| /",$foo[1]);
		$zmeny[$bar]["time_mr"]=date("c",strtotime(substr($foo[2],0,19)));
		$zmeny[$bar]["author"]=$foo[1];
		$zmeny[$bar]["revision"]=$pocet-$bar;
		$bar++;
	}
	return $zmeny;
}
}

function get_diskuse_zpravy(){
	$dir = opendir(DISKUSE_DATA);
	$navrat = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!ereg("^\.",$filename) and is_file(DISKUSE_DATA."/$filename")) {
							$foo=preg_split("/\./",$filename);
							$foo=preg_split("/-/",$foo[0]);
							$cas=$foo[0];
							$autor=$foo[1];
				      array_push($navrat,array('cas'=>$cas,'cas_mr'=>date('c',$cas),'cas_hr'=>date('G.i',$cas),'datum_hr'=>date('j. n. Y',$cas),'autor'=>$autor,'text'=>trim(file_get_contents(DISKUSE_DATA."/$filename"))));
					 }
			   }
		   }
	closedir($dir);
	usort($navrat, 'sort_by_time');
 return $navrat;
}

function sort_by_time($a, $b)
{
		return ($a['cas'] < $b['cas']) ? -1 : 1;
}

function get_nahled($trik){
	$nahled="";
	foreach($trik['kroky'] as $krok){
		if(strlen($nahled)==0 and isset($krok['obrazek'])){
			$nahled='http://'.$_SERVER['SERVER_NAME'].'/img/'.substr($krok['obrazek'],0,1).'/'.$krok['obrazek'];
		}
	}
	if(strlen($nahled)==0){
		$nahled='http://'.$_SERVER['SERVER_NAME'].'/img/n/nacinid.png';
	}
	return $nahled;
}

function get_description($trik){
	$popis="";
	if(isset($trik['kroky'][0]['popisek'])){
		$popis.=$trik['kroky'][0]['popisek'];
	}
#	if(isset($trik['kroky'][1]['popisek'])){
#		$popis.=' '.$trik['kroky'][1]['popisek'];
#	}
	return strip_tags($popis);
}

?>
