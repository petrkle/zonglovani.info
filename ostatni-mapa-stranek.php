<?php
require('init.php');
require('func.php');

$smarty->assign('titulek','Mapa stránek');
$smarty->assign('description','Seznam všech stránek v žonglérově slabikáři.');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/k/kompas.png');

$trail = new Trail();
$trail->addStep('Mapa stránek');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('mapa-stranek.tpl');
$mapa='mapa-stranek.inc';
if(is_readable($mapa)){
	include('mapa-stranek.inc');
}
$smarty->display('paticka.tpl');
?>
