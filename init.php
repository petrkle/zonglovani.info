<?php

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($lib.'/Smarty.class.php');

session_start();

$smarty = new Smarty;

#$smarty->debugging = true;
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/templates';
$smarty->config_dir = $lib.'/configs';
$smarty->cache_dir = $lib.'/cache';
$smarty->compile_dir = $lib.'/templates_c';
$smarty->plugins_dir = array($lib.'/plugins',$lib.'/plugins_user');

define('CALENDAR_URL','/kalendar/'); 
define('CALENDAR_ROOT',$lib.'/calendar/'); 
define('CALENDAR_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/kalendar'); 

define('LIDE_URL','/lide/'); 
define('LIDE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/lide'); 
define('LIDE_TMP',$_SERVER['DOCUMENT_ROOT'].'/data/lide.tmp'); 

define('DISKUSE_URL','/diskuse/'); 
define('DISKUSE_DATA',$_SERVER['DOCUMENT_ROOT'].'/data/diskuse'); 

define('TIMEOUT_REGISTRATION',6*3600); 
define('TIMEOUT_RESET_PASSWD',6*3600); 

?>