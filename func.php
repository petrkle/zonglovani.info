<?php

function nacti_trik($soubor){
	$xml = simplexml_load_file('xml/'.basename($soubor).'.xml');
	$trik=array();
	$trik['kroky'] = array();
	$trik['about'] = (array) $xml->about;
	foreach ($xml->krok as $krok){
		$foo=array();
		if($krok->popisek){
			$foo['popisek'] = (string) $krok->popisek;
		}
		if($krok->obrazek){
			$foo['obrazek'] = (string) $krok->obrazek.'.png';
		}
		if($krok->nadpis){
			$foo['nadpis'] = (string) $krok->nadpis;
			if($krok->nadpis['name']){
				$foo['kotva'] = (string) $krok->nadpis['name'];
			}
		}
		array_push($trik['kroky'],$foo);
	}
	return $trik;
}

function get_seznam_triku($jake){
  $ls="xml";
  if(is_dir($ls) and opendir($ls)){
	$vypis=array();
	$adr=opendir($ls);
	while (false!==($file = readdir($adr))) {
	  if (substr($file,-4) == ".xml" and ereg(basename($jake,'.php'),$file))
		{
		  $file = substr($file, 0, -4);
		  $vypis[preg_replace('/'.basename($jake,'.php').'-/','',basename($file,'.xml'))]=nacti_trik($file);
		};
	};
	closedir($adr); 
  };

  uasort($vypis, 'sort_by_title'); 
	return $vypis;
}

$trans = array("ě" => "ez","š" => "sz","č" => "cz","ř" => "rz","ž" => "zz","ý" => "yz","á" => "az","í" => "iz","é" => "ez","ú" => "uz","ů" => "uz","ď" => "dz","ť" => "tz","ň" => "nz","Ě" => "Ez","Š" => "Sz","Č" => "Cz","Ř" => "Rz","Ž" => "Zz","Ý" => "Yz","Á" => "Az","Í" => "Iz","É" => "Ez","Ú" => "Uz","Ů" => "Uz","Ď" => "Dz","Ť" => "Tz","Ň" => "Nz"," " => "_z");

function sort_by_title($a, $b){
  /*
	mojes = moje + setřídění
	setřídí řádky v tabulce podle názvu triku
  */
 global $trans;

  $a['about']['nazev'] = strtr($a['about']['nazev'], $trans);
  $b['about']['nazev'] = strtr($b['about']['nazev'], $trans);


  return strcmp($a['about']['nazev'], $b['about']['nazev']);
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
	$cislice=array("1"=>"jedna","2"=>"dva","3"=>"tři","5"=>"pět","7"=>"sedm","8"=>"osm","9"=>"devět");
	$znamenka=array("+"=>"plus","-"=>"mínus","*"=>"krát");

	$prvni=array_rand($cislice);
	$druha=array_rand($cislice);
	$znamenko=array_rand($znamenka);

	$otazka=ucfirst($cislice[$prvni]." ".$znamenka[$znamenko]." ".$cislice[$druha]);
	eval("\$odpoved = $prvni $znamenko $druha;");

	return array($otazka,$odpoved);
}

function is_zs_account($login){
	$dir = opendir(LIDE_DATA);
	$loginy = array();
	    if ($dir) {
			   while (($filename = readdir($dir)) !== false) {
						if (!preg_match('/^\./',$filename) and is_dir(LIDE_DATA.'/'.$filename)) {
				      array_push($loginy,$filename);
					 }
			   }
		   }
	closedir($dir);
	if(in_array($login,$loginy)){
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
						if (!preg_match('/^\./',$filename) and is_dir(LIDE_DATA.'/'.$filename) and !is_file(LIDE_DATA.'/'.$filename.'/LOCKED') and !is_file(LIDE_DATA.'/'.$filename.'/REVOKED') and $filename!='pek') {
				      array_push($navrat,$filename);
					 }
			   }
		   }
	closedir($dir);
	sort($navrat);
 return $navrat;
}

function get_user_dovednosti($login){
		$navrat=array();
		if(is_file(LIDE_DATA.'/'.$login.'/dovednosti.txt')){
			$dov=file(LIDE_DATA.'/'.$login.'/dovednosti.txt');
		}else{
			$dov=false;
		}
		if(is_array($dov)){
			foreach($dov as $foo){
				$foo=preg_split('/:/',trim($foo));
				$navrat[$foo[0]]=$foo[1];
			}
		}
		if(count($navrat)==0){
			$navrat=false;
		}
		return $navrat;
}

function get_user_pusobiste($login){
		$navrat=array();
		if(is_file(LIDE_DATA.'/'.$login.'/pusobiste.txt')){
			$pus=file(LIDE_DATA.'/'.$login.'/pusobiste.txt');
		}else{
			$pus=false;
		}
		if(is_array($pus)){
			foreach($pus as $klic=>$hodnota){
				$hodnota=trim($hodnota);
				array_push($navrat,$hodnota);
			}
		}
		if(count($navrat)==0){
			$navrat=false;
		}
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

		if(is_file(LIDE_DATA."/$login/web.txt")){
			$navrat['web']=trim(file_get_contents(LIDE_DATA."/$login/web.txt"));
		}

		if(is_file(LIDE_DATA."/$login/registrace.txt")){
			$navrat["registrace"]=trim(array_pop(file(LIDE_DATA."/$login/registrace.txt")));
			$navrat["registrace_hr"]=date("j. n. Y",$navrat["registrace"]);
			$navrat["registrace_mr"]=date("c",$navrat["registrace"]);
		}

		if(is_file(LIDE_DATA.'/'.$login.'/foto.jpg')){
			$obrazekinfo=getimagesize(LIDE_DATA.'/'.$login.'/foto.jpg');
			$navrat['foto']=LIDE_URL.'foto/'.$login.'.jpg';
			$navrat['foto_sirka']=$obrazekinfo[0];
			$navrat['foto_vyska']=$obrazekinfo[1];
		}

		if(is_file(LIDE_DATA.'/'.$login.'/LOCKED')){
			$navrat['status']='locked';
		}elseif(is_file(LIDE_DATA.'/'.$login.'/REVOKED')){
			$navrat['status']='revoked';
		}else{
			$navrat['status']='ok';
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
		array_push($navrat,"žonglování","míčky","kruhy","kužely");
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
