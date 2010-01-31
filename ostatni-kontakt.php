<?php
require('init.php');
require('func.php');

$titulek='Kontakt';
$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis',$titulek);
$smarty->assign('notitle',true);

$trail = new Trail();
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kontakt.tpl');
$smarty->display('paticka.tpl');

?>
