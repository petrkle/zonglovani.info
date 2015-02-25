<?php

if($_SERVER['SERVER_NAME']=='zonglovani.info'){
	  error_reporting(0);
};
date_default_timezone_set('Europe/Prague');
header('X-Frame-Options: DENY');

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($lib.'/Smarty.class.php');
require($_SERVER['DOCUMENT_ROOT'].'/site-secrets.php');

if(isset($_COOKIE['ZS'])){
	session_name('ZS');
	session_start();
}

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

define('CSS_CHKSUM','1741546160'); 

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
				if($line[1]>0){$navrat['libi']++;}
				if($line[1]<0){$navrat['nelibi']++;}
			}
		}
	}else{
		$navrat=false;
	}
	return $navrat;
}
