<?php
require('../init.php');
require('../func.php');
$titulek='Veselé Vánoce';
$smarty->assign('titulek',$titulek.' 2010');
$smarty->assign('nadpis',$titulek);
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Veselé Vánoce 2010 všem žonglérkám a žonglérům.');
$smarty->assign('feedback',true);
$smarty->assign('nahled','https://'.$_SERVER['SERVER_NAME'].'/img/v/vanocni-kometa.s.jpg');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-vanoce-2010.tpl');
$smarty->display('paticka.tpl');
