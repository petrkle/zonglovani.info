<?php

function nacti_trik($soubor){
	$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/xml/'.basename($soubor).'.xml');
	$trik=array();
	$trik['kroky'] = array();
	$trik['about'] = (array) $xml->about;
	foreach ($xml->krok as $krok){
		$foo=array();
		if($krok->popisek){
			$foo['popisek'] = (string) $krok->popisek;
		}
		if($krok->pre){
			$foo['pre'] = (string) $krok->pre;
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
  $ls=$_SERVER['DOCUMENT_ROOT'].'/xml';
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

$trans = array('ě' => 'ez','š' => 'sz','č' => 'cz','ř' => 'rz','ž' => 'zz','ý' => 'yz','á' => 'az','í' => 'iz','é' => 'ez','ú' => 'uz','ů' => 'uz','ď' => 'dz','ť' => 'tz','ň' => 'nz','Ě' => 'Ez','Š' => 'Sz','Č' => 'Cz','Ř' => 'Rz','Ž' => 'Zz','Ý' => 'Yz','Á' => 'Az','Í' => 'Iz','É' => 'Ez','Ú' => 'Uz','Ů' => 'Uz','Ď' => 'Dz','Ť' => 'Tz','Ň' => 'Nz',' ' => '_z');

function sort_by_title($a, $b){
	global $trans;
  $a['about']['nazev'] = strtr($a['about']['nazev'], $trans);
  $b['about']['nazev'] = strtr($b['about']['nazev'], $trans);
  return strcmp($a['about']['nazev'], $b['about']['nazev']);
};

function sort_by_jmeno($a, $b){
	global $trans;
	$a['jmeno']=strtr($a['jmeno'],$trans);	
	$b['jmeno']=strtr($b['jmeno'],$trans);	
	return strcmp($a['jmeno'],$b['jmeno']);
}


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

			if(ereg('^http://juggling\.tv:',$link)){
				$fid=explode('.tv:',$link);
				$fid=$fid[1];
				$server='juggling.tv';
			}else{
				$fid=explode('watch?v=',$link);
				$fid=$fid[1];
				$server='youtube.com';
			}

		}else{
			$druh='file';
			$fid='';
			$server='';
		}
		array_push($navrat,array('id'=>$id,'url'=>$url,'title'=>$title,'desc'=>$description,'druh'=>$druh,'fid'=>$fid,'server'=>$server));
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

function get_antispam(){
	$cislice=array('1'=>'jedna','2'=>'dva','3'=>'tři','5'=>'pět','7'=>'sedm','8'=>'osm','9'=>'devět');
	$znamenka=array('+'=>'plus','-'=>'mínus','*'=>'krát');

	$prvni=array_rand($cislice);
	$druha=array_rand($cislice);
	$znamenko=array_rand($znamenka);

	$otazka=ucfirst($cislice[$prvni].' '.$znamenka[$znamenko].' '.$cislice[$druha]);
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
		if(is_file(LIDE_DATA.'/'.$ucet.'/'.$email.'.mail')){
			$navrat=true;
		}
	}
	return $navrat;
}

function email2login($email){
	$ucty=get_loginy();
	$navrat=false;
	foreach($ucty as $ucet){
		if(is_file(LIDE_DATA.'/'.$ucet.'/'.$email.'.mail')){
			$navrat=$ucet;
		}
	}
	return $navrat;
}


function is_zs_jmeno($jmeno){
	$ucty=get_loginy();
	$navrat=false;
	foreach($ucty as $ucet){
		if(trim(array_pop(file(LIDE_DATA.'/'.$ucet.'/jmeno.txt')))==$jmeno){
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
		$navrat['login']=$login;
		if(is_file(LIDE_DATA.'/'.$login.'/jmeno.txt')){
			$navrat['jmeno']=trim(array_pop(file(LIDE_DATA.'/'.$login.'/jmeno.txt')));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/passwd.sha1')){
			$navrat['passwd_sha1']=trim(array_pop(file(LIDE_DATA.'/'.$login.'/passwd.sha1')));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/soukromi.txt')){
			$navrat['soukromi']=trim(array_pop(file(LIDE_DATA.'/'.$login.'/soukromi.txt')));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/vzkaz.txt')){
			$navrat['vzkaz']=file_get_contents(LIDE_DATA.'/'.$login.'/vzkaz.txt');
		}

		if(is_file(LIDE_DATA.'/'.$login.'/web.txt')){
			$navrat['web']=trim(file_get_contents(LIDE_DATA.'/'.$login.'/web.txt'));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/tel.txt')){
			$navrat['tel']=trim(file_get_contents(LIDE_DATA.'/'.$login.'/tel.txt'));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/znameni.txt')){
			$navrat['znameni']=trim(file_get_contents(LIDE_DATA.'/'.$login.'/znameni.txt'));
		}

		if(is_file(LIDE_DATA.'/'.$login.'/registrace.txt')){
			$navrat['registrace']=trim(array_pop(file(LIDE_DATA.'/'.$login.'/registrace.txt')));
			$navrat['registrace_hr']=date('j. n. Y',$navrat['registrace']);
			$navrat['registrace_mr']=date('c',$navrat['registrace']);
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

		$dir = opendir(LIDE_DATA.'/'.$login);
				if ($dir) {
					 while (($filename = readdir($dir)) !== false) {
							if (ereg('\.mail$',$filename)) {
								$navrat['email']=eregi_replace('\.mail$','',$filename);
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
	$text=preg_replace('/,/',' ',$text);
	$text=preg_replace('/-/',' ',$text);
	$text=strtolower(preg_replace('/  /',' ',$text));
	$text=preg_split('/ /',$text);
	foreach($text as $foo){
		if(strlen($foo)>=3){
			array_push($navrat,$foo);
		}
	}
	if(count($navrat)<2){
		array_push($navrat,'žonglování','míčky','kruhy','kužely');
	}

	$navrat=preg_replace('/ /',', ',join(' ',$navrat));
	return $navrat;
}

function get_changelog($rss=false){
	if(is_readable($_SERVER['DOCUMENT_ROOT'].'/ChangeLog.xml')){

$zmeny=array();
$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/ChangeLog.xml');
	foreach ($xml->logentry as $verze){
			$foo=array();
			$foo['cislo']= (string) $verze['revision'];
			$foo['autor']= (string) $verze->author;
			$datum =(string) $verze->date; $datum=preg_split('/\./',$datum);
			$foo['datum'] = $datum[0]; 
			$foo['datum_hr'] = date('j. n. Y G.i',strtotime($datum[0])); 
			$foo['time_mr']=date("c",strtotime($datum[0]));
			$foo['popis']= (string) $verze->msg;
			$link=(string) $verze->revprops->property;
			if(strlen($link)>0){
				$foo['link']=$link;
			}else{
				if($rss){
					$foo['link']='/changelog.html#'.$foo['cislo'];
				}
			}
			if(strlen($foo['autor'])>0){
				if($rss){
					if(strlen($foo['link'])>0){
						array_push($zmeny,$foo);
					}
				}else{
					array_push($zmeny,$foo);
				}
			}
	}

	return $zmeny;
}
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

function get_tipy(){
	$navrat=array();
	if(is_file(TIPY_DATA)){
		$db=file(TIPY_DATA);
		foreach($db as $radek){
			if(!preg_match('/^.*\#/',$radek) and preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}\*.+\*.+\*.+\*.+$/',$radek)){
				$radek=preg_split('/\*/',trim($radek));
				$cas=strtotime($radek[0])+(5*3600);
				if($cas<time()){
					array_push($navrat,array('cas'=>$cas,'cas_mr'=>date('c',$cas),'cas_imgrss'=>date('r',$cas),'cas_hr'=>date('j. n. Y',$cas),'nadpis'=>$radek[1],'link'=>$radek[2],'obrazek'=>$radek[3],'text'=>$radek[4]));
				}
			}
		}
	}
return $navrat;
}

class Trail
{
		var $path = array();

		function Trail($includeHome = true, $homeLabel = 'Žonglování', $homeLink = '/')
		{
				if ($includeHome)
						$this->addStep($homeLabel, $homeLink);
		}

		function addStep($title, $link = '')
		{
				$item = array('title' => $title);
				if (strlen($link) > 0)
						$item['link'] = $link;
				$this->path[] = $item;
		}
}

function get_user_complete($login){
	$navrat=get_user_props($login);
	$navrat['dovednosti']=get_user_dovednosti($login);
	$navrat['pusobiste']=get_user_pusobiste($login);
	$navrat['oblibene']=get_oblibene($login);
	$navrat['hodnoceni']=get_hodnoceni_uzivatel($login);
	return $navrat;
}

function get_oblibene($login){
	$navrat=array();
	if(is_readable(LIDE_DATA.'/'.$login.'/oblibene.txt')){
		$obl=file(LIDE_DATA.'/'.$login.'/oblibene.txt');
		if(count($obl)>0){
			foreach($obl as $line){
				$line=trim($line);
				$line=preg_split('/\*/',$line);
				$navrat[$line[0]]=$line[1];
			}
		}else{
			$navrat=false;
		}
	}else{
		$navrat=false;
	}
	return $navrat;
}

function set_oblibene($login,$oblibene){
	if(is_array($oblibene) and count($oblibene)>0){
		$foo=fopen(LIDE_DATA.'/'.$login.'/oblibene.txt','w');
		foreach($oblibene as $url=>$title){
			fwrite($foo,$url.'*'.$title."\n");
		}
		fclose($foo);
	}else{
		if(is_file(LIDE_DATA.'/'.$login.'/oblibene.txt')){
			unlink(LIDE_DATA.'/'.$login.'/oblibene.txt');
		}
	}
}

function get_hodnoceni_uzivatel($login){
	$navrat=array();
	if(is_readable(LIDE_DATA.'/'.$login.'/hodnoceni.txt')){
		$hod=file(LIDE_DATA.'/'.$login.'/hodnoceni.txt');
		if(count($hod)>0){
			foreach($hod as $line){
				$line=trim($line);
				$line=preg_split('/\*/',$line);
				$navrat[$line[0]]['palec']=$line[1];
				$navrat[$line[0]]['titulek']=$line[2];
			}
		}else{
			$navrat=false;
		}
	}else{
		$navrat=false;
	}
	return $navrat;
}

function quoted_printable_header($str, $charset='utf-8', $linesize=76) {
    $charset || $charset = mb_internal_encoding();
    $out = "=?$charset?Q?";
    if($linesize === 0) {
        for($i=0,$c=strlen($str); $i<$c; $i++) {
            $chr = $str[$i];
            $ord = ord($chr);
            if(($ord>=33 && $ord<=60) || ($ord>=62 && $ord<=126) && $chr!=='_')
                $out .= $chr;
            elseif($chr === ' ')
                $out .= '_';
            else
                $out .= sprintf('=%02X', $ord);
        }
    } else {
        $linepos = strlen($out);
        for($i=0,$c=mb_strlen($str,$charset); $i<$c; $i++) {
            $chr = mb_substr($str, $i, 1, $charset);
            if(strlen($chr) === 1) {
                $ord = ord($chr);
                if(($ord>=33 && $ord<=60) || ($ord>=62 && $ord<=126) && $chr!=='_')
                    $append = $chr;
                elseif($chr === ' ')
                    $append = '_';
                else
                    $append = sprintf('=%02X', $ord);
            } else for($i2=0,$append=''; $i2<strlen($chr); $i2++) $append .= sprintf('=%02X', ord($chr[$i2]));

            if($i > 0 && $linepos+strlen($append)+2 > $linesize) {
                $out .= "?=\r\n";
                $linepos = 0;
                $append = " =?$charset?Q?$append";
            }
            $out .= $append;
            $linepos += strlen($append);
        }
    }
    return $out.'?=';
}

?>
