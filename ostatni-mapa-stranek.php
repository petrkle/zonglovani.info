<?php

require('init.php');

$smarty->assign("titulek","Mapa str�nek");

$smarty->display('hlavicka.tpl');
$mapa="mapa-stranek.inc";
if(is_readable($mapa)){
	include("mapa-stranek.inc");
}
$smarty->display('paticka.tpl');

?>