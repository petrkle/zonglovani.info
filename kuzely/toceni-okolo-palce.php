<?php
require('../init.php');
require('../func.php');
$titulek='Otáčení kuželky okolo palce';
$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep('Točení okolo palce');

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Otáčení s kužekou okolo palce.');

$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-toceni-okolo-palce.tpl');
$smarty->display('paticka.tpl');

?>
