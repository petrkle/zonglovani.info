<?php
require('init.php');
require('func.php');

$titulek='Použitý software';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Programy použité při výrobě žonglérova slabikáře.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('toolbox.tpl');
$smarty->display('paticka.tpl');
?>
