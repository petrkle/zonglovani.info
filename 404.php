<?php
header ('HTTP/1.0 404 Not Found');
require_once('init.php');
require_once('func.php');

$smarty->assign('titulek','Stránka nenalezena');
$smarty->assign('nenalezeno_404',true);
$trail = new Trail();
$trail->addStep('Neexistující stránka');
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('404.tpl');
$smarty->display('paticka.tpl');
?>
