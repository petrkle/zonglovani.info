<?php
require('init.php');
require('func.php');

$titulek='RSS kanály';

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-rss.tpl');
$smarty->display('paticka.tpl');

?>
