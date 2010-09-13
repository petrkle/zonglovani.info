<?php
require_once('init.php');
require_once('func.php');

$smarty->assign('titulek','Přístup zakázán');

$trail = new Trail();
$trail->addStep('Zakázaná stránka');
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('403.tpl');
$smarty->display('paticka.tpl');

?>
