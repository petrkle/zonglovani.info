<?php

require('init.php');
require('func.php');

$titulek='Žonglování s kužely';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);
$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely.tpl');
$smarty->display('paticka.tpl');

?>
