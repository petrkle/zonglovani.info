<?php
require('../init.php');
require('../func.php');

$titulek='Často kladené otázky';
$smarty->assign('feedback',true);
$smarty->assign('titulek',$titulek);

$smarty->assign('keywords','otázky, žonglování, návod');
$smarty->assign('description','Často kladené otázky o žonglování.');

$trail = new Trail();
$trail->addStep('Informace o žonglování','/ostatni.html');
$trail->addStep($titulek);
$smarty->assign('trail', $trail->path);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/f/faq.png');

$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-faq.tpl');
$smarty->display('paticka.tpl');
