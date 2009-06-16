<?php

$lib=$_SERVER['DOCUMENT_ROOT'].'/lib';

require($lib.'/Smarty.class.php');

$smarty = new Smarty;

#$smarty->debugging = true;
$smarty->template_dir = $_SERVER['DOCUMENT_ROOT'].'/templates';
$smarty->config_dir = $lib.'/configs';
$smarty->cache_dir = $lib.'/cache';
$smarty->compile_dir = $lib.'/templates_c';
$smarty->plugins_dir = array($lib.'/plugins',$lib.'/plugins_user');


?>
