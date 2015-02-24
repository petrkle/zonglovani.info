<?php
require('../init.php');
require('../func.php');

$titulek='Rotace kuželu';

$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);

$smarty->assign('keywords',make_keywords($titulek));
$smarty->assign('description','Házení kuželů na jednu, dvě, nebo dokonce tři otočky.');
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/k/kuzely-rotacea.png');

$trail = new Trail();
$trail->addStep('Kužely','/kuzely/');
$trail->addStep($titulek);

$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('kuzely-rotace.tpl');
$smarty->display('paticka.tpl');
