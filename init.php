<?php

if($_SERVER['SERVER_NAME']=='zonglovani.info'){
	  error_reporting(0);
};
date_default_timezone_set('Europe/Prague');
header('X-Frame-Options: DENY');

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($_SERVER['DOCUMENT_ROOT'].'/site-secrets.php');

if(isset($_COOKIE['ZS']) and !isset($_SESSION)){
	session_name('ZS');
	session_start();
}

if(isset($_SESSION['uzivatel']) and isset($_SESSION['ip'])){
	if($_SESSION['ip']!=$_SERVER['REMOTE_ADDR']){
		session_destroy();
	}
}

require 'vendor/autoload.php';
$smarty = new Smarty;

$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/templates');
$smarty->setConfigDir($lib.'./configs');
$smarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/tmp/cache');
$smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/tmp/templates_c');
$smarty->addPluginsDir($lib.'/plugins_user');

define('CALENDAR_URL','/kalendar/'); 
define('CALENDAR_ROOT',$lib.'/calendar/'); 
define('CALENDAR_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar'); 
define('CALENDAR_DELETED',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar.deleted'); 
define('CALENDAR_IMG',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar.img'); 

define('LIDE_URL','/lide/'); 
define('LIDE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/lide'); 
define('LIDE_BY_MAIL',$_SERVER['DOCUMENT_ROOT'].'/data/lide.by.mail'); 
define('LIDE_TMP',$_SERVER['DOCUMENT_ROOT'].'/data/lide.tmp'); 
define('LIDE_VZKAZY',$_SERVER['DOCUMENT_ROOT'].'/data/vzkazy'); 

define('RSS_AGREGATOR_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/rss'); 

define('DISKUSE_URL','/diskuse/'); 
define('DISKUSE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/diskuse'); 

define('OBRAZKY_URL','/obrazky/'); 
define('OBRAZKY_DATA',$_SERVER['DOCUMENT_ROOT'].'/obrazky'); 

define('SEARCH_URL','/vyhledavani/'); 

define('HODNOCENI_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/hodnoceni');

define('TIMEOUT_REGISTRATION',7*24*3600); 
define('TIMEOUT_RESET_PASSWD',7*24*3600); 
define('TIMEOUT_VZKAZ',7*24*3600); 

define('TIPY_DATA',$_SERVER['DOCUMENT_ROOT'].'/tip/tipy.inc'); 

define('WALLPAPERS_URL','/obrazky-na-plochu/'); 
define('WALLPAPERS_DATA',$_SERVER['DOCUMENT_ROOT'].'/obrazky-na-plochu'); 

define('ZPRAV_NA_STRANKU',10); 

define('STAT_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/stat'); 
define('STAT_EXPIRE',31); 

define('MAX_BIG_LETTERS',0.7); 
define('IMG_MAX_WIDTH', 4000);  #px
define('IMG_MAX_HEIGHT', 4000); #px
define('IMG_MAX_SIZE', 3); #MiB

define('CSS_CHKSUM','948661739'); 
define('JS_CHKSUM','4294967295'); 

$hodnoceni=get_hodnoceni_stranka($_SERVER['REQUEST_URI']);
$smarty->assign('hodnoceni',$hodnoceni);
$smarty->assign('fblink','<a href="http://www.facebook.com/zongleruv.slabikar" title="Stránky žonglérova slabikáře na Facebooku." onclick="show_fb_likeiframe();return false;">facebook.com/zongleruv.slabikar</a>');
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
				if(is_array($line) and array_key_exists(1, $line)){
					if($line[1]>0){$navrat['libi']++;}
					if($line[1]<0){$navrat['nelibi']++;}
				}
			}
		}
	}else{
		$navrat=false;
	}
	return $navrat;
}
