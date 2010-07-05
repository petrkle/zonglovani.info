<?php

if($_SERVER['SERVER_NAME']!='zongl.info'){
	  error_reporting(0);
}else{
	  error_reporting(E_ALL);
};

$srv=explode('.',$_SERVER['SERVER_NAME']);

if($srv[0]=='i' or $srv[0]=='f'){
	header('HTTP/1.1 301 Moved Permanently');
	array_shift($srv);
	$srv=join('.',$srv);
	header('Location: http://'.$srv.$_SERVER['REQUEST_URI']);
	exit;
}

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($lib.'/Smarty.class.php');

session_start();

if(isset($_SESSION['uzivatel']) and isset($_SESSION['ip'])){
	if($_SESSION['ip']!=$_SERVER['REMOTE_ADDR']){
		session_destroy();
	}
}

$smarty = new Smarty;

$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/templates';
$smarty->config_dir = $lib.'/configs';
$smarty->cache_dir = $_SERVER['DOCUMENT_ROOT'].'/tmp/cache';
$smarty->compile_dir = $_SERVER['DOCUMENT_ROOT'].'/tmp/templates_c';
$smarty->plugins_dir = array($lib.'/plugins',$lib.'/plugins_user');

define('CALENDAR_URL','/kalendar/'); 
define('CALENDAR_ROOT',$lib.'/calendar/'); 
define('CALENDAR_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar'); 
define('CALENDAR_DELETED',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar.deleted'); 

define('LIDE_URL','/lide/'); 
define('LIDE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/lide'); 
define('LIDE_TMP',$_SERVER['DOCUMENT_ROOT'].'/data/lide.tmp'); 
define('LIDE_VZKAZY',$_SERVER['DOCUMENT_ROOT'].'/data/vzkazy'); 

define('RSS_AGREGATOR_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/rss'); 

define('DISKUSE_URL','/diskuse/'); 
define('DISKUSE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/diskuse'); 

define('OBRAZKY_URL','/obrazky/'); 
define('OBRAZKY_DATA',$_SERVER['DOCUMENT_ROOT'].'/obrazky'); 

define('SEARCH_URL','/vyhledavani/'); 

define('HODNOCENI_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/hodnoceni');

define('TIMEOUT_REGISTRATION',8*3600); 
define('TIMEOUT_RESET_PASSWD',8*3600); 
define('TIMEOUT_VZKAZ',8*3600); 

define('TIPY_DATA',$_SERVER['DOCUMENT_ROOT'].'/tip/tipy.inc'); 

define('WALLPAPERS_URL','/obrazky-na-plochu/'); 
define('WALLPAPERS_DATA',$_SERVER['DOCUMENT_ROOT'].'/obrazky-na-plochu'); 

#if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')){
#	ob_start('ob_gzhandler');
#}

$hodnoceni=get_hodnoceni_stranka($_SERVER['REQUEST_URI']);
$smarty->assign('hodnoceni',$hodnoceni);
$smarty->assign('fblink',get_fblink());
function get_hodnoceni_stranka($url){
	$url=preg_replace('/(.+)\/$/','\1/index.html',$url);
	$navrat=array();
	$navrat['libi']=0;
	$navrat['nelibi']=0;
	if(is_readable(HODNOCENI_DATA.$url)){
		$hod=file(HODNOCENI_DATA.$url);
		if(count($hod)>0){
			foreach($hod as $line){
				$line=trim($line);
				$line=preg_split('/\*/',$line);
				if($line[1]>0){$navrat['libi']++;}
				if($line[1]<0){$navrat['nelibi']++;}
			}
		}
	}else{
		$navrat=false;
	}
	return $navrat;
}

function get_fblink(){
$texty=array(
'Jsem žonglér',
'Mám rád žonglování',
'Míčky a kužely jsou moje',
'Passing je můj šálek čaje',
'Aktuality ze světa žonglování',
'Miluju žonglování!',
'Žonglérské novinky',
'Ukaž žonglérův slabikář kamarádům',
'Novinky o žonglování',
'Najít další žongléry',
'Zůstaň v kontaktu',
'Poslat odkaz na žonglování kámošům',
'Hážu, hážeš, hážeme',
'Spousta žonglérů na Facebooku.',
'Podpoř žonglérův slabikář',
'To se mi líbí',
'Doporučit žonglérův slabikář kamarádům',
'Žonglérský tip týdne');
$stridacka=date('z',time()) % count($texty);
	return '<a href="http://www.facebook.com/pages/Zongleruv-slabikar/249578053101" class="external" title="Stránky žonglérova slabikáře na Facebooku." onclick="pageTracker._trackPageview(\'/goto/facebook.com/pages/Zongleruv-slabikar/249578053101\');">'.$texty[$stridacka].'</a>';
}

?>
