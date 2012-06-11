<?php
require('../init.php');
require('../func.php');

$titulek='Světový den žonglování 2012';
$smarty->assign('titulek',$titulek);
$smarty->assign('nadpis','Světový den žonglování');

$smarty->assign('keywords','světový, mezinárodní, den, žonglování');
$smarty->assign('description','Světový den žonglování 16. června 2012');
$smarty->assign('nahled','http://'.$_SERVER['SERVER_NAME'].'/img/e/ejc2012.png');

$trail = new Trail();
$trail->addStep('Kalendář',CALENDAR_URL);
$trail->addStep($titulek);
$smarty->assign_by_ref('trail', $trail->path);

$smarty->display('hlavicka.tpl');
$smarty->display('kalendar-sdz12.tpl');
$smarty->display('paticka.tpl');
