<?php
require('../init.php');
require('../func.php');

$titulek='Mýty a omyly';
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Ne všechno co se říká o žonglování je pravda.');

$smarty->assign('titulek',$titulek);

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);

$smarty->assign('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-myty-omyly.tpl');
$smarty->display('paticka.tpl');

