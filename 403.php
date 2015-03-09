<?php
require_once('init.php');
require_once('func.php');

header('HTTP/1.0 403 Forbidden');
$smarty->assign('titulek','Přístup zakázán');

$trail = new Trail();
$trail->addStep('Zakázaná stránka');
$smarty->assign('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');
