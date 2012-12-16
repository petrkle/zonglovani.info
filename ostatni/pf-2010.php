<?php
require('../init.php');
require('../func.php');
$titulek='PF 2010';
$smarty->assign('keywords',make_keywords($titulek).', žonglování');
$smarty->assign('description','Přání všeho nejlepšího v roce 2010.');
$smarty->assign('titulek',$titulek);
$smarty->assign('feedback',true);
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/p/pf-2010.png');
$trail = new Trail();
$trail->addStep('Tip týdne','/tip');
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);
$smarty->display('hlavicka.tpl');
$smarty->display('ostatni-pf-2010.tpl');
$smarty->display('paticka.tpl');
