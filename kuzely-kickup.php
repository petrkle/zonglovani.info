<?php
require('init.php');
require('func.php');

$titulek='Zvednutí kuželu nohou';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Vykopnutí spadlého žonglovacího kuželu zpátky do vzduchu.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-kickup.tpl');
$smarty->display('paticka.tpl');

?>
