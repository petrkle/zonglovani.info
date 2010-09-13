<?php
require('../init.php');
require('../func.php');

$titulek='Anglicko-český žonglérský slovníček';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', juggling, dictionary');
$smarty->assign('description','Slovníček nejčastějších žonglérských výrazů. Czech-English juggling dictionary.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep('Slovníček');

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-aczslovnicek.tpl');
$smarty->display('paticka.tpl');

?>
