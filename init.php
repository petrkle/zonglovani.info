<?php

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($lib.'/Smarty.class.php');

session_start();

if(isset($_SESSION["uzivatel"]) and isset($_SESSION["ip"])){
	if($_SESSION["ip"]!=$_SERVER['REMOTE_ADDR']){
		session_destroy();
	}
}

$smarty = new Smarty;

#$smarty->debugging = true;
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

define('DISKUSE_URL','/diskuse/'); 
define('DISKUSE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/diskuse'); 

define('TIMEOUT_REGISTRATION',6*3600); 
define('TIMEOUT_RESET_PASSWD',6*3600); 
define('TIMEOUT_VZKAZ',6*3600); 

?>
