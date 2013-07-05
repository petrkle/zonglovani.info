<?php
header ('HTTP/1.0 410 Gone');
require_once('init.php');
require_once('func.php');

$smarty->assign('titulek','Stránka zrušena');
$trail = new Trail();
$trail->addStep('Zrušená stránka');
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('410.tpl');
$smarty->display('paticka.tpl');
