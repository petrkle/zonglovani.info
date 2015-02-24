<?php
require('../init.php');
require('../func.php');
$titulek='Veselé Vánoce';
$smarty->assign('titulek',$titulek.' 2013');
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Veselé Vánoce 2013 všem žonglérkám a žonglérům.');
$smarty->assign('feedback',true);
$smarty->assign('nahled','https://www.'.$_SERVER['SERVER_NAME'].'/img/m/micky-ve-snehu.s.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->assign_by_ref('dalsi',$dalsi);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2013.tpl');
$smarty->display('paticka.tpl');
